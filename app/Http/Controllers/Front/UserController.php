<?php


namespace App\Http\Controllers\Front;
use App\Http\Controllers\Controller;



class UserController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function user()
    {
        return 'This is UserController';
    }
    public function showUserName()
    {
        return 'Abdulaziz Melfy';
    }

    public function index()
    {
        return view('landing');
    }

    public function delete()
    {
        return "Delete Action ";
    }
    
    public function show()
    {
        return "Show Action ";
    }
    
    public function edit()
    {
        return "Edit Action ";
    }
    
    public function update()
    {
        return "Update Action ";
    }

}