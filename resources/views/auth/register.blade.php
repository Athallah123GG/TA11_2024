@extends('layouts.master')
@section('page-css')

<style>
    * {
        font-family: "Lexend", sans-serif;
    }

</style>

@endsection

@section('main-content')

@include('layouts.navbar')

<section class="vh-100">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col col-xl-10">
                <div class="card shadow-lg bg-white" style="border-radius: 1rem;">
                    <div class="row g-0">
                        <div class="col-md-6 col-lg-5 d-none d-md-block">
                            <img src="{{ asset('image/cover/register_cover.png') }}" alt="login form" class="img-fluid"
                                style="border-radius: 1rem 0 0 1rem" />
                        </div>
                        <div class="col-md-6 col-lg-7 d-flex align-items-center ">
                            <div class="card-body p-4 p-lg-5 text-black  ">

                                <form action="{{ route ('storeUser') }}" method="post" class="">
                                    @csrf

                                    <div class="d-flex align-items-center mb-3 pb-1">
                                        <ion-icon name="construct-outline" class="fs-1 mx-3"></ion-icon>
                                        <span class="h2 fw-bold mb-0">Register NusantaraDev</span>
                                    </div>

                                    <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Buat Akun anda</h5>

                                    <div data-mdb-input-init class="form-outline mb-4">
                                        <label for="name" class="form-label">Name:</label>
                                        <input type="text" class="form-control" id="name" placeholder="Enter name" name="name" required>
                                    </div>
                                    <div data-mdb-input-init class="form-outline mb-4">
                                        <label for="email" class="form-label">Email:</label>
                                        <input type="text" class="form-control" id="email" placeholder="Enter email" name="email" required>
                                    </div>
                                    <div data-mdb-input-init class="form-outline mb-4">
                                        <label for="password" class="form-label" >Password:</label>
                                        <input type="password" class="form-control" id="password" placeholder="Enter password" name="password" required>
                                    </div>
                                    <div data-mdb-input-init class="form-outline mb-4">
                                        <label for="password_confirmation" class="form-label">Confirm Password:</label>
                                        <input type="password" class="form-control" id="password_confirmation" placeholder="Confirm password" name="password_confirmation" required>
                                    </div>

                                    <div class="pt-1 mb-4">
                                        <button class="btn btn-dark btn-lg btn-block" type="submit">Register</button>
                                    </div>

                                    <p class="mb-5 pb-lg-2" style="color: #393f81;">Sudah ada akun? <a href="{{ route('login') }}"
                                            style="color: #393f81;">Login Disini</a></p>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="mb-2"></div>


@include('layouts.footer')

@endsection
@section('page-js')

@endsection
