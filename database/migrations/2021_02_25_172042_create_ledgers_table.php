<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLedgersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ledgers', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->string('particular');
            $table->string('description')->nullable();
            $table->unsignedInteger('chart_account_id');
            $table->unsignedInteger('supplier_id')->nullable();
            $table->unsignedInteger('customer_id')->nullable();
            $table->unsignedInteger('purchase_id')->nullable();
            $table->unsignedInteger('sale_invoice_id')->nullable();
            $table->unsignedInteger('stock_id')->nullable();
            $table->string('amount');
            $table->string('account_type');
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
        Schema::dropIfExists('ledgers');
    }
}
