@extends('layouts.master')

@section('page-css')

<style>
    * {
        font-family: "Poppins", sans-serif;
    }

    .ukuran-icon {
        font-size: 40px
    }

</style>


@endsection

@section('main-content')

@include('layouts.admin_navbar')



<section style="background-color: #;">
    <div class="container py-5">
        <div class="row">
            <div class="col">
                <div class="">
                    <h1 class="my-4">Dashboard {{ auth()->user()->name }}</h1>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-3">
                <div class="card bg-primary text-white">
                    <div class="card-body">
                        <h5 class="card-title">Data</h5>
                        <p class="card-text">Total : 3</p>
                        <a href="{{ route('indexdata') }}" class="btn btn-light">View Data</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="card bg-success text-white">
                    <div class="card-body">
                        <h5 class="card-title">Profile</h5>
                        <p class="card-text">Total: </p>
                        <a href="" class="btn btn-light">View Profile</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="card bg-warning text-dark">
                    <div class="card-body">
                        <h5 class="card-title">User</h5>
                        <p class="card-text">Total: </p>
                        <a href="" class="btn btn-light">View User</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="card bg-info text-white">
                    <div class="card-body">
                        <h5 class="card-title">Table</h5>
                        <p class="card-text">Total:</p>
                        <a href="" class="btn btn-light">View Table</a>
                    </div>
                </div>
            </div>
        </div>


    </div>
</section>

<div class="div my-5">
    {{-- <h1 class="text-center">TA KLS XI 2K24 AWOOZMZKMKZSODKWKSABDJKBASDKW2</h1> --}}
</div>


    @include('layouts.footer')

@endsection

@section('page-js')

@endsection
