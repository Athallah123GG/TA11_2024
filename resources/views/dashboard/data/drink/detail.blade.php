@extends('layouts.master')

@section('page-css')

@endsection

@section('main-content')

@include('layouts.navbar')

<div class="container py-4">
    <div class="row">
        <div class="col-lg-6">
            {{-- <h1 class="text-center">Foto Monumen</h1><br> --}}
            <img src="{{ asset('storage/drinks/drinks_covers/'. $drink->foto_minuman) }}" class="img-fluid" >
        </div>
        <div class="col-lg-6">
            {{-- <h2>{{ $drink->id }}</h2> --}}
            <h2>{{ $drink->minuman }}</h2>
            <p><strong>Sejarah : <br> </strong> {{ $drink->sejarah }}</p>
            <p><strong>Bahan Bahan : <br> </strong> {{ $drink->bahan }}</p>
            <p><strong>Langkah Pembuatan : <br> </strong> {{ $drink->langkah }}</p>
            {{-- <p><strong>Langkah Pembuatan :</strong> {{ $drink->langkah }}</p> --}}


            </p>
            {{-- <p><strong>Category:</strong> {{ $drink->category_name }}</p> --}}


        </div>
    </div>
    <hr>
    <!-- Section for related drinks -->
    {{-- <div class="row">
        <div class="col">
            <h3>Related drinks</h3>
            <div class="row">
                @foreach($relateddrinks as $drink)
                <div class="col-lg-3 col-md-4 col-sm-6 my-3 mx-auto">
                    <div class="card drink-card " style="height: 100%;">

                        <img src="{{ asset('storage/drinks/drink_covers/'.$drink->drink_cover) }}"
                            class="card-img-top drink-img" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">{{ $drink->title }}</h5>
                            <p class="card-text">Penerbit: {{ $drink->publisher_name }}</p>
                            <p class="card-text">Harga: ${{ $drink->price }}</p>
                        </div>
                        <a href="{{ route('drink.show', $drink->id) }}" class="btn btn-primary">Detail</a>
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
