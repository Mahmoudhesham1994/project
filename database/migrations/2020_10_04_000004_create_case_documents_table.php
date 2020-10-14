<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCaseDocumentsTable extends Migration
{
    public function up()
    {
        Schema::create('case_documents', function (Blueprint $table) {
            $table->increments('id');
            $table->string('doc_desc_a');
            $table->date('doc_date')->nullable();
            $table->string('doc_ref_code')->nullable();
            $table->string('doc_note')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
