<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToCaseCourtDecisionsTable extends Migration
{
    public function up()
    {
        Schema::table('case_court_decisions', function (Blueprint $table) {
            $table->unsignedInteger('case_id');
            $table->foreign('case_id', 'case_fk_2325040')->references('id')->on('case_infos');
        });
    }
}
