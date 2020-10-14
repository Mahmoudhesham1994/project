<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCasePaymentsTable extends Migration
{
    public function up()
    {
        Schema::create('case_payments', function (Blueprint $table) {
            $table->increments('id');
            $table->date('payment_date');
            $table->decimal('payment_amt', 15, 2);
            $table->string('payment_ref_code')->nullable();
            $table->string('payment_notes')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
