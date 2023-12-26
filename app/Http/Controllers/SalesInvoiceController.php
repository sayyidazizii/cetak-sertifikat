<?php

namespace App\Http\Controllers;

use App\Models\InvItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use App\Models\core_customer;
use App\Models\customer_id_temp;
use App\Models\InvItemUnit;
use App\Models\SalesInvoice;
use App\Models\SalesInvoiceItem;
use App\Models\SalesInvoiceItemTemp;
use App\Models\User;
use Elibyy\TCPDF\Facades\TCPDF;
use Yajra\DataTables\Facades\DataTables;
use Carbon\Carbon;
use Illuminate\Support\Facades\Redirect;

class SalesInvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $type = InvItem::select('inv_items.item_id', 'inv_items.item_name', DB::raw('CONCAT(inv_items.item_name, " ", inv_item_types.item_type_name) AS name'))
            ->join('inv_item_types', 'inv_item_types.item_type_id', 'inv_items.item_type_id')
            ->get();
        $itemTemp = SalesInvoiceItemTemp::select('*')
            ->where('created_id', Auth::id())
            ->get();
        $customer_temp = customer_id_temp::select('*')
            ->where('created_id', Auth::id())
            ->first();
        Session::forget('salesinvoiceelements');
        $customer = core_customer::all();
        return view('content/SalesInvoice/FormAddSalesInvoice', compact('type', 'itemTemp', 'customer', 'customer_temp'));
    }

    public function history()
    {

        $salesinvoice = salesinvoice::select('*')
        ->get();
        return view('content/SalesInvoice/ListSalesInvoice', compact('salesinvoice'));
    }

    public function processAddArraySalesOrderItem(Request $request)
    {
        $fields = $request->validate([
            'item_id'                       => 'required',
            'quantity'                      => 'required',
        ]);

        $salesinvoiceitemtemp = array(
            'item_id'                        => $request->item_id,
            'quantity'                        => $request->quantity,
            'created_id'                    => Auth::id()

        );

        SalesInvoiceItemTemp::create($salesinvoiceitemtemp);

        // return redirect('/sales-invoice');
    }

    public function getKasirName($created_id)
    {
        $name = User::where('id', $created_id)
            ->first();

        return $name['name'];
    }

    public function getItemName($item_id)
    {
        $name = InvItem::select('inv_items.item_id', 'inv_items.item_name', DB::raw('CONCAT(inv_items.item_name, " ", inv_item_types.item_type_name) AS name'))
            ->join('inv_item_types', 'inv_item_types.item_type_id', 'inv_items.item_type_id')
            ->where('item_id', $item_id)
            ->first();

        return $name['name'];
    }

    public function getItemPrice($item_id)
    {
        $name = InvItem::where('item_id', $item_id)
            ->first();

        return $name['item_unit_price'];
    }

    public function getCustomerName($customer_id)
    {
        $name = core_customer::where('customer_id', $customer_id)
            ->first();

        return $name['customer_name'] ?? '';
    }

    public function getTypeId($item_id)
    {
        $name = InvItem::where('item_id', $item_id)
            ->first();

        return $name['item_type_id'] ?? '';
    }

    public function getUnitID($item_id)
    {
        $name = InvItem::where('item_id', $item_id)
            ->first();

        return $name['item_unit_id'] ?? '';
    }

    public function getItemUnitName($item_unit_id)
    {
        $name = InvItemUnit::where('item_unit_id', $item_unit_id)
            ->first();

        return $name['item_unit_name'] ?? '';
    }
    public function elements_add(Request $request)
    {

        $customer_temp = array(
            'customer_id'                        => $request->customer_id,
            'created_id'                        => Auth::id()

        );
        $customer = customer_id_temp::where('created_id', Auth::id())
            ->get();
        $data = count($customer);
        if ($data > 0) {
            $customer = customer_id_temp::where('created_id', Auth::id())
                ->update([
                    'customer_id' => $request->customer_id
                ]);
        } else {
            customer_id_temp::create($customer_temp);
        }
    }


    public function deleteItem($sales_invoice_item_temp_id)
    {
        $data = SalesInvoiceItemTemp::where('sales_invoice_item_temp_id', $sales_invoice_item_temp_id)
            ->delete();

        if ($data) {
            return redirect('/sales-invoice');
        } else {
            return redirect('/sales-invoice');
        }
    }


    public function invoiceNumber()
        {
            $latest = SalesInvoice::latest()->first();

            if (! $latest) {
                return 'DWB0001';
            }

            $string = preg_replace("/[^0-9\.]/", '', $latest->sales_invoice_no);

            return 'DWB' . sprintf('%04d', $string+1);
        }



    public function processAdd(Request $request)
    {

        //dd($request->all());    
        $salesinvoice = array(
            'sales_invoice_no'                          => $this->invoiceNumber(),
            'sales_invoice_date'                        => $request->sales_invoice_date,
            'customer_id'                                => $request->customer_id,
            'subtotal_amount'                            => $request->subtotal_amount,
            'created_id'                                => Auth::id()
        );
        if(SalesInvoice::create($salesinvoice)){
            $salesinvoiceid = SalesInvoice::select('sales_invoice_id','sales_invoice_date','created_at')
            ->where('created_id', Auth::id())
            ->orderBy('created_at', 'DESC')
            ->first();
           //dd($salesinvoiceid);


        $dataitem = $request->all();
        $total_no = $request->total_no;
        for ($i = 1; $i <= $total_no; $i++) {
            $salesinvoiceitem = array(
                'sales_invoice_id' =>   $salesinvoiceid['sales_invoice_id'],
                'item_id' =>   $dataitem['item_id_'.$i],
                'item_type_id' =>   $dataitem['item_type_id_'.$i],
                'item_unit_id' =>   $dataitem['item_unit_id_'.$i],
                'quantity' =>   $dataitem['quantity_'.$i],
                'item_unit_price' =>   $dataitem['item_unit_price_'.$i],
                'total_amount' =>   $dataitem['total_amount_'.$i],
                'created_id' =>   Auth::id(),
            );
            SalesInvoiceItem::create($salesinvoiceitem);
        }
      //  dd($salesinvoiceitem);
       
        }

        SalesInvoiceItemTemp::where('created_id', Auth::id())
            ->delete();
        customer_id_temp::where('created_id', Auth::id())
            ->delete();

        return Redirect::to('http://127.0.0.1:8000/sales-invoice/print/'.$salesinvoiceid['sales_invoice_id']);
        // return redirect('/sales-invoice/'.$salesinvoiceid['sales_invoice_id']);
       
    }



    public function print($sales_invoice_id){
        $sales_invoice = SalesInvoice::select('*')
        ->where('sales_invoice_id',$sales_invoice_id)
        ->where('created_id', Auth::id())
        ->first();

        $sales_invoice_item = salesinvoiceItem::select('*')
        ->where('sales_invoice_id',$sales_invoice_id)
        ->where('created_id', Auth::id())
        ->get();

        $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);


        $pdf::SetPrintHeader(false);
        $pdf::SetPrintFooter(false);

        $pdf::SetMargins(5, 1, 5, 1); // put space of 10 on top

        $pdf::setImageScale(PDF_IMAGE_SCALE_RATIO);

        if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
            require_once(dirname(__FILE__).'/lang/eng.php');
            $pdf::setLanguageArray($l);
        }

        $pdf::AddPage('P', array(48, 3276));

        $pdf::SetFont('helvetica', '', 10);

        $tbl = "
        <table style=\" font-size:9px; \">
            <tr>
                <td style=\"text-align: center; font-size:12px; font-weight: bold\">Dwita Binatu</td>
            </tr>
            <tr>
                <td style=\"text-align: center; font-size:9px;\">Suko RT 02/02 Sukosari,Jumantono</td>
            </tr>
            <tr>
                <td style=\"text-align: center; font-size:9px;\">Telp. 083839046957</td>
            </tr>
        </table>
        ";
        $pdf::writeHTML($tbl, true, false, false, false, '');
        $kasir = ucfirst(Auth::user()->name);
        $tblStock1 = "
        <div>--------------------------------</div>
        <table style=\" font-size:9px; \" >
            <tr>
                <td style=\"text-align: center; font-size:9px; font-weight: bold\">---  ".$this->getCustomerName($sales_invoice['customer_id'])."  ---</td>
            </tr>
            <tr>
                <td style=\"text-align: center; \" width=\" 100% \">#".$kasir."/".date('d/m/Y', strtotime($sales_invoice['created_at']))."/".$sales_invoice['sales_invoice_no']."#</td>
            </tr>
        </table>
         <div>-------------------------------</div>
        ";

        $tblStock2 = "
        <table style=\" font-size:9px; \" width=\" 100% \" border=\"0\">
        ";

        $tblStock3 = "";
        $items = count($sales_invoice_item);
        $no = 1;
        foreach ($sales_invoice_item as $key => $val) {
            $tblStock3 .= "
            <tr>
            <td width=\" 100% \" style=\"text-align: left; \">".$this->getItemName($val['item_id'])."</td>
            </tr>
                <tr>
                    <td width=\" 40% \" style=\"text-align: left; \">".number_format($val['item_unit_price'])." /&nbsp;".$this->getItemUnitName($val['item_unit_id'])."</td>
                    <td width=\" 20% \" style=\"text-align: left; \">x ".$val['quantity']."</td>
                    <td width=\" 40% \" style=\"text-align: left; \">".number_format($val['total_amount'])."</td>
                </tr>
                <br>
            ";
        }
        
        $tblStock4 = "
        </table>
         <div>-------------------------------</div>
        <table style=\" font-size:9px; \" width=\" 100% \" border=\"0\">
        <tr>
            <td width=\" 35% \" style=\"text-align: left; font-weight:bold;\">".$items." Items</td>
            <td width=\" 50% \" style=\"text-align: right; font-weight:bold;\">Total : ".number_format($sales_invoice['subtotal_amount'])."</td>
        </tr>
        ";

        $tblStock5 = "
        </table>
        <div>--------------------------------</div>
        <table style=\" font-size:9px; \" width=\" 100% \" border=\"0\">
            <tr>
                <td width=\" 100% \" style=\"text-align: center;\">Terima Kasih</td>
            </tr>
        </table>
        ";

        $pdf::writeHTML($tblStock1.$tblStock2.$tblStock3.$tblStock4.$tblStock5, true, false, false, false, '');


        $filename = 'Nota_Penjualan.pdf';
        $pdf::Output($filename, 'I');

    }
}
