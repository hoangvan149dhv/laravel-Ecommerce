<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\AdminController;
use Illuminate\Http\Request;

class HomeController extends AdminController
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        parent::__construct();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('admin.home.index', ['user' => $this->user]);
    }
}
