<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

class DaerahController extends Controller
{
    public function index (){

        return view ('dashboard.data.area.index');
    }

    public function create() {
    return view ('dashboard.data.area.create');
    }



}
