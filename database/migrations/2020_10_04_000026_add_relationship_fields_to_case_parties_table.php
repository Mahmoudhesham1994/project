<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToCasePartiesTable extends Migration
{
    public function up()
    {
        Schema::table('case_parties', function (Blueprint $table) {
            $table->unsignedInteger('case_id');
            $table->foreign('case_id', 'case_fk_2325006')->references('id')->on('case_infos');
            $table->unsignedInteger('party_type_id');
            $table->foreign('party_type_id', 'party_type_fk_2325017')->references('id')->on('party_types');
        });
    }
}
