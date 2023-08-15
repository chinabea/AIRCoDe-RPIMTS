<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EmailBoxController extends Controller
{
    public function index()
    {
        return view('emailbox.compose');
    }
}
