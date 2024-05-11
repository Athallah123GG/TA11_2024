@extends('layouts.master')

@section('page-css')

<style>
    .fotohead {}

    .custom-card {
        margin: 0;
        float: none;
        max-width: 1000px;
        padding: px;
        border-radius: 15px;
        box-shadow:
    }

    .ya-card {
        border-radius: 15px;
    }

    .gbr-custom {
        border-radius: 15px;
    }

    .card {
        border-radius: 4px;
        background: #fff;
        box-shadow: 0 6px 10px rgba(0, 0, 0, .08), 0 0 6px rgba(0, 0, 0, .05);
        transition: .3s transform cubic-bezier(.155, 1.105, .295, 1.12), .3s box-shadow, .3s -webkit-transform cubic-bezier(.155, 1.105, .295, 1.12);
        /* padding: 14px 80px 18px 36px; */
        cursor: pointer;
        margin: 0 auto;
        /* Added */
        float: none;
        /* Added */
    }

    .card:hover {
        transform: scale(1.05);
        box-shadow: 0 10px 20px rgba(0, 0, 0, .12), 0 4px 8px rgba(0, 0, 0, .06);
    }

</style>

@endsection

@section('main-content')

@include('layouts.navbar')

{{-- <section class="container py-5">
    <div class="row">
        <div class="col-lg-4 " >
            <h1 class="fw-bold text-left mt-5">
                Explore About Nusantara
                <br>And Be The Winner <br>Lets'Goooo Explore!
            </h1>
            <span class="text-muted">
                Tugas Akhir Kelas XI Jurusan PPLG Tahun 2024
               <br> Test Property By : Athallah Naufal A XI PPLG 1
            </span>
            <div class="mt-3">
                <a href="#" class="btn btn-dark">Explore!</a>
            </div>

        </div>
        <div class="col-lg-4">
            <img src="{{ asset('image/cover/sadfs.png') }}" alt="" class="fotohead">
</div>

</div>
</section> --}}

<div class="container align-items-center ">
    <div class="card my-5 custom-card shadow bg-white rounded">
        <img class="card-img-top gbr-custom" src="{{ asset('image/banner/Banner.jpg') }}" alt="Card image cap">
    </div>
</div>

<section class="bg-light py-5">
    <div class="container bg-light">

        <div class="">
            <h1 class="text-center mb-6 py-5">
                Categories
            </h1>
        </div>

        <div class="row center ya-card">
            <div class="col-lg-4 ">
                <div class="card" style="width: 25rem;">
                    <center>
                        <img src="{{ asset('image/banner/DAERAH.png') }}" alt="" style="max-width: 200px;">

                    </center>
                    <div class="card-body">
                        <a href="{{ route('welcomearea') }}"
                            class="card-title text-center fs-4 stretched-link nav-link">Daerah</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card" style="width: 25rem">
                    <center>
                        <img src="{{ asset('image/banner/FOOD.png') }}" alt="" style="max-width: 200px;">
                    </center>
                    <div class="card-body">
                        <a href="{{ route('welcomefood') }}"
                            class="card-title text-center fs-4 stretched-link nav-link">Makanan</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card" style="width: 25rem;">
                    <center>
                        <img src="{{ asset('image/banner/DRINK.png') }}" alt="" style="max-width: 200px;">
                    </center>
                    <div class="card-body">
                        <a href="{{ route('welcomedrink') }}"
                            class="card-title text-center fs-4 stretched-link nav-link">Minuman</a href="">
                    </div>
                </div>
            </div>

            <div class="onlymargin my-4">

            </div>

        </div>

    </div>
</section>






@include('layouts.footer')

@endsection

@section('page-js')

@endsection
