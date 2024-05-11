<?php

namespace App\Http\Controllers;

use App\Models\Area;
use App\Models\Food;
use App\Models\Drink;
use Illuminate\Http\Request;
use Spatie\FlareClient\Http\Exceptions\NotFound;

class MainController extends Controller
{
    public function index(){
        return view('welcome.index');
    }
    public function daerah(){
        return view('welcome.daerah');
    }
    public function profile(){
        return view('welcome.profile');
    }
    public function makanan(){
        return view('welcome.makanan');
    }
    public function minuman(){
        return view('welcome.minuman');
    }

    public function welcomedrink(Request $request){
        $search = $request->input('search');

        $drinks = Drink::select([
            'id',
            'minuman',
            'sejarah',
            'bahan',
            'langkah',
            'foto_minuman'
        ])
        ->where('minuman','like',"%{$search}%")
        ->orWhere('sejarah','like',"%{$search}%")
        ->paginate(10);

        return view('welcome.minuman.welcomedrink' ,compact ('drinks'));
    }

    public function welcomefood(Request $request){
        $search = $request->input('search');
        $foods = Food::select([
            'id',
            'nama',
            'sejarah',
            'bahan',
            'langkah',
            'gambar'
        ])
        ->where('nama','like',"%{$search}%")
        ->orWhere('sejarah','like',"%{$search}%")
        ->paginate(10);

        return view ('welcome.makanan.welcomefood',compact('foods'));
    }

    public function welcomearea(Request $request){

        $search = $request->input('search');

        $areas = Area::select([
            'id',
            'provinsi',
            'kabupaten',
            'sejarah',
            'foto_monumen',
            'foto_baju_adat'
        ])
        ->where('provinsi','like',"%{$search}%")
        ->orWhere('kabupaten', 'like',"%{$search}%")
        ->orderBy('provinsi','asc')
        ->paginate(10);

        // Alert::succes('Berhasil','S');

        return view ('welcome.daerah.welcomearea',compact('areas'));
    }



}
