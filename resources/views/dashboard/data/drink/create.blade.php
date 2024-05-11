@extends('layouts.master')

@section('page-css')

@endsection

@section('main-content')

@include('layouts.admin_navbar')

<div class="container my-5 w-50">
    <div class="card">
        <div class="card-header">
            <h4>Input Data</h4>
        </div>
        <form action="{{ route('drink.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="card-body">
                <div class="form-group py-2">
                    <label for="text">Nama Minuman</label>
                    <input type="text" class="form-control" id="nama" placeholder="Nama Minuman" name="minuman">
                </div>

                <div class="form-group py-2">
                    <label for="message">Sejarah Minuman</label>
                    <textarea class="form-control" id="sejarah" rows="4" placeholder="Sejarah Minuman"
                        name="sejarah"></textarea>
                </div>

                <div class="form-group py-2">
                    <label for="message">Bahan Bahan</label>
                    <textarea class="form-control" id="bahan" rows="4" placeholder="Deskripsi Bahan Bahan"
                        name="bahan"></textarea>
                </div>

                <div class="form-group py-2">
                    <label for="message">Langkah Langkah</label>
                    <textarea class="form-control" id="langkah" rows="4"
                        placeholder="Deskripsi Langkah Langkah Pembuatan" name="langkah"></textarea>
                </div>

                <div class="form-group py-2 ">
                    <div class="custom-file">
                        <label class="custom-file-label" for="inputGroupFile01">Foto Minuman</label>
                        <input type="file" class="form-control" id="foto_minuman" name="foto_minuman">
                    </div>
                </div>

                {{-- <div class="form-group py-2">
                <label for="message">Foto Baju adat</label>
                <div class="custom-file">

                    <input type="file" class="custom-file-input" id="inputGroupFile01"
                        aria-describedby="inputGroupFileAddon01" name="foto_baju_adat">
                    <label class="custom-file-label" for="inputGroupFile01">Choose file</label>

                </div>
            </div> --}}

                <button type="submit" class="btn btn-warning my-4">Add Data</button>
                {{-- <a href="{{ route('create') }}" class="btn btn-warning my-4">Add Data</a> --}}
            </div>
        </form>

    </div>
</div>



@include('layouts.footer')

@endsection

@section('page-js')

@endsection
