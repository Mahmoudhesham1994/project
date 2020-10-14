<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCasePartiesTable extends Migration
{
    public function up()
    {
        Schema::create('case_parties', function (Blueprint $table) {
            $table->increments('id');
            $table->string('party_id_num')->nullable();
            $table->string('party_name');
            $table->string('party_address')->nullable();
            $table->string('party_phone')->nullable();
            $table->string('party_mobile')->nullable();
            $table->string('party_email')->nullable();
            $table->string('party_notes')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
