<?php

namespace Myth\Auth\Entities;

use CodeIgniter\Entity\Entity;
use Exception;
use Myth\Auth\Authorization\GroupModel;
use Myth\Auth\Authorization\PermissionModel;
use Myth\Auth\Password;
use RuntimeException;

class User extends Entity
{
    /**
     * Maps names used in sets and gets against unique
     * names within the class, allowing independence from
     * database column names.
     */
    protected $datamap = [
        'no_hp' => 'no_hp',
    ];

    /**
     * Define properties that are automatically converted to Time instances.
     */
    protected $dates = ['reset_at', 'reset_expires', 'created_at', 'updated_at', 'deleted_at'];

    /**
     * Array of field names and the type of value to cast them as
     * when they are accessed.
     */
    protected $casts = [
        'username'         => 'string',
        'email'            => 'string',
        'active'           => 'boolean',
        'force_pass_reset' => 'boolean',
        'no_hp'            => 'string', // Cast no_hp to string
    ];

    /**
     * Per-user permissions cache
     *
     * @var array
     */
    protected $permissions = [];

    /**
     * Per-user roles cache
     *
     * @var array
     */
    protected $roles = [];

    /**
     * Automatically hashes the password when set.
     */
    public function setPassword(string $password)
    {
        $this->attributes['password_hash'] = Password::hash($password);

        $this->attributes['reset_hash']    = null;
        $this->attributes['reset_at']      = null;
        $this->attributes['reset_expires'] = null;
    }

    /**
     * Explicitly convert false and true to 0 and 1
     */
    public function setActive($active)
    {
        $this->attributes['active'] = $active ? 1 : 0;
    }

    /**
     * Explicitly convert false and true to 0 and 1
     */
    public function setForcePassReset($force_pass_reset)
    {
        $this->attributes['force_pass_reset'] = $force_pass_reset ? 1 : 0;
    }

    /**
     * Force a user to reset their password on next page refresh
     * or login.
     */
    public function forcePasswordReset()
    {
        $this->generateResetHash();
        $this->attributes['force_pass_reset'] = 1;

        return $this;
    }

    /**
     * Generates a secure hash to use for password reset purposes,
     * saves it to the instance.
     */
    public function generateResetHash()
    {
        $this->attributes['reset_hash']    = bin2hex(random_bytes(16));
        $this->attributes['reset_expires'] = date('Y-m-d H:i:s', time() + config('Auth')->resetTime); // Fixed typo here
    
        return $this;
    }
    

    /**
     * Generates a secure random hash to use for account activation.
     */
    public function generateActivateHash()
    {
        $this->attributes['activate_hash'] = bin2hex(random_bytes(16));

        return $this;
    }

    /**
     * Activate user.
     */
    public function activate()
    {
        $this->attributes['active']        = 1;
        $this->attributes['activate_hash'] = null;

        return $this;
    }

    /**
     * Unactivate user.
     */
    public function deactivate()
    {
        $this->attributes['active'] = 0;

        return $this;
    }

    /**
     * Checks to see if a user is active.
     */
    public function isActivated(): bool
    {
        return $this->active;
    }

    /**
     * Bans a user.
     */
    public function ban(string $reason)
    {
        $this->attributes['status']         = 'banned';
        $this->attributes['status_message'] = $reason;

        return $this;
    }

    /**
     * Removes a ban from a user.
     */
    public function unBan()
    {
        $this->attributes['status'] = $this->status_message = '';

        return $this;
    }

    /**
     * Checks to see if a user has been banned.
     */
    public function isBanned(): bool
    {
        return isset($this->attributes['status']) && $this->attributes['status'] === 'banned';
    }

    /**
     * Determines whether the user has the appropriate permission,
     * either directly, or through one of its groups.
     */
    public function can(string $permission)
    {
        return in_array(strtolower($permission), $this->getPermissions(), true);
    }

    /**
     * Returns the user's permissions.
     */
    public function getPermissions()
    {
        if (empty($this->id)) {
            throw new RuntimeException('Users must be created before getting permissions.');
        }

        if (empty($this->permissions)) {
            $this->permissions = model(PermissionModel::class)->getPermissionsForUser($this->id);
        }

        return $this->permissions;
    }

    /**
     * Returns the user's roles.
     */
    public function getRoles()
    {
        if (empty($this->id)) {
            throw new RuntimeException('Users must be created before getting roles.');
        }

        if (empty($this->roles)) {
            $groups = model(GroupModel::class)->getGroupsForUser($this->id);

            foreach ($groups as $group) {
                $this->roles[$group['group_id']] = strtolower($group['name']);
            }
        }

        return $this->roles;
    }

    /**
     * Sets the no_hp attribute.
     */
    public function setNoHp($no_hp)
    {
        $this->attributes['no_hp'] = $no_hp;
        return $this;
    }
}