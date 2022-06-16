<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function home(){
        return view('adminDashboard.dashboard');
    }

    public function viewUsers(){
        return view('adminDashboard.User.index');
    }

    public function Users(){
        $buyer = User::all();
        $i=1;
        return view('adminDashboard.User.index',compact('buyer', 'i'));
    }

    public function editNews(){
        return view('adminDashboard.News.editNews');
    }

    public function viewContact(){
        return view('adminDashboard.Contact.viewContact');
    }

}
