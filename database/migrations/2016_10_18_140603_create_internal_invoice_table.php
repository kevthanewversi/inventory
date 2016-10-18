<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInternalInvoiceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('internal_invoice', function(Blueprint $table)
        {   
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->unsignedInteger('employee_id');
            //$table->foreign('employee_name')->references('name')->on('users');//->onDelete('cascade');
            $table->string('employee_name')->references('name')->on('users');  
            $table->string('halflt');
            $table->string('onelt');
            $table->string('onehalflt');
            $table->string('fivelt');
            $table->string('tenlt');
            $table->string('eighteenlt');
            $table->timestamps();
        });

        Schema::table('internal_invoice', function(Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->foreign('employee_id')->references('id')->on('users');//->onDelete('cascade'); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::drop('internal_invoice');
    }
}
