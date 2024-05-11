<?php

namespace App\Http\Controllers;

use App\Models\Food;
use Illuminate\Http\Request;

class DataController extends Controller
{
    public function indexdata(){

        // $foods = Food::select([
        //     'id',
        //     'nama',
        //     'sejarah',
        //     'bahan',
        //     'langkah',
        //     'gambar'
        // ]);
        // // ->paginate(10);

        // return view('dashboard.data.indexdata' ,compact ('foods'));

        return view('dashboard.data.indexdata');
    }
}
