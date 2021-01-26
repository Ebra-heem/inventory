<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->integer('stockin_id');
            $table->integer('vendor_id');
            $table->string('qty');
            $table->string('weight');
            $table->string('price');
            $table->string('commission')->nullable();
            $table->string('labour_cost')->nullable();
            $table->string('bag_cost')->nullable();
            $table->string('vehicle_cost')->nullable();
            $table->string('rental_cost')->nullable();
            $table->string('other_cost')->nullable();
            $table->string('total');
            $table->string('paid')->nullable();
            $table->string('due')->nullable();
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
        Schema::dropIfExists('invoices');
    }
}
