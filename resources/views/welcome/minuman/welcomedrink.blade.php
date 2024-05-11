@extends('layouts.master')

@section('page-css')

@endsection

@section('main-content')

    @include('layouts.navbar')

    <div class="container">
        <div class="col-lg-6 my-5 items-align-center">
            <form class="d-flex " role="search" action="{{ route('welcomedrink') }}">
                <input class="form-control me-2" name="search" type="search" placeholder="Search" aria-label="Search"
                    value="{{ request('search') }}">
                <button class="btn btn-outline-warning" type="submit">Search</button>
            </form>
        </div>
        <div class="row">
            <!-- Contoh Minuman -->

            @foreach($drinks as $drink)
            <div class="col-lg-4 my-3">
                <div class="card drink-card" style="height: 100%;">
                    <center>

                        <div class="card-body">
                            {{-- <p class="card-title">{{ $drink->id }}</p> --}}
                            <h5 class="card-title">{{ $drink->minuman }}</h5>
                            {{-- <p class="card-text">Foto Monumen : </p> --}}
                            <img src="{{ asset('storage/drinks/drinks_covers/'.$drink->foto_minuman) }}"
                                class="card-img-top drink-img" alt="..." style="max-width: 200px;">

                        </div>

                        {{-- @dd($drink) --}}

                        <a href="{{route( 'drink.show' ,$drink->id) }}" class="btn btn-success my-2 w-50">Detail</a>
                    </center>
                    {{-- <a href="{{ route('drink.show', $drink->id) }}" class="btn btn-primary">Detail</a> --}}
                </div>
            </div>
            @endforeach

        </div>
    </div>
    <div class="pagination justify-content-center">
        {{ $drinks->links() }}
    </div>

    @include('layouts.footer')

@endsection

@section('page-js')

@endsection
