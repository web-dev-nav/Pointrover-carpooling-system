<?php

namespace App\Controllers;
//use App\Models\DetailModel;

class LoginController extends BaseController
{
    public function __construct()
    {
        //$this->DetailModel = new DetailModel(); // Load the model
       
    }

    public function index()
    {
      
       $data['title'] =  'Login';
      // $data['details'] = $this->DetailModel->getTripWithAddressMapping($id);
       return view('pages/login', $data);
    }



}
