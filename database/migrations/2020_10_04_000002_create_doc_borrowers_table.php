<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocBorrowersTable extends Migration
{
    public function up()
    {
        Schema::create('doc_borrowers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('borrower_name');
            $table->string('borrower_address')->nullable();
            $table->string('borrower_desc')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
