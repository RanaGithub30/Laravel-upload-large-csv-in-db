<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('business_surveys', function (Blueprint $table) {
            $table->id();
            $table->text('description')->nullable();
            $table->text('industry')->nullable();
            $table->text('level')->nullable();
            $table->text('size')->nullable();
            $table->text('line_code')->nullable();
            $table->text('value')->nullable();
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
        Schema::dropIfExists('business_surveys');
    }
};
