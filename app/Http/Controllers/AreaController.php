<?php

namespace App\Http\Controllers;

// use App\Models\area;
use App\Models\Area;
use Illuminate\Http\Request;
use App\Http\Requests\StoreareaRequest;
use App\Http\Requests\UpdateareaRequest;
use RealRashid\SweetAlert\Facades\Alert;

class AreaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');

        $areas = Area::select([
            'id',
            'provinsi',
            'kabupaten',
            'sejarah',
            'foto_monumen',
            'foto_baju_adat'
        ])
        ->where('provinsi' ,'like' , "%{$search}%")
        ->orWhere('kabupaten' ,'like' , "%{$search}%")
        ->orderBy('provinsi' ,'asc')
        ->paginate(10);


        return view('dashboard.data.area.index' ,compact ('areas'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view ('dashboard.data.area.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreareaRequest $request)
    {
        try{
            $validatedData =$request->validate([
                'provinsi' => 'required|string|max:255',
                'kabupaten' => 'required|string|max:255',
                'sejarah' => 'required|string',
                'foto_monumen' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
                'foto_baju_adat' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
            ]);

            if ($request->hasFile('foto_monumen')) {
                $file = $request->file('foto_monumen');
                // Ganti spasi dengan strip dan hapus karakter khusus lainnya
                $fileName = time() . '_' . str_replace([' ', '%', '#', '@', '+', '=', '?', '&', '$', '^'], '-', $file->getClientOriginalName());
                $file->storeAs('public/areas/areas_covers' , $fileName);
            } else {
                $fileName = 'not_set.png'; // Jika tidak ada foto_monumen yang diunggah, gunakan foto_monumen foto_monumen
            }

            if ($request->hasFile('foto_baju_adat')) {
                $file = $request->file('foto_baju_adat');
                // Ganti spasi dengan strip dan hapus karakter khusus lainnya
                $baju_adat = time() . '_' . str_replace([' ', '%', '#', '@', '+', '=', '?', '&', '$', '^'], '-', $file->getClientOriginalName());
                $file->storeAs('public/areas/areas2_covers' , $baju_adat);
            } else {
                $baju_adat = 'not_set.png'; // Jika tidak ada foto_monumen yang diunggah, gunakan foto_monumen foto_baju_adat
            }


            $validatedData['foto_baju_adat'] = $baju_adat;

            $validatedData['foto_monumen'] = $fileName;


            Area::create($validatedData);

            Alert::success('Berhasil', 'Sukses Menambah Data');


            return redirect()->route('area.index');
            // return redirect()->route('area.index')->with('message', ['alert'=>'success', 'message'=> 'Category created successfully.']);
            }

            catch(\Exception $e)
            {
                Alert::error('Error', 'Gagal Menambah Data');

                // dd($e->getMessage());
                return redirect()->route('area.create')->withInput();
                // return redirect()->route('area.create')->with('message', ['alert'=>'danger', 'message'=> $e->getMessage()]);
            }
    }


    /**
     * Display the specified resource.
    */


    public function show($id)
    {
        $area = Area::select([
            'id',
            'provinsi',
            'kabupaten',
            'sejarah',
            'foto_monumen',
            'foto_baju_adat'
        ])
        ->paginate(10)
        ->where('id' ,'=', $id)
        ->first();

        return view ('dashboard.data.area.detail' , compact('area'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(area $area,$id)
    {
        $area = Area::findOrFail($id); // Finds the area record with the given ID or fails if not found
        return view ('dashboard.data.area.edit' ,compact('area'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateareaRequest $request, area $area,$id)
    {
        try{
            $area = Area::findOrFail($id);

            $validatedData = $request->validate([
                'provinsi' => 'required|string',
                'kabupaten' => 'required|string',
                'sejarah' => 'nullable|string',
                'foto_monumen' => 'nullable|image|mimes:jpeg,png,jpg|max:2048', // Validasi untuk file foto_monumen
                'foto_monumen' => 'nullable|image|mimes:jpeg,png,jpg|max:2048' // Validasi untuk file foto_monumen
        ]);

            $fileName = $area->foto_monumen; // kalau foto_monumen tidak diedit, maka namanya sama
            if ($request->hasFile('foto_monumen')) { // kalau  foto_monumen diedit
                $file = $request->file('foto_monumen'); //menampung nilai requestr file
                // Ganti spasi dengan strip dan hapus karakter khusus lainnya
                $fileName = time() . '_' . str_replace([' ', '%', '#', '@', '+', '=', '?', '&', '$', '^'], '-', $file->getClientOriginalName());
                $file->storeAs('public/areas/areas_covers', $fileName);
                //untuk mengetahui apakah file lama perlu dihapus
                if ($area->foto_monumen != $file->getClientOriginalName() && $area->foto_monumen != 'not_set.png' && $area->foto_monumen == $area->foto_monumen ) {
                    unlink(storage_path('app/public/areas/areas_covers/' . $area->foto_monumen));
                }
            }

            $baju_adat = $area->foto_baju_adat; // kalau foto_baju_adat tidak diedit, maka namanya sama
            if ($request->hasFile('foto_baju_adat')) { // kalau  foto_baju_adat diedit
                $file = $request->file('foto_baju_adat'); //menampung nilai requestr file
                // Ganti spasi dengan strip dan hapus karakter khusus lainnya
                $baju_adat = time() . '_' . str_replace([' ', '%', '#', '@', '+', '=', '?', '&', '$', '^'], '-', $file->getClientOriginalName());
                $file->storeAs('public/areas/areas2_covers', $baju_adat);
                //untuk mengetahui apakah file lama perlu dihapus
                if ($area->foto_baju_adat != $file->getClientOriginalName() && $area->foto_baju_adat != 'not_set.png' && $area->foto_baju_adat == $area->foto_baju_adat ) {
                    unlink(storage_path('app/public/areas/areas2_covers/' . $area->foto_baju_adat));
                }
            }
            $validatedData['foto_baju_adat'] = $baju_adat;

            $validatedData['foto_monumen'] = $fileName;

            $area ->update($validatedData);
            Alert::success('Berhasil', 'Sukses Edit Data');

            return redirect()->route('area.index');


        }catch(\Exception $e){
            dd($e->getMessage());
            return redirect()->route('area.edit' ,$id);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(area $area ,$id)
    {
        $area=Area::findOrFail($id);
        if($area->foto_monumen != 'not_set.png'){
            // unlink(storage_path('app/public/areas/areas_covers/' . $area->foto_monumen));
            if(file_exists(storage_path('app/public/areas/areas_covers/' . $area->foto_monumen))){
                unlink(storage_path('app/public/areas/areas_covers/' . $area->foto_monumen));
            }
        };

        if($area->foto_baju_adat != 'not_set.png'){
                if(file_exists(storage_path('app/public/areas/areas_covers/' . $area->foto_baju_adat))){
                    unlink(storage_path('app/public/areas/areas2_covers/' . $area->foto_baju_adat));
                }
        }

        $area->delete();

        Alert::success('Succes', 'Data Berhasil Di Hapus');
        return redirect()->route('area.index');

    }

    // public function detailarea($id){
    //     $areas = Area::select([
    //         'id',
    //         'provinsi',
    //         'kabupaten',
    //         'sejarah',
    //         'foto_monumen',
    //         'foto_baju_adat'
    //     ])
    //     ->paginate(10);

    //     return view ('welcome.daerah.detailarea',compact('areas'));
    // }


}
