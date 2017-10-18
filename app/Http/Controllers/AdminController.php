<?php

namespace App\Http\Controllers;
use App\Admin;
use Illuminate\Http\Request;

use App\Http\Requests;
use Auth;
use Session;

class AdminController extends Controller
{
    //
    public function __construct() {
        $this->middleware('auth:admin',['except' => 'logout']);
    }
    public function getindex()
    {

        return view('admin.home');
    }
    public function logout() {
        Auth::guard('admin')->logout();
        return redirect('admin/login');
    }

}
