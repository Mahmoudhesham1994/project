<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToOutDocumentsTable extends Migration
{
    public function up()
    {
        Schema::table('out_documents', function (Blueprint $table) {
            $table->unsignedInteger('case_id');
            $table->foreign('case_id', 'case_fk_2325085')->references('id')->on('case_infos');
            $table->unsignedInteger('borrower_id')->nullable();
            $table->foreign('borrower_id', 'borrower_fk_2325088')->references('id')->on('doc_borrowers');
            $table->unsignedInteger('doc_id')->nullable();
            $table->foreign('doc_id', 'doc_fk_2325094')->references('id')->on('case_documents');
        });
    }
}
