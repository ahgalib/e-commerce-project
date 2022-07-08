<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCuponCodesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cupon_codes', function (Blueprint $table) {
            $table->id();
            $table->string('cupon_option')->nullable();
            $table->string('cupon_code')->nullable();
            $table->string('categories')->nullable();
            $table->string('users')->nullable();
            $table->string('cupon_type')->nullable();
            $table->string('amount_type')->nullable();
            $table->float('amount')->nullable();
            $table->date('expiry_date')->nullable();
            $table->tinyInteger('status')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cupon_codes');
    }
}
