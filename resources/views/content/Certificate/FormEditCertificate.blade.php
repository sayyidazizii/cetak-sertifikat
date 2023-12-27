@inject('Certificate', 'App\Http\Controllers\CertificateController')

@extends('layouts.app')

@section('content')

<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <a href="/certificate" class="btn btn-primary">
                < kembali</a>
                    <h5 class="card-title fw-semibold mb-4 text-center">Edit </h5>
                    <div class="container">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Sertifikat</h1>
                            </div>
                            <div class="modal-body">
                                <form method="post" action="{{ route('update-certificate') }}">
                                    @csrf
                                    <input type="text" name="certificate_id" value="{{ $data->certificate_id }}" hidden>
                                    <div class="d-grid gap-2 mb-2">
                                        <label for="" class="form-label">Nama Peserta</label>
                                        <select class="js-example-basic-single" id="participant_id" name="participant_id" value="{{ $data->participant_id }}">
                                            @foreach($participant as $item)
                                            <option value="{{ $item->participant_id }}">{{ $item->participant_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="d-grid gap-2">
                                        <label for="" class="form-label">Kelas</label>
                                        <select class="js-example-basic-single" id="winner_id" name="winner_id"  value="{{ $data->winner_id }}">
                                            @foreach($winner as $item)
                                            <option value="{{ $item->winner_id }}">{{ $item->winner_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                            </div>
                            <div class="modal-footer mt-2">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                                </form>
                            </div>
                        </div>
                    </div>

                    @endsection