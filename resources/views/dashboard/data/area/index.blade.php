@extends('layouts.master')

@section('page-css')

@endsection

@section('main-content')

@include('layouts.admin_navbar')



<div class="container my-5">
    <div class="row">

        <div class="col-lg-6">
            <a href="{{ route('area.create') }}" class="btn btn-warning mb-4">Add Daerah</a>
            <p>Menampilkan {{ $areas->count() }} Data Daerah</p>
        </div>
        <div class="col-lg-6">
            <form class="d-flex" role="search" action="{{ route('area.index') }}">
                <input class="form-control me-2" name="search" type="search" placeholder="Search" aria-label="Search"
                    value="{{ request('search') }}">
                <button class="btn btn-outline-warning" type="submit">Search</button>
            </form>
        </div>

    </div>

    <div class="col-12">

        <div class="card">
            <div class="card-header">
                <h4>Data Daerah</h4>
            </div>
            <div class="card-body">
                <div class="">
                    <div id="" class="container-fluid">

                        <div class="row">
                            <div class="col-sm-12 table-responsive">
                                <table class="table table-striped dataTable no-footer" id="table-1" role="grid"
                                    aria-describedby="table-1_info">
                                    <thead>
                                        <tr role="row">
                                            <th>No</th>
                                            <th>Provinsi</th>
                                            <th>Kota Kabupaten</th>
                                            <th>Sejarah</th>
                                            <th>Foto Monumen</th>
                                            <th>Foto Baju Adat</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        {{-- <p>data tdk ditemindeukan</p> --}}
                                        @if ($areas->count() ==0)
                                        <tr>
                                            <td colspan="7" class="text-center">
                                                Data Tidak Di Temukan
                                            </td>
                                        </tr>
                                        @else
                                        @foreach ($areas as $area)
                                        <tr>
                                            <th scope="row">{{ $loop->iteration }}</th>
                                            <td>{{ $area ->provinsi}}</td>
                                            <td>{{ $area ->kabupaten}}</td>
                                            <td>{{ $area ->sejarah}}</td>
                                            <td>
                                                <img src="{{ asset('storage/areas/areas_covers/' . $area->foto_monumen) }}"
                                                    alt="" style="max-width: 200px;">
                                            </td>
                                            <td>
                                                <img src="{{ asset('storage/areas/areas2_covers/' . $area->foto_baju_adat) }}"
                                                    alt="" style="max-width: 200px;">
                                            </td>

                                            <td>
                                                <a class="btn btn-primary my-1"
                                                    href="{{ route('area.edit', $area->id) }}">Edit</a>
                                                <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#Modal{{ $area->id }}">Delete</button>
                                                <a href="#" class="btn btn-success my-1">Detail</a>

                                            </td>

                                        </tr>

                                        {{-- #form  id='form' --}}
                                        {{-- .form class='form' --}}



                                        <!-- Modal -->
                                        <div class="modal fade" id="Modal{{ $area->id }}" tabindex="-1"
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
                                                        Yakin Ingin Menghapus provinsi {{ $area->provinsi }} Kabupaten
                                                        {{ $area->kabupaten }}
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">Close</button>
                                                            <form action="{{ route('area.destroy', $area->id) }}" method="POST">
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
