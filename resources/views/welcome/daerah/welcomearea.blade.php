@extends('layouts.master')

@section('page-css')

@endsection

@section('main-content')

@include('layouts.navbar')

<div class="container">

    <div class="col-lg-6 my-4 items-align-center">
        <form class="d-flex " role="search" action="{{ route('welcomearea') }}">
            <input class="form-control me-2" name="search" type="search" placeholder="Search" aria-label="Search"
                value="{{ request('search') }}">
            <button class="btn btn-outline-warning" type="submit">Search</button>
        </form>

    </div>
    <div class="col-lg-6 items-align-center">
        <p>Menampilkan {{ $areas->count() }} Data Daerah</p>
    </div>



    <div class="row">

        <!-- Contoh Minuman -->

        {{-- @foreach($areas as $area)
            <div class="col-lg-4 my-3">
                <div class="card area-card" style="height: 100%;">
                    <div class="card-body">
                        <h5 class="card-title">{{ $area->provinsi }}</h5>
        <p class="card-text">Kota / Kabupaten : {{ $area->kabupaten }}</p>
        <p class="card-text">Sejarah : {{ $area->sejarah }}</p>
        <p class="card-text">Foto Monumen : </p>
        <img src="{{ asset('storage/areas/areas_covers/'.$area->foto_monumen) }}" class="card-img-top area-img"
            alt="..." style="max-width: 200px;">
        <p class="card-text">Foto Baju Adat : </p>
        <img src="{{ asset('storage/areas/areas2_covers/'.$area->foto_baju_adat) }}" class="card-img-top area-img"
            alt="..." style="max-width: 200px;">
    </div>
    <center>

        <a href="{{ route('area.show',$area->id) }}" class="btn btn-success my-2 w-50">Detail</a>
    </center>


</div>

</div>
@endforeach --}}

@if ($areas->count() ==0)
    <h4 class="text-center mb-4">Data Tidak Ditemukan</h4>

@else

@foreach($areas as $area)
<div class="col-lg-4 my-3 ">
    <div class="card area-card" style="height: 100%;">
        <center>

            <div class="card-body">
                {{-- <p class="card-title">{{ $area->id }}</p> --}}
                <h5 class="card-title">{{ $area->provinsi }}</h5>
                {{-- <p class="card-text">Foto Monumen : </p> --}}
                <img src="{{ asset('storage/areas/areas_covers/'.$area->foto_monumen) }}" class="card-img-top area-img"
                    alt="..." style="max-width: 200px;">

            </div>

            {{-- @dd($area) --}}

            <a href="{{ route('area.show',$area->id) }}" class="btn btn-success my-2 w-50">Detail</a>
        </center>


        {{-- <a href="{{ route('area.show', $area->id) }}" class="btn btn-primary">Detail</a> --}}
    </div>

</div>
@endforeach
@endif

</div>
</div>
<div class="pagination justify-content-center">
    {{ $areas->links() }}
</div>



@include('layouts.footer')

@endsection

@section('page-js')

@endsection
