@extends('layouts.master')

@section('page-css')

@endsection

@section('main-content')

@include('layouts.navbar')

<div class="container">
    <div class="col-lg-6 my-5 items-align-center">
        <form class="d-flex " role="search" action="{{ route('welcomefood') }}">
            <input class="form-control me-2" name="search" type="search" placeholder="Search" aria-label="Search"
                value="{{ request('search') }}">
            <button class="btn btn-outline-warning" type="submit">Search</button>
        </form>
    </div>

    <div class="col-lg-6 items-align-center">
        <p>Menampilkan {{ $foods->count() }} Data Makanan</p>
    </div>

    <div class="row">
        <!-- Contoh Minuman -->
    @if ($foods->count() ==0)
        <h4 class="text-center mb-4">Data Tidak Ditemukan</h4>

        @else
        @foreach($foods as $food)


        <div class="col-lg-4 my-3">
            <div class="card food-card" style="height: 100%;">
                <center>

                    <div class="card-body">
                        {{-- <p class="card-title">{{ $food->id }}</p> --}}
                        <h5 class="card-title">{{ $food->nama }}</h5>
                        {{-- <p class="card-text">Foto Monumen : </p> --}}
                        <img src="{{ asset('storage/foods/foods_covers/'.$food->gambar) }}"
                            class="card-img-top food-img" alt="..." style="max-width: 200px;">

                    </div>

                    {{-- @dd($food) --}}

                    <a href="{{route( 'food.show' ,$food->id) }}" class="btn btn-success my-2 w-50">Detail</a>
                </center>
                {{-- <a href="{{ route('food.show', $food->id) }}" class="btn btn-primary">Detail</a> --}}
            </div>


        </div>

        @endforeach
        @endif

    </div>
</div>
<div class="pagination justify-content-center">
    {{ $foods->links() }}
</div>

@include('layouts.footer')

@endsection

@section('page-js')

@endsection
