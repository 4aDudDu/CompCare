<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ProductModel;
use App\Models\UserModel;

class Store extends BaseController
{
    public function index()
    {
       
        $productModel = new ProductModel();
        $db = db_connect();

        $builder = $db->table('products');
        $builder->select('products.*, users.no_hp');
        $builder->join('users', 'users.id = products.id_user'); 
        $data['products'] = $builder->get()->getResultArray(); 

        if (logged_in()) {
            helper('auth'); 
            $userModel = new UserModel();
            $user = $userModel->find(user_id()); 
            $data['user_no_hp'] = $user['no_hp']; 
        } else {
            $data['user_no_hp'] = null; 
        }

        $data['title'] = 'CompCare | Store';

        return view('pages/store', $data);
    }

    public function addProduct()
    {
        helper('auth');
    
        if (!logged_in()) {
            return redirect()->to('/login')->with('error', 'Anda harus login untuk menambah produk.');
        }
    
        // Validasi input
        $validation = $this->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required|decimal',
            'qty' => 'required|integer',
            'image' => 'uploaded[image]|is_image[image]|max_size[image,2048]', 
        ]);
    
        if (!$validation) {
            return redirect()->back()->withInput()->with('error', $this->validator->getErrors());
        }
    
        $file = $this->request->getFile('image');
        $imagePath = '';
        if ($file->isValid() && !$file->hasMoved()) {
            $ext = $file->getClientExtension(); 
            $newName = $file->getRandomName(); 
            $file->move('writable/uploads', $newName); 
            
            $imagePath = 'uploads/' . $newName; 
        } else {
            
            return redirect()->back()->withInput()->with('error', 'Inputkan Gambar terlebih dahulu!');
        }
    
        $productModel = new ProductModel();
        $productModel->insert([
            'name' => $this->request->getPost('name'),
            'description' => $this->request->getPost('description'),
            'price' => $this->request->getPost('price'),
            'qty' => $this->request->getPost('qty'),
            'image_url' => $imagePath,
            'id_user' => user_id(), 
        ]);
    
        return redirect()->to('/pages/store')->with('success', 'Produk berhasil ditambahkan.');
    }
    
    
}   