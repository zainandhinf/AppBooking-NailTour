<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;

class AdminController extends Controller
{
    public function loginAdmin()
    {
        return view('admin.page.login');
    }

    public function index()
    {
        return view('admin.main');
    }

    public function catalog()
    {
        return view('admin.layout.catalog');
    }

    
}