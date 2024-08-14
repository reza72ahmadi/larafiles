<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('packages', function (Blueprint $table) {
            $table->id('package_id');
            $table->string('package_title');
            $table->integer('package_price');
            $table->timestamps();
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('packages');
    }
};
