<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCaseNotesTable extends Migration
{
    public function up()
    {
        Schema::create('case_notes', function (Blueprint $table) {
            $table->increments('id');
            $table->longText('note_desc');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
