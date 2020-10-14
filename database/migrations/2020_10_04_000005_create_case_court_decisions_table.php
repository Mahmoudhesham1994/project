<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCaseCourtDecisionsTable extends Migration
{
    public function up()
    {
        Schema::create('case_court_decisions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('court_name')->nullable();
            $table->string('court_reff_code')->nullable();
            $table->date('court_date')->nullable();
            $table->longText('court_decisions')->nullable();
            $table->string('court_notes')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
