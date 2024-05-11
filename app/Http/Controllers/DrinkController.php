<?php

namespace App\Http\Controllers;

// use App\Models\drink;
use App\Models\Drink;
use Illuminate\Http\Request;
use App\Http\Requests\StoreDrinkRequest;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Requests\UpdateDrinkRequest;


class DrinkController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request )
    {
        $search = $request->input('search');

        $drinks = Drink::select([
            'id',
            'minuman',
            'sejarah',
            'bahan',
            'langkah',
            'foto_minuman'
        ])
        ->where('minuman','like' ,"%{$search}%")
        ->orderBy('minuman' ,'asc')
        ->paginate(10);

        return view('dashboard.data.drink.index' ,compact ('drinks'));

        // return view ('dashboard.data.minuman.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view ('dashboard.data.drink.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreDrinkRequest $request)
    {
        try

        {
            $validatedData = $request->validate([
                        'minuman' => 'nullable|string',
                        'sejarah' => 'required|string',
                        'bahan' => 'nullable|string',
                        'langkah' => 'nullable|string',
                        'foto_minuman' => 'image|mimes:jpeg,png,jpg|max:2048|required' // Validasi untuk file foto_minuman
                    ]);

                    if ($request->hasFile('foto_minuman')) {
                        $file = $request->file('foto_minuman');
                        // Ganti spasi dengan strip dan hapus karakter khusus lainnya
                        $fileName = time() . '_' . str_replace([' ', '%', '#', '@', '+', '=', '?', '&', '$', '^'], '-', $file->getClientOriginalName());
                        $file->storeAs('public/drinks/drinks_covers', $fileName);
                    } else {
                        $fileName = 'not_set.png'; // Jika tidak ada foto_minuman yang diunggah, gunakan foto_minuman default
                    }

                    $validatedData['foto_minuman'] = $fileName;

                    Drink::create($validatedData);
                    Alert::success('Berhasil', 'Sukses Menambah Data');

                    return redirect()->route('drink.index');
        }

        catch(\Exception $e)
            {
                dd($e->getMessage());
                return redirect()->route('drink.create');

                // return redirect()->route('book.create')->with('message', ['alert'=>'danger', 'message'=> $e->getMessage()]);
            }
    }

    /**
     * Display the specified resource.
     */
    public function show(Drink $drink ,$id)
    {
        $drink = Drink::select([
            'id',
            'minuman',
            'sejarah',
            'bahan',
            'langkah',
            'foto_minuman'
        ])
        ->paginate(10)
        ->where('id' ,'=',$id)
        ->first();

        return view ('dashboard.data.drink.detail' ,compact('drink')) ;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Drink $drink ,$id)
    {
        $drink = Drink::findOrFail($id);
        return view ('dashboard.data.drink.edit' , compact('drink'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDrinkRequest $request, Drink $drink,$id)
    {
        try{
            $drink=Drink::findOrFail($id);


            $validatedData = $request->validate([
                'minuman' => 'required|string',
                'sejarah' => 'required|string',
                'bahan' => 'nullable|string',
                'langkah' => 'nullable|string',
                'foto_minuman' => 'nullable|image|mimes:jpeg,png,jpg|max:2048' // Validasi untuk file foto_minuman
        ]);

        $fileName = $drink->foto_minuman; // kalau foto_minuman tidak diedit, maka namanya sama
            if ($request->hasFile('foto_minuman')) { // kalau  foto_minuman diedit
                $file = $request->file('foto_minuman'); //menampung nilai requestr file
                // Ganti spasi dengan strip dan hapus karakter khusus lainnya
                $fileName = time() . '_' . str_replace([' ', '%', '#', '@', '+', '=', '?', '&', '$', '^'], '-', $file->getClientOriginalName());
                $file->storeAs('public/drinks/drinks_covers', $fileName);
                //untuk mengetahui apakah file lama perlu dihapus
                if ($drink->foto_minuman != $file->getClientOriginalName() && $drink->foto_minuman != 'not_set.png' && $drink->foto_minuman == $drink->foto_minuman ) {
                    unlink(storage_path('app/public/drinks/drinks_covers/' . $drink->foto_minuman));
                }
            }
            $validatedData['foto_minuman'] = $fileName;

            $drink ->update($validatedData);
            return redirect()->route('drink.index');


        }catch(\Exception $e){
            dd($e->getMessage());
            return redirect()->route('drink.edit' ,$id);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Drink $drink ,$id)
    {
        $drink=Drink::findOrFail($id);
        if($drink->foto_minuman != 'not_set.png'){
            // unlink(storage_path('app/public/drinks/drinks_covers/' . $drink->foto_minuman));
            if(file_exists(storage_path('app/public/drinks/drinks_covers/' . $drink->foto_minuman))){
                unlink(storage_path('app/public/drinks/drinks_covers/' . $drink->foto_minuman));
            }
        };
        $drink->delete();

        alert()->success('Berhasil','Sukses hapus Data');

        return redirect()->route('drink.index');
    }
}
