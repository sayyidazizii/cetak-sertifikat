@inject('Certificate', 'App\Http\Controllers\CertificateController')
@extends('layouts.app')

@section('content')

<div class="container-fluid">
@if(session('msg'))
<div class="alert alert-info" role="alert">
    {{session('msg')}}
</div>
@endif 
  <div class="card">
    <div class="card-body">
      <h5 class="card-title fw-semibold mb-4 text-center">List Certificate</h5>
      <div class="container">
      <input class="form-control" id="myInput" type="text" placeholder="Search..">
        <div class="accordion accordion-flush" id="accordionFlushExample">
          <div class="accordion-item">
            <h2 class="accordion-header">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                <span class="badge text-bg-primary"><i class="ti ti-plus"></i> Sertifikat Baru</span>
              </button>
            </h2>
            <div id="flush-collapseOne" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
              <div class="accordion-body">
                <div class="modal-content">
                  <div class="modal-header">
                  </div>
                  <div class="modal-body">
                    <form method="post" action="{{ route('save-certificate') }}">
                      @csrf
                      <div class="d-grid gap-2 mb-2">
                        <label for="" class="form-label">Nama Peserta</label>
                        <select class="js-example-basic-single" id="participant_id" name="participant_id">
                          @foreach($participant as $item)
                          <option value="{{ $item->participant_id }}">{{ $item->participant_name }}</option>
                          @endforeach
                        </select>
                      </div>
                      <div class="d-grid gap-2">
                        <label for="" class="form-label">Kelas</label>
                        <select class="js-example-basic-single" id="winner_id" name="winner_id">
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
            </div>
          </div>
        </div>
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
            <tbody  id="myTable">
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
                  <a href="certificate/edit/{{ $item->certificate_id }}" class="btn btn-warning btn-sm"><i class="ti ti-pencil"></i></a>
                  <a href="{{ route('hapus-certificate', ['certificate_id' => $item->certificate_id]) }}" name='Reset' class='btn btn-danger btn-sm' onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Data Ini ?')"><i class="ti ti-trash"></i></a>
                  <a href="certificate/print/{{ $item->certificate_id }}" target="_blank" class="btn btn-secondary btn-sm"><i class="ti ti-file-description""></i></a>
                </td>
              </tr>
              @php
              $total_no = $no;
              $no++;
              @endphp
              @endforeach
            </tbody>
          </table>
          </div>
          {{ $items->links() }}
        </div>
      </div>



<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
      @endsection