<?php

use App\Models\Subject;
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
        # Modèle pour associer une matière à une filière
        Schema::create('option_subjects', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Subject::class)->constrained()->onDelete('cascade');
            $table->unsignedBigInteger('order')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('option_subjects');
    }
};
