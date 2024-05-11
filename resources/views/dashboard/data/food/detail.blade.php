@extends('layouts.master')

@section('page-css')

@endsection

@section('main-content')

@include('layouts.navbar')

<div class="container py-4">
    <div class="row">
        <div class="col-lg-6">
            {{-- <h1 class="text-center">Foto Monumen</h1><br> --}}
            <img src="{{ asset('storage/foods/foods_covers/'. $food->gambar) }}" class="img-fluid" >
        </div>
        <div class="col-lg-6">
            {{-- <h2>{{ $food->id }}</h2> --}}
            <h2>{{ $food->nama }}</h2>
            <p><strong>Sejarah : <br> </strong> {{ $food->sejarah }}</p>
            <p><strong>Bahan Bahan : <br> </strong> {{ $food->bahan }}</p>
            <p><strong>Langkah Pembuatan : <br> </strong> {{ $food->langkah }}</p>
            {{-- <p><strong>Langkah Pembuatan :</strong> {{ $food->langkah }}</p> --}}


            </p>
            {{-- <p><strong>Category:</strong> {{ $food->category_name }}</p> --}}


        </div>
    </div>
    <hr>
    <!-- Section for related foods -->
    {{-- <div class="row">
        <div class="col">
            <h3>Related foods</h3>
            <div class="row">
                @foreach($relatedfoods as $food)
                <div class="col-lg-3 col-md-4 col-sm-6 my-3 mx-auto">
                    <div class="card food-card " style="height: 100%;">

                        <img src="{{ asset('storage/foods/food_covers/'.$food->food_cover) }}"
                            class="card-img-top food-img" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">{{ $food->title }}</h5>
                            <p class="card-text">Penerbit: {{ $food->publisher_name }}</p>
                            <p class="card-text">Harga: ${{ $food->price }}</p>
                        </div>
                        <a href="{{ route('food.show', $food->id) }}" class="btn btn-primary">Detail</a>
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
