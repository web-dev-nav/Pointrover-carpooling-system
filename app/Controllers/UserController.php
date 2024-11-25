<?php

namespace App\Controllers;
//use App\Models\DetailModel;
use App\Models\UserModel;

class UserController extends BaseController
{
    public function __construct()
    {
        //$this->DetailModel = new DetailModel(); // Load the model
        $this->UserModel = new UserModel();
    }

    public function index()
    {
     
        if (empty(session()->get('user_data'))) {
            // Redirect to login page if user is not logged in
            return redirect()->to('/login');
        }else{
    
                 $data['title'] = "Profile";
                 return view('pages/profile',$data); 
            
        }
      
    }
    public function logout()
    {
        // Clear session data
        session()->destroy();

        // Redirect to login page
        return redirect()->to('/login');
    }


}