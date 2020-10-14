<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOutDocumentsTable extends Migration
{
    public function up()
    {
        Schema::create('out_documents', function (Blueprint $table) {
            $table->increments('id');
            $table->date('out_date')->nullable();
            $table->date('return_date')->nullable();
            $table->string('receiver_name')->nullable();
            $table->string('out_notes')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
