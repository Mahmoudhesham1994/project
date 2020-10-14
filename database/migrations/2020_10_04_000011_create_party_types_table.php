<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePartyTypesTable extends Migration
{
    public function up()
    {
        Schema::create('party_types', function (Blueprint $table) {
            $table->increments('id');
            $table->string('party_type_desc_a');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
