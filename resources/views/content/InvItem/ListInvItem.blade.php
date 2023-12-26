@inject('InvItem', 'App\Http\Controllers\InvItemController')
@extends('layouts.app')

@section('content')

<div class="container-fluid">
  <div class="card">
    <div class="card-body">
      <h5 class="card-title fw-semibold mb-4 text-center">List Items</h5>
      <div class="container">
        <div class="table-responsive">
          <table id="tabel-data" class="table table-bordered table-advance table-hover">
            <thead class="thead-light bg-primary text-light">
              <tr>
                <th>No</th>
                <th>Item</th>
                <th>Tipe</th>
                <th>Satuan</th>
                <th>Harga</th>
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
                <td>{{ $item->item_name }}</td>
                <td>{{ $InvItem->getTypeName($item->item_type_id) }}</td>
                <td>{{ $InvItem->getItemUnitName($item->item_unit_id) }}</td>
                <td>{{ $item->item_unit_price }}</td>
                <td>
                  
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