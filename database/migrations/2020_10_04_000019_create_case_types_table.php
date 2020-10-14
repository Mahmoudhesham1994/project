<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCaseTypesTable extends Migration
{
    public function up()
    {
        Schema::create('case_types', function (Blueprint $table) {
            $table->increments('id');
            $table->string('type_desc');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
