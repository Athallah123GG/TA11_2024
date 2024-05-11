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
    <form action="{{ route('area.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="card-body">
            <div class="form-group py-2">
                <label for="text">Provinsi</label>
                <input type="text" class="form-control" id="text" placeholder="Provinsi" name="provinsi" value="{{ old('provinsi') }}">
            </div>

            <div class="form-group py-2">
                <label for="text">Kota Kabupaten</label>
                <input type="text" class="form-control" id="text" placeholder="Kabupaten" name="kabupaten" value="{{ old('kabupaten') }}">
            </div>

            <div class="form-group py-2">
                <label for="message">Sejarah</label>
                <textarea class="form-control" id="message" rows="4" placeholder="Deskripsi Sejarah"
                    name="sejarah"> {{ old('sejarah') }}</textarea>
            </div>

            <div class="form-group py-2 ">
                <label for="message">Foto Monumen</label>
                <div class="custom-file">

                    <input type="file" class="custom-file-input" id="inputGroupFile01" value=""
                        aria-describedby="inputGroupFileAddon01" name="foto_monumen">
                    <label class="custom-file-label" for="inputGroupFile01">Choose file</label>

                </div>
            </div>

            <div class="form-group py-2">
                <label for="message">Foto Baju adat</label>
                <div class="custom-file">

                    <input type="file" class="custom-file-input" id="inputGroupFile01" value=""
                        aria-describedby="inputGroupFileAddon01" name="foto_baju_adat">
                    <label class="custom-file-label" for="inputGroupFile01">Choose file</label>

                </div>
            </div>

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
