@extends('layouts.master')

@section('page-css')

@endsection

@section('main-content')

@include('layouts.admin_navbar')

<div class="container my-5">
    <div class="row">
        <div class="col-lg-6">
            <a href="{{ route('food.create') }}" class="btn btn-warning mb-4">Add Food</a>
            <p>Menampilkan {{ $foods->count() }} Data Makanan</p>
            {{-- <p>Menampilkan {{ $foods->count() }} Data Makanan</p> --}}
        </div>
        <div class="col-lg-6">
            <form class="d-flex" role="search" action="{{ route('food.index') }}">
                <input class="form-control me-2" name="search" type="search" placeholder="Search" aria-label="Search"
                    value="{{ request('search') }}">
                <button class="btn btn-outline-warning" type="submit">Search</button>
            </form>
        </div>
    </div>
    <div class="col-12">



        <div class="card">
            <div class="card-header">
                <h4>Data Makanan</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <div id="table-1_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4 no-footer">

                        <div class="row">
                            <div class="col-sm-12">
                                <table class="table table-striped dataTable no-footer" id="table-1" role="grid"
                                    aria-describedby="table-1_info">
                                    <thead>
                                        <tr role="row">
                                            <th>No</th>
                                            <th>Makanan</th>
                                            <th>Sejarah Makanan</th>
                                            <th>Bahan Bahan</th>
                                            <th>Langkah Langkah</th>
                                            <th>Foto Makanan</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>


                                    <tbody>
                                        @if ($foods->count() == 0)
                                            <tr>
                                                <td colspan="7" class="text-center">
                                                        Data Makanan Tidak Di Temukan
                                                </td>
                                            </tr>

                                        @else

                                        @foreach ($foods as $food)

                                            <tr>
                                            <th>{{ $loop->iteration }}</th>
                                            <th>{{ $food->nama}}</th>
                                            <td>{{ $food->sejarah}}</td>
                                            <td>{{ $food->bahan}}</td>
                                            <td>{{ $food->langkah}}</td>

                                            <td>
                                                <img src="{{ asset('storage/foods/foods_covers/' . $food->gambar) }}"
                                                    alt="" style="max-width: 200px;">
                                            </td>
                                            <td>
                                                <a class="btn btn-primary my-1"
                                                    href="{{ route('food.edit', $food->id) }}">Edit</a>
                                                    <button data-bs-toggle="modal" data-bs-target="#Modal{{ $food->id }}" class="btn btn-danger">Delete</button>
                                                <a href="#" class="btn btn-success my-1">Detail</a>
                                            </td>

                                        </tr>

                                        {{-- Modal  --}}

                                        <div class="modal fade" id="Modal{{ $food->id }}" tabindex="-1"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Delete Data
                                                        </h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        Yakin Ingin Menghapus Makanan {{ $food->nama }}
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">Close</button>
                                                            <form action="{{ route('food.destroy', $food->id) }}" method="POST">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="btn btn-danger">Delete</button>
                                                            </form>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>

                                        @endforeach
                                        @endif


                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

@include('layouts.footer')

@endsection

@section('page-js')

@endsection
