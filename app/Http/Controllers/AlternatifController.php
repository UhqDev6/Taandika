<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AlternatifController extends Controller
{
    public function index()
    {
        return view('pages.alternatif.index');
    }
}
