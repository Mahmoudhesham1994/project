<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCaseActionTakensTable extends Migration
{
    public function up()
    {
        Schema::create('case_action_takens', function (Blueprint $table) {
            $table->increments('id');
            $table->longText('action_desc')->nullable();
            $table->date('action_date')->nullable();
            $table->string('action_notes')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
