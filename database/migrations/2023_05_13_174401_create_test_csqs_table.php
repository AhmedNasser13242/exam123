<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('test_csqs', function (Blueprint $table) {
            $table->id();
            $table->integer('project_id');
            $table->string('name_program')->nullable();
            $table->string('testcsq_slug');
            $table->string('product_thambnail')->nullable();
            $table->string('vendor_id')->nullable();
            $table->integer('status')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('test_csqs');
    }
};