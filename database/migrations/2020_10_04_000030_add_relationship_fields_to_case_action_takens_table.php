<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToCaseActionTakensTable extends Migration
{
    public function up()
    {
        Schema::table('case_action_takens', function (Blueprint $table) {
            $table->unsignedInteger('case_id');
            $table->foreign('case_id', 'case_fk_2325019')->references('id')->on('case_infos');
            $table->unsignedInteger('action_type_id');
            $table->foreign('action_type_id', 'action_type_fk_2325020')->references('id')->on('action_types');
        });
    }
}
