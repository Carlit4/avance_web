<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class HomeController extends Controller
{
    public function index(){
        if(Gate::denies('servicios-gestion')){
            return redirect()->route('home.index');
        }

        return view('home.index');
    }
}
