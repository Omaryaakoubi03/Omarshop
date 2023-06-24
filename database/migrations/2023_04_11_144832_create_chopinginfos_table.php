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
        Schema::create('chopinginfos', function (Blueprint $table) {
            $table->id();
            $table->integer('user-id');
            $table->string('phonenumber');
            $table->string('name_city');
            $table->string('code_postal');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chopinginfos');
    }
};
