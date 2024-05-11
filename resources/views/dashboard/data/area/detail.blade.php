@extends('layouts.master')

@section('page-css')

@endsection

@section('main-content')

@include('layouts.navbar')

<div class="container py-4">
    <div class="row">
        <div class="col-lg-6">
            {{-- <h1 class="text-center">Foto Monumen</h1><br> --}}
            <img src="{{ asset('storage/areas/areas_covers/'. $area->foto_monumen) }}" class="img-fluid" >

            <div class="my-4">
                 <p><strong>Foto Baju Adat : <br> </strong>
                <img src="{{ asset('storage/areas/areas2_covers/'. $area->foto_baju_adat) }}"  class="img-fluid my-4" style="max-width: 200px;">
            </div>

        </div>
        <div class="col-lg-6">
            {{-- <h2>{{ $area->id }}</h2> --}}
            <h2>{{ $area->provinsi }}</h2>
            <p><strong>Kota : </strong> {{ $area->kabupaten }}</p>
            <p><strong>Sejarah : <br> </strong> {{ $area->sejarah }}</p>


            </p>
            {{-- <p><strong>Category:</strong> {{ $area->category_name }}</p> --}}


        </div>
    </div>
    <hr>
    <!-- Section for related areas -->
    {{-- <div class="row">
        <div class="col">
            <h3>Related areas</h3>
            <div class="row">
                @foreach($relatedareas as $area)
                <div class="col-lg-3 col-md-4 col-sm-6 my-3 mx-auto">
                    <div class="card area-card " style="height: 100%;">

                        <img src="{{ asset('storage/areas/area_covers/'.$area->area_cover) }}"
                            class="card-img-top area-img" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">{{ $area->title }}</h5>
                            <p class="card-text">Penerbit: {{ $area->publisher_name }}</p>
                            <p class="card-text">Harga: ${{ $area->price }}</p>
                        </div>
                        <a href="{{ route('area.show', $area->id) }}" class="btn btn-primary">Detail</a>
                    </div>
                </div>
                @endforeach
            </div>

        </div>
    </div> --}}
</div>

@include('layouts.footer')

@endsection

@section('page-js')

@endsection
