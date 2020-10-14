<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCaseInfosTable extends Migration
{
    public function up()
    {
        Schema::create('case_infos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('case_ref_code');
            $table->string('case_name');
            $table->longText('case_desc')->nullable();
            $table->date('close_date')->nullable();
            $table->date('case_date');
            $table->string('report_num')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
