@inject('SalesInvoice', 'App\Http\Controllers\SalesInvoiceController')
@extends('layouts.app')

@section('content')

<div class="container-fluid">
  <div class="card">
    <div class="card-body">
      <h5 class="card-title fw-semibold mb-4 text-center">Riwayat Transaksi</h5>
      <div class="container">
        <div class="table-responsive">
          <table id="tabel-data" class="table table-bordered table-advance table-hover">
            <thead class="thead-light bg-primary text-light">
              <tr>
                <th>No</th>
                <th>Nomor Invoice</th>
                <th>Pelanggan</th>
                <th>Tanggal</th>
                <th>Total</th>
                <th>Kasir</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              @php
              $total = 0;
              $no = 1;
              $subtotal_amount =0;

              @endphp
              @foreach($salesinvoice as $item)
             
              <tr>
                <td>{{ $no }}</td>
                <td>{{ $item->sales_invoice_no }}</td>
                <td>{{ $SalesInvoice->getCustomerName($item->customer_id) }}</td>
                <td>{{ $item->sales_invoice_date }}</td>
                <td>{{ $item->subtotal_amount }}</td>
                <td>{{ $SalesInvoice->getKasirName($item->created_id) }}</td>
                <td>
                  <a target="_blank" href="/sales-invoice/print/{{ $item['sales_invoice_id'] }}" class="btn btn-outline-success">Nota</a>
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