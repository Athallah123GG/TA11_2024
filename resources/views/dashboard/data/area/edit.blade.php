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
        <form action="{{ route('area.update',$area->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="card-body">
                <div class="form-group py-2">
                    <label for="text">Provinsi</label>
                    <input type="text" class="form-control" id="text" placeholder="Provinsi" name="provinsi"
                        value="{{ $area->provinsi }}">
                </div>

                <div class="form-group py-2">
                    <label for="text">Kota Kabupaten</label>
                    <input type="text" class="form-control" id="text" placeholder="Kabupaten" name="kabupaten"
                        value="{{ $area->kabupaten }}">
                </div>

                <div class="form-group py-2">
                    <label for="message">Sejarah</label>
                    <textarea class="form-control" id="message" rows="4" placeholder="Deskripsi Sejarah"
                        name="sejarah">{{ $area->sejarah }}</textarea>
                </div>

                <div class="form-group py-2 ">
                    <div class="custom-file">
                        <label for="message">Foto Monumen</label>
                        <div class="custom-file">
                            <input type="file" class="form-control" id="foto_monumen" name="foto_monumen"
                                accept="image/*" onchange="previewImage(event)">
                            <img id="preview" src="{{ asset('storage/areas/areas_covers/' . $area->foto_monumen) }}"
                                alt="" style="max-width: 200px; display: block; margin-top: 10px;">
                        </div>
                    </div>
                </div>

                <div class="form-group py-2 ">
                    <div class="custom-file">
                        <label for="message">Foto Baju Adat</label>
                        <div class="custom-file">
                            <input type="file" class="form-control" id="foto_baju_adat" name="foto_baju_adat"
                                accept="image/*" onchange="previewImage(event)">
                            <img id="preview" src="{{ asset('storage/areas/areas2_covers/' . $area->foto_baju_adat) }}"
                                alt="" style="max-width: 200px; display: block; margin-top: 10px;">
                        </div>
                    </div>
                </div>

                <button type="submit" class="btn btn-warning my-4">Edit Data</button>
                {{-- <a href="{{ route('create') }}" class="btn btn-warning my-4">Add Data</a> --}}
            </div>
        </form>

    </div>
</div>



@include('layouts.footer')

@endsection

@section('page-js')

@endsection
