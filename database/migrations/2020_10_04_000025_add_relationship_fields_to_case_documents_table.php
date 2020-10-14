<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToCaseDocumentsTable extends Migration
{
    public function up()
    {
        Schema::table('case_documents', function (Blueprint $table) {
            $table->unsignedInteger('case_id')->nullable();
            $table->foreign('case_id', 'case_fk_2325074')->references('id')->on('case_infos');
            $table->unsignedInteger('doc_type_id');
            $table->foreign('doc_type_id', 'doc_type_fk_2325075')->references('id')->on('doc_types');
        });
    }
}
