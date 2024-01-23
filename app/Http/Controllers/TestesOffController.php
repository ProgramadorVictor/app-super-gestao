<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestesOffController extends Controller
{
    public function testesOff(){
        return view('site.layouts.testes.testes_offs');
    }
}
