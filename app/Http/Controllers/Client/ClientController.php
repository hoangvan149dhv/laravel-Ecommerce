<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\AbstractController;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

abstract class ClientController extends AbstractController
{
    const PAID = 1;

    const UNPAID = 0;
}
