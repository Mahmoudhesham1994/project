<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToCaseInfosTable extends Migration
{
    public function up()
    {
        Schema::table('case_infos', function (Blueprint $table) {
            $table->unsignedInteger('status_id')->nullable();
            $table->foreign('status_id', 'status_fk_2324988')->references('id')->on('case_statuses');
            $table->unsignedInteger('staff_id')->nullable();
            $table->foreign('staff_id', 'staff_fk_2324995')->references('id')->on('staff');
            $table->unsignedInteger('dept_id')->nullable();
            $table->foreign('dept_id', 'dept_fk_2324996')->references('id')->on('com_depts');
            $table->unsignedInteger('report_type_id')->nullable();
            $table->foreign('report_type_id', 'report_type_fk_2324997')->references('id')->on('report_types');
            $table->unsignedInteger('case_type_id');
            $table->foreign('case_type_id', 'case_type_fk_2324999')->references('id')->on('case_types');
        });
    }
}
