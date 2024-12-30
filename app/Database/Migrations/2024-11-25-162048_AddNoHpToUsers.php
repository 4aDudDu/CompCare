<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddNoHpToUsers extends Migration
{
    public function up()
    {
        // Menambahkan kolom no_hp ke tabel users
        $this->forge->addColumn('users', [
            'no_hp' => [
                'type' => 'VARCHAR',
                'constraint' => 15,
                'unique' => true,  // Kolom ini harus unik
                'null' => false,   // Kolom ini tidak boleh kosong
            ],
        ]);
    }

    public function down()
    {
        // Menghapus kolom no_hp jika migration di rollback
        $this->forge->dropColumn('users', 'no_hp');
    }
}