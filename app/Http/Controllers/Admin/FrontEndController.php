<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FrontEndController extends Controller
{
    // show the dashboard for admin
    public function index()
    {
        return view('admin.index');
    }
}