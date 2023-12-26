<?php

namespace App\Http\Controllers;

use App\Models\core_customer;
use App\Models\InvItem;
use App\Models\InvItemType;
use App\Models\InvItemUnit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InvItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = InvItem::select('*')
        ->get();
        return view('content/InvItem/ListInvItem', compact('items'));
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
    public function getTypeName($item_type_id)
    {
        $name = InvItemType::where('item_type_id', $item_type_id)
            ->first();

        return $name['item_type_name'] ?? '';
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
    
   
}
