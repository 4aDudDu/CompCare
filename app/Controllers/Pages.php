<?php

namespace App\Controllers;
use App\Models\ProductModel;
class Pages extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'CompCare | Home Page',
            'deviceTypes' => $this->getDeviceTypes()
        ];
        return view('pages/home', $data);
    }

    public function store()
    {
        $data = [
            'title' => 'CompCare | Store'
        ];
        return view('pages/store', $data);
    }

    public function contact()
    {
        $data = [
            'title' => 'CompCare | Keluhan',
            'deviceTypes' => $this->getDeviceTypes()
        ];
        return view('pages/contact', $data);
    }

    public function settings()
    {
        if (!logged_in()) {
            return redirect()->to('/login')->with('error', 'Login terlebih dahulu untuk mengakses laman ini.');
        }
    
        helper('auth');
        $userModel = new \App\Models\UserModel();
        $user = $userModel->find(user_id());
        
        $data = [
            'title' => 'KaryaPekanbaru | Settings',
            'user' => $user 
        ];
        return view('pages/settings', $data);
    }
    public function updateProfile()
    {
    
        if (!logged_in()) {
            return redirect()->to('/login')->with('error', 'Login terlebih dahulu untuk mengakses laman ini.');
        }
    
        $userModel = new \App\Models\UserModel();
        $userId = user_id();
    
        $dataToUpdate = [];
    
        $newNoHp = $this->request->getPost('no_hp');
        if (!empty($newNoHp)) {
            $dataToUpdate['no_hp'] = $newNoHp;
        }
    
        $password = $this->request->getPost('password');
        $passwordConfirm = $this->request->getPost('password_confirm');
    
        if (!empty($password) || !empty($passwordConfirm)) {
            if (!$this->validate([
                'password' => [
                    'rules' => 'required|min_length[6]',
                    'errors' => [
                        'required' => 'Password harus diisi.',
                        'min_length' => 'Password minimal 6 karakter.'
                    ]
                ],
                'password_confirm' => [
                    'rules' => 'matches[password]',
                    'errors' => [
                        'matches' => 'Konfirmasi password tidak cocok.'
                    ]
                ]
            ])) {
                return redirect()->back()->withInput()->with('error', $this->validator->getErrors());
            }
            
    
            $dataToUpdate['password_hash'] = \Myth\Auth\Password::hash($password);
        }
    
        if (empty($dataToUpdate)) {
            return redirect()->back()->with('error', 'Tidak ada perubahan yang dilakukan.');
        }
    
        if ($userModel->update($userId, $dataToUpdate)) {
            return redirect()->to('/pages/settings')->with('success', 'Profil berhasil diperbarui!');
        } else {
            return redirect()->back()->with('error', 'Gagal memperbarui profil.');
        }
        
    }

    public function product()
    {
        if (!logged_in()) {
            return redirect()->to('/login')->with('error', 'Login terlebih dahulu untuk mengakses laman ini.');
        }
    
        $productModel = new ProductModel();
        $products = $productModel->where('id_user', user_id())->findAll();
    
        $data = [
            'title' => 'KaryaPekanbaru | Produk',
            'products' => $products,
        ];
        return view('pages/product', $data);
    }

    public function editProduct($id)
{
    if (!logged_in()) {
        return redirect()->to('/login')->with('error', 'Login terlebih dahulu untuk mengakses laman ini.');
    }

    $productModel = new ProductModel();
    $product = $productModel->find($id);

    if (!$product || $product['id_user'] !== user_id()) {
        return redirect()->to('/pages/product')->with('error', 'Produk tidak ditemukan!');
    }

    $data = [
        'title' => 'KaryaPekanbaru | Edit Produk',
        'product' => $product,
    ];
    return view('pages/edit_product', $data);
}
    

public function updateProduct($id)
{
    if (!logged_in()) {
        return redirect()->to('/login')->with('error', 'Login terlebih dahulu untuk mengakses laman ini.');
    }

    $productModel = new ProductModel();
    $product = $productModel->find($id);

    if (!$product || $product['id_user'] !== user_id()) {
        return redirect()->to('/pages/product')->with('error', 'No Access.');
    }

    $data = [
        'name' => $this->request->getPost('name'),
        'description' => $this->request->getPost('description'),
        'price' => $this->request->getPost('price'),
        'qty' => $this->request->getPost('qty'),
    ];

    $productModel->update($id, $data);

    return redirect()->to('/pages/product')->with('success', 'Produk berhasil diperbarui.');
}

public function deleteProduct($id)
{
    if (!logged_in()) {
        return $this->response->setJSON(['success' => false, 'message' => 'Akses tidak valid']);
    }

    $productModel = new ProductModel();
    if ($productModel->delete($id)) {
        return $this->response->setJSON(['success' => true]);
    } else {
        return $this->response->setJSON(['success' => false]);
    }
}


    private function getDeviceTypes()
    {
        return [
            'laptop' => 'Laptop',
            'computer' => 'Computer',
        ];
    }

    private function issueDevice($deviceType)
    {
        $issues = [
            'laptop' => [
                'Battery Issue',
                'Screen Damage',
                'Keyboard Issue',
                'Touchpad Issue',
                'Slow Performance',
                'Fan Noise',
                'Software Issue',
                'Operating System Reinstallation',
                'RAM Upgrade',
                'Storage Upgrade',
                'Virus/Malware Removal',
                'General Service',
                'Repasta Laptop'
            ],
            'computer' => [
                'Power Issue',
                'Overheating',
                'Motherboard Issue',
                'CPU Issue',
                'Hard Drive Failure',
                'Slow Performance',
                'Graphic Card Issue',
                'Operating System Reinstallation',
                'RAM Upgrade',
                'Storage Upgrade',
                'Virus/Malware Removal',
                'General Service'
            ],
        ];

        return $issues[$deviceType] ?? [];
    }

    public function issueDeviceAjax()
    {
        $deviceType = $this->request->getPost('deviceType');
        $issues = $this->issueDevice($deviceType);
    
        // Cek hasil respons
        return $this->response->setJSON($issues);
    }
    
}