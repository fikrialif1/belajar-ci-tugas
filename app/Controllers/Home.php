<?php

namespace App\Controllers;

use App\Models\ProductModel; 
use App\Models\TransactionModel;
use App\Models\TransactionDetailModel;

class Home extends BaseController
{
    protected $product;
    protected $transactionModel;
    protected $transactionDetailModel;

    function __construct()
    {
        helper('number');
        helper('form');
        $this->product = new ProductModel();
        $this->transactionModel = new TransactionModel();
        $this->transactionDetailModel = new TransactionDetailModel();
    }

    public function index()
    {
        $product = $this->product->findAll();
        $data['product'] = $product;

        return view('v_home', $data);
    }

    public function profile()
    {
        $username = session()->get('username');
        $data['username'] = $username;

        $buy = $this->transactionModel->where('username', $username)->findAll();
        $data['buy'] = $buy;

        $product = [];

        if (!empty($buy)) {
            foreach ($buy as $item) {
                $detail = $this->transactionDetailModel->select('transaction_detail.*, product.nama, product.harga, product.foto')->join('product', 'transaction_detail.product_id=product.id')->where('transaction_id', $item['id'])->findAll();

                if (!empty($detail)) {
                    $product[$item['id']] = $detail;
            }
        }
    }

        $data['product'] = $product;

        return view('v_profile', $data);
    }
}
