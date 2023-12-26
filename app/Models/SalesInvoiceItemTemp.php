<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SalesInvoiceItemTemp extends Model
{
    use HasFactory;
    protected $guarded=['sales_invoice_item_temp_id'];
}
