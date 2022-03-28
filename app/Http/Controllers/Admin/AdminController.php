<?php

namespace App\Http\Controllers\Admin;

use DB;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\AbstractController;
use Auth;

abstract class AdminController extends AbstractController
{
    /**
     * Current signed user
     * @var $user
     */
    protected $user;
    protected $guard;

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->user = $request->user();
            $this->guard = \Illuminate\Support\Facades\Auth::guard();
            view()->share('user', $this->user);
            return $next($request);
        });
    }
}
