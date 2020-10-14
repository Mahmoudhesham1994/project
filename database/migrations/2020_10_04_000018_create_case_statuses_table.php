<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCaseStatusesTable extends Migration
{
    public function up()
    {
        Schema::create('case_statuses', function (Blueprint $table) {
            $table->increments('id');
            $table->string('status_desc');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
