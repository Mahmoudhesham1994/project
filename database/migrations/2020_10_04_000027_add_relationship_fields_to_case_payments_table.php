<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToCasePaymentsTable extends Migration
{
    public function up()
    {
        Schema::table('case_payments', function (Blueprint $table) {
            $table->unsignedInteger('case_id');
            $table->foreign('case_id', 'case_fk_2325057')->references('id')->on('case_infos');
            $table->unsignedInteger('crncy_id');
            $table->foreign('crncy_id', 'crncy_fk_2325064')->references('id')->on('com_currencies');
        });
    }
}
