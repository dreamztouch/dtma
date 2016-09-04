<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class DtmaController extends Controller{

    public function __construct(){
        $this->middleware('auth');
    }

    /**
    * Display Admin Dashboard Page
    */
    public function getAdminDashboard(){
    	return view ('pages.dashboard');
    }
}
