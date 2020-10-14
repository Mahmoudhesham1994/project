<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComCurrenciesTable extends Migration
{
    public function up()
    {
        Schema::create('com_currencies', function (Blueprint $table) {
            $table->increments('id');
            $table->string('crncy_desc_a');
            $table->string('crncy_desc_l')->nullable();
            $table->string('crncy_symbol')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
