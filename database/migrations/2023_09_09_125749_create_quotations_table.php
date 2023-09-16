<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuotationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quotations', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('customer_id')->nullable();
            $table->integer('user_id')->nullable();
            $table->float('vat_percent')->nullable();
            $table->float('vat')->nullable();
            $table->float('sub_total')->nullable();
            $table->float('net_total')->nullable();
            $table->text('remark')->nullable();
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('quotations');
    }
}
