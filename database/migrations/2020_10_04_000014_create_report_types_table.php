<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReportTypesTable extends Migration
{
    public function up()
    {
        Schema::create('report_types', function (Blueprint $table) {
            $table->increments('id');
            $table->string('rep_type_desc_a');
            $table->string('rep_type_desc_l')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
