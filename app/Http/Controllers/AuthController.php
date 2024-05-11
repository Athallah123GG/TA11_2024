<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;


class AuthController extends Controller
{
    public function login (){
        return view ('auth.login');
    }

    //Login Method
    public function authenticate (Request $request){

        try{
            $credentials = $request -> validate([
                'email' => 'required|email|exists:users,email',
                'password' => 'required'
            ]);

            if (Auth::attempt(['email' => $credentials['email'], 'password' => $credentials['password']])){
                $request->session()->regenerate();

                $userRole = auth()->user()->role_id;
                // Menentukan destinasi redirect berdasarkan peran pengguna
                if ($userRole == 1) {
                    return redirect()->intended('/dashboard');

                } else {
                    return redirect()->intended('/');
                }
                // dd('berhasil');
            };



        }

        catch(\Exception $e){
            dd($e->getMessage());
        }

    }


    public function register(){
        return view ('auth.register');
    }

    //Registrasi Method
    public function storeUser(Request $request){
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users|max:255',
            'password' => 'required|min:8|confirmed',
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->email_verified_at = now();
        $user->password = Hash::make($request->password);
        $user->role_id = 2 ;
        $user->save();

        // return redirect()->route('login')->with('message', ['alert'=>'success', 'message'=>'Registration successful. Please login.'] );
        Alert::success('Berhasil', 'Sukes Membuat Akun Silahkan Login');

        return redirect()->route('login');

    }

    public function unauthenticate(){
        session()->flush(); // Menghapus semua data sesi, termasuk informasi otentikasi pengguna
        Auth::logout(); // Fungsi logout() untuk keluar dari sesi pengguna
        Alert::success('Berhasil', 'Sukes LogOut');

        return redirect('/'); // Redirect pengguna ke halaman utama atau halaman lain yang Anda tentukan

    }
}


