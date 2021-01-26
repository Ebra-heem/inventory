<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePurchasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchases', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->unsignedInteger('supplier_id');
            $table->unsignedInteger('product_id');
            $table->string('purchase_qty');
            $table->string('buy_price');
            $table->string('sell_price');
            $table->string('total');
            $table->unsignedInteger('wirehouse_id');
            $table->string('wh_stock_qty')->nullable();
            $table->string('sr_stock_qty')->default(0);
            $table->string('paid')->nullable();
            $table->string('previous_due')->nullable();
            $table->string('due')->nullable();
            $table->text('note')->nullable();
            $table->tinyInteger('status')->default(0);
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
        Schema::dropIfExists('purchases');
    }
}
