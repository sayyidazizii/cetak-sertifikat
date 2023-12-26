@inject('Certificate', 'App\Http\Controllers\CertificateController')
@extends('layouts.app')

@section('content')

<div class="container-fluid">
  <div class="card">
    <div class="card-body">
      <h5 class="card-title fw-semibold mb-4 text-center">List Certificate</h5>
      <div class="container">
        <div class="table-responsive">
          <table id="tabel-data" class="table table-bordered table-advance table-hover">
            <thead class="thead-light bg-primary text-light">
              <tr>
                <th>No</th>
                <th>No Sertifikat</th>
                <th>Tanggal Sertifikat</th>
                <th>Nama</th>
                <th>Kelas</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              @php
              $total = 0;
              $no = 1;
              $subtotal_amount =0;

              @endphp
              @foreach($items as $item)
             
              <tr>
                <td>{{ $no }}</td>
                <td>{{ $item->certificate_no }}</td>
                <td>{{ $item->certificate_date }}</td>
                <td>{{ $Certificate->getNamebyId($item->participant_id) }}</td>
                <td>{{ $Certificate->getWinnerbyId($item->winner_id) }}</td>
                <td>
                    <a href="" class="btn btn-warning"><i class="ti ti-pencil"></i></a>
                    <a href="" class="btn btn-danger"><i class="ti ti-trash"></i></a>
                    <a href="" class="btn btn-secondary"><i class="ti ti-file-description""></i></a>
                </td>
              </tr>
              @php
              $total_no = $no;
              $no++;
              @endphp
              @endforeach
            </tbody>
          </table>
          </ </div>
        </div>
      </div>

      @endsection