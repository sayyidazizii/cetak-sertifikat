<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalesInvoiceItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales_invoice_items', function (Blueprint $table) {
            $table->bigIncrements('sales_invoice_item_id');
            $table->integer('sales_invoice_id');
            $table->integer('item_id');
            $table->integer('item_type_id');
            $table->integer('item_unit_id');
            $table->decimal('item_unit_price',8,2);
            $table->decimal('quantity',8,1);
            $table->decimal('total_amount',8,2);
            $table->integer('created_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sales_invoice_items');
    }
}
