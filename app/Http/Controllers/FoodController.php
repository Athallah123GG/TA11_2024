<?php

namespace App\Http\Controllers;

use App\Models\Food;
use Illuminate\Http\Request;
use App\Http\Requests\StoreFoodRequest;
use App\Http\Requests\UpdateFoodRequest;
use RealRashid\SweetAlert\Facades\Alert;

class FoodController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');

        $foods = Food::select([
            'id',
            'nama',
            'sejarah',
            'bahan',
            'langkah',
            'gambar'
        ])
        ->where('nama' ,'like',"%{$search}%")
        // ->orWhere('' , 'like' "% {$search} %")
        ->orderBy('nama','asc')
        ->paginate(10);

        return view('dashboard.data.food.index' ,compact ('foods'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view ('dashboard.data.food.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreFoodRequest $request)
    {
        try

        {
            $validatedData = $request->validate([
                        'nama' => 'required|string',
                        'sejarah' => 'required|string',
                        'bahan' => 'nullable|string',
                        'langkah' => 'nullable|string',
                        'gambar' => 'image|mimes:jpeg,png,jpg|max:2048' // Validasi untuk file gambar
                    ]);

                    if ($request->hasFile('gambar')) {
                        $file = $request->file('gambar');
                        // Ganti spasi dengan strip dan hapus karakter khusus lainnya
                        $fileName = time() . '_' . str_replace([' ', '%', '#', '@', '+', '=', '?', '&', '$', '^'], '-', $file->getClientOriginalName());
                        $file->storeAs('public/foods/foods_covers', $fileName);
                    } else {
                        $fileName = 'not_set.png'; // Jika tidak ada gambar yang diunggah, gunakan gambar default
                    }

                    $validatedData['gambar'] = $fileName;

                    Food::create($validatedData);
                    Alert::success('Berhasil', 'Sukses Menambah Data Makanan');


                    return redirect()->route('food.index');
        }

        catch(\Exception $e)
            {
                dd($e->getMessage());
                return redirect()->route('food.create');

                // return redirect()->route('food$food.create')->with('message', ['alert'=>'danger', 'message'=> $e->getMessage()]);
            }


        // return redirect()->route('index');->with('message', ['alert'=>'success', 'message'=> 'food$food created successfully.']);


    }

    /**
     * Display the specified resource.
     */
    public function show(Food $food ,$id)
    {
        $food = Food::select([
            'id',
            'nama',
            'sejarah',
            'bahan',
            'langkah',
            'gambar'
        ])
        ->paginate(10)
        ->where('id' ,'=',$id)
        ->first();

        return view ('dashboard.data.food.detail' ,compact('food')) ;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
{

    $food = Food::findOrFail($id); // Finds the Food record with the given ID or fails if not found
    return view('dashboard.data.food.edit', compact('food')); // Returns the edit view with the retrieved Food record
}


    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateFoodRequest $request, Food $food ,$id)
    {
        try{
            $food = Food::findOrFail($id);

            $validatedData = $request->validate([
                'nama' => 'required|string',
                'sejarah' => 'required|string',
                'bahan' => 'nullable|string',
                'langkah' => 'nullable|string',
                'gambar' => 'nullable|image|mimes:jpeg,png,jpg|max:2048' // Validasi untuk file gambar
        ]);

        $fileName = $food->gambar; // kalau gambar tidak diedit, maka namanya sama
            if ($request->hasFile('gambar')) { // kalau  gambar diedit
                $file = $request->file('gambar'); //menampung nilai requestr file
                // Ganti spasi dengan strip dan hapus karakter khusus lainnya
                $fileName = time() . '_' . str_replace([' ', '%', '#', '@', '+', '=', '?', '&', '$', '^'], '-', $file->getClientOriginalName());
                $file->storeAs('public/foods/foods_covers', $fileName);
                //untuk mengetahui apakah file lama perlu dihapus
                if ($food->gambar != $file->getClientOriginalName() && $food->gambar != 'not_set.png' && $food->gambar == $food->gambar ) {
                    unlink(storage_path('app/public/foods/foods_covers/' . $food->gambar));
                }
            }
            $validatedData['gambar'] = $fileName;

            $food ->update($validatedData);
            Alert::success('Berhasil', 'Sukses Edit Data Makanan');
            return redirect()->route('food.index');


        }catch(\Exception $e){
            dd($e->getMessage());
            return redirect()->route('food.edit' ,$id);
        }



    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Food $food ,$id)
    {
        $food=Food::findOrFail($id);
        // if($food->gambar != 'not_set.png'){
        //     unlink(storage_path('app/public/foods/foods_covers/' . $food->gambar));
        // };

        if($food->gambar != 'not_set.png'){
            // unlink(storage_path('app/public/foods/foods_covers/' . $food->gambar));
            if(file_exists(storage_path('app/public/foods/foods_covers/' . $food->gambar))){
                unlink(storage_path('app/public/foods/foods_covers/' . $food->gambar));
            }
        };
        $food->delete();

        Alert::success('Succes', 'Data Makanan Berhasil Di Hapus');
        return redirect()->route('food.index');
    }

}
