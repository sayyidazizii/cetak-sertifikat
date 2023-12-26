@inject('SalesInvoice', 'App\Http\Controllers\SalesInvoiceController')
@extends('layouts.app')

@section('content')

<div class="container-fluid">
  <div class="card">
    <div class="card-body">
      <h5 class="card-title fw-semibold mb-4 text-center">Cassier</h5>
      <div class="container">
        <form action="{{ route('process-add-sales-invoice') }}" method="POST">
          @csrf
          <fieldset>
            <div class="mb-3">
              <div class="d-grid gap-2">
                <label for="" class="form-label">Nama Pelanggan</label>
                <select class="js-example-basic-single" id="customer_id_view" name="customer_id_view" onchange="elements_add()">
                  <option value="0">-- pilih pelanggan -- </option>
                  @foreach($customer as $item)
                  <option value="{{ $item->customer_id }}">{{ $item->customer_name }}</option>
                  @endforeach
                </select>
                <input  type="text" readonly name="customer" class="form-control" id="customer" value="{{ $SalesInvoice->getCustomerName($customer_temp['customer_id'] ?? '')}}">
                <input hidden type="text" name="customer_id" class="form-control" id="customer_id" value="{{ $customer_temp['customer_id'] ?? ''}}">
                <input hidden  type="date" name="sales_invoice_date" class="form-control" id="sales_invoice_date" value="{{ date('Y-m-d');  }}">
              </div>
            </div>
      <div class="d-grid gap-2">
        <label for="" class="form-label">Nama Tipe</label>
        <select class="js-example-basic-single" id="item_id" name="item_id_view">
          @foreach($type as $item)
          <option value="{{ $item->item_id }}">{{ $item->name }}</option>
          @endforeach
        </select>
      </div>
      <div class="mb-3 mt-2">
        <label for="" class="form-label">Quantity</label>
        <input type="text" name="quantity" class="form-control" id="quantity" placeholder="berat">
      </div>
      <div class="d-grid gap-2">
        <button type="button" class="btn btn-primary" onclick="processAddArraySalesOrderItem()"><i class="ti ti-plus"></i>Tambah</button>
      </div>
      </fieldset>
    </div>
  </div>
</div>
<!-- itemstemp -->
<div class="card">
  <div class="card-body">
    <h5 class="card-title fw-semibold mb-4 text-center">Items</h5>
    <div class="container">
        <fieldset>
          <div class="table-responsive">
            <table class="table table-bordered table-advance table-hover">
              <thead class="thead-light bg-primary text-light">
                <tr>
                  <th>Item</th>
                  <th>Qty</th>
                  <th>Harga</th>
                  <th>Total</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                @php
                $total = 0;
                $no = 1;
                $subtotal_amount =0;
                
                @endphp
                @foreach($itemTemp as $item)
                @php
                $total = $SalesInvoice->getItemPrice($item->item_id) * $item->quantity;
                $subtotal_amount += $SalesInvoice->getItemPrice($item->item_id) * $item->quantity;
                @endphp
                <tr>
                  <!-- <td>{{ $no }}</td> -->
                  <td>{{ $SalesInvoice->getItemName($item->item_id) }} 
                  <input hidden type="text" value="{{ $item->item_id }}" name="item_id_{{ $no }}" class="form-control" id="item_id_{{ $no }}">
                  </td>
                  <td>{{ $item->quantity }} 
                  <input hidden type="text" value="{{ $item->quantity }}" name="quantity_{{ $no }}" class="form-control" id="quantity_{{ $no }}">
                  
                  <input hidden type="text" value="{{ $SalesInvoice->getTypeId($item->item_id) }}" name="item_type_id_{{ $no }}" class="form-control" id="item_type_id_{{ $no }}">  
                </td>
                  <td>{{$SalesInvoice->getItemPrice($item->item_id) }}
                  <input hidden type="text" value="{{ $SalesInvoice->getItemPrice($item->item_id) }}" name="item_unit_price_{{ $no }}" class="form-control" id="item_unit_price_{{ $no }}">

                  <input hidden type="text" value="{{ $SalesInvoice->getUnitID($item->item_id) }}" name="item_unit_id_{{ $no }}" class="form-control" id="item_unit_id_{{ $no }}">
                  </td>
                  <td>{{ $total }}
                  <input hidden type="text" value="{{ $total }}" name="total_amount_{{ $no }}" class="form-control" id="total_amount_{{ $no }}">
                  </td>
                  <td><a href="{{ url('/sales-invoice/delete/'.$item->sales_invoice_item_temp_id) }}" class="btn btn-danger"><i class="ti ti-trash"></i></a></td>
                </tr>
                @php
                    $total_no = $no;
                    $no++;
                @endphp
                @endforeach
              </tbody>
            </table>
          </div>
          <input hidden type="text" value="{{ $total_no ?? '' }}" name="total_no" class="form-control" id="total_no">
          <input hidden type="text" value="{{ $subtotal_amount }}" name="subtotal_amount" class="form-control" id="subtotal_amount">
          <div class="row">
            <div class="col">
              <a class="btn btn-primary" href="/sales-invoice"><i class="ti ti-refresh"></i></a>
            </div>
            <div class="col">
            </div>
            <div class="col">
              <button type="submit" class="btn btn-primary" ><i class="ti ti-check"></i>Simpan</button>
            </div>
          </div>
        </fieldset>
      </form>
    </div>
  </div>
</div>
</div>

@endsection