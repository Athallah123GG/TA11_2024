@extends('layouts.master')

@section('page-css')

@endsection

@section('main-content')

@include('layouts.navbar')

<section class="py-5">
    <div class="container px-5 pb-5">
        <div class="row gx-5 align-items-center">
            <div class="col-xxl-5">
                <!-- section text content-->
                <div class="text-center text-xxl-start">
                    <div class="badge bg-gradient-primary-to-secondary text-white mb-4">
                        <div class="text-uppercase">Design · Development · Marketing</div>
                    </div>
                    <div class="fs-3 fw-light text-muted">PROFILE</div>
                    <h1 class="display-4 fw-bolder mb-5"><span class="text-gradient d-inline">Athallah Naufal
                            Andifiandra</span></h1>
                    <div class="d-grid gap-3 d-sm-flex justify-content-sm-center justify-content-xxl-start mb-3">
                        <a class="btn btn-success btn-lg px-5 py-3 me-sm-3 fs-6 fw-bolder"
                            href="resume.html">WhatsApp</a>
                        <a class="btn btn-outline-dark btn-lg px-5 py-3 fs-6 fw-bolder" href="projects.html">Free
                            Fire</a>
                    </div>
                </div>
            </div>
            <div class="col-xxl-7">
                <!-- section profile picture-->
                <div class="d-flex justify-content-center mt-5 mt-xxl-0">
                    <div class="profile bg-gradient-primary-to-secondary">
                        <img src="{{ asset('image/banner/DRINKs.png') }}" alt="" style="max-width:400px;">

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="py-5">
    <div class="container px-5 pb-5">
        <div class="row gx-5 align-items-center">

            <div class="col-xxl-7">
                <!-- section profile picture-->
                <div class="d-flex justify-content-center mt-5 mt-xxl-0">
                    <div class="profile bg-gradient-primary-to-secondary">
                        <img src="{{ asset('image/banner/DRINKs.png') }}" alt="" style="max-width:400px;">
                    </div>
                </div>
            </div>

            <div class="col-xxl-5">
                <!-- section text content-->
                <div class="text-center text-xxl-start">
                    <div class="badge bg-gradient-primary-to-secondary text-white mb-4">
                        <div class="text-uppercase">Design · Development · Marketing</div>
                    </div>
                    <div class="fs-3 fw-light text-muted">PROFILE </div>
                    <h1 class="display-4 fw-bolder mb-5"><span class="text-gradient d-inline">My Teammate Partner</span></h1>
                    <div class="d-grid gap-3 d-sm-flex justify-content-sm-center justify-content-xxl-start mb-3">
                        <a class="btn btn-success btn-lg px-5 py-3 me-sm-3 fs-6 fw-bolder"
                            href="resume.html">WhatsApp</a>
                        <a class="btn btn-outline-dark btn-lg px-5 py-3 fs-6 fw-bolder" href="projects.html">Mobile Legend</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@include('layouts.footer')

@endsection

@section('page-js')

@endsection
