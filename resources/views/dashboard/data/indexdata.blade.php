@extends('layouts.master')

@section('page-css')

<style>
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

    body {
        font-family: 'Montserrat', sans-serif;

    }

    /* Category Ads */

    #ads {
        margin: 30px 0 30px 0;

    }

    #ads .card-notify-badge {
        position: absolute;
        left: -10px;
        top: -20px;
        background: #f2d900;
        text-align: center;
        border-radius: 30px 30px 30px 30px;
        color: #000;
        padding: 5px 10px;
        font-size: 14px;

    }

    #ads .card-notify-year {
        position: absolute;
        right: -10px;
        top: -20px;
        background: #ff4444;
        border-radius: 50%;
        text-align: center;
        color: #fff;
        font-size: 14px;
        width: 50px;
        height: 50px;
        padding: 15px 0 0 0;
    }


    #ads .card-detail-badge {
        background: #f2d900;
        text-align: center;
        border-radius: 30px 30px 30px 30px;
        color: #000;
        padding: 5px 10px;
        font-size: 14px;
    }



    #ads .card:hover {
        background: #fff;
        box-shadow: 12px 15px 20px 0px rgba(46, 61, 73, 0.15);
        border-radius: 4px;
        transition: all 0.3s ease;
    }

    #ads .card-image-overlay {
        font-size: 20px;

    }


    #ads .card-image-overlay span {
        display: inline-block;
    }


    #ads .ad-btn {
        text-transform: uppercase;
        width: 150px;
        height: 40px;
        border-radius: 80px;
        font-size: 16px;
        line-height: 35px;
        text-align: center;
        border: 3px solid #e6de08;
        display: block;
        text-decoration: none;
        margin: 20px auto 1px auto;
        color: #000;
        overflow: hidden;
        position: relative;
        background-color: #e6de08;
    }

    #ads .ad-btn:hover {
        background-color: #e6de08;
        color: #1e1717;
        border: 2px solid #e6de08;
        background: transparent;
        transition: all 0.3s ease;
        box-shadow: 12px 15px 20px 0px rgba(46, 61, 73, 0.15);
    }

    #ads .ad-title h5 {
        text-transform: uppercase;
        font-size: 18px;
    }

    /* font align */
    /*
    .fa {
        text-align: center
    } */

</style>

@endsection

@section('main-content')

@include('layouts.admin_navbar')



<div class="container">
    <br>
    <h4>Dashboard Data</h2>
        <br>
        <div class="row" id="ads">
            <!-- Category Card -->
            <div class="col-md-4">
                <div class="card rounded">
                    <div class="card-image">
                        <span class="card-notify-badge">Total : </span>
                        {{-- <span class="card-notify-year">2018</span> --}}
                        <center>
                            <img class="img-fluid" src="{{ asset('image/banner/DAERAHs.png') }}" alt="Alternate Text" />

                        </center>
                    </div>

                    <div class="card-body text-center">
                        <div class="ad-title m-auto">
                           <h5>Daerah</h5>
                        </div>
                        <a class="ad-btn" href="{{ route('area.index') }}">View</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card rounded">
                    <div class="card-image">
                        <span class="card-notify-badge">Total : </span>
                        {{-- <span class="card-notify-year">2018</span> --}}
                        <center>
                            <img class="img-fluid" src="{{ asset('image/banner/FOODs.png') }}" alt="Alternate Text" />

                        </center>
                    </div>

                    <div class="card-body text-center">
                        <div class="ad-title m-auto">
                           <h5>Makanan</h5>
                        </div>
                        <a class="ad-btn" href="{{ route('food.index') }}">View</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card rounded">
                    <div class="card-image">
                        <span class="card-notify-badge">Total : </span>
                        {{-- <span class="card-notify-year">2018</span> --}}
                        <center>
                            <img class="img-fluid" src="{{ asset('image/banner/DRINKs.png') }}" alt="Alternate Text" />

                        </center>
                    </div>

                    <div class="card-body text-center">
                        <div class="ad-title m-auto">
                           <h5>Minuman</h5>
                        </div>
                        <a class="ad-btn" href="{{ route('drink.index') }}">View</a>
                    </div>
                </div>
            </div>


        </div>
</div>




@include('layouts.footer')

@endsection

@section('page-js')

@endsection
