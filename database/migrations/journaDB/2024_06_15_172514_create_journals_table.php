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
        Schema::create('jdb_journals', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug_url');
            $table->string('issn')->unique();
            $table->decimal('impact_factor', 3, 2);
            $table->text('description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jdb_journals');
    }
};
