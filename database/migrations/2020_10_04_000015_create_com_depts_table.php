<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComDeptsTable extends Migration
{
    public function up()
    {
        Schema::create('com_depts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('dept_desc_a');
            $table->string('dept_desc_l')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
