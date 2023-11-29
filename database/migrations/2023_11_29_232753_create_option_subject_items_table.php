<?php

use App\Models\Option;
use App\Models\OptionSubject;
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
        # Modèle pour associer une sous-matière à une filière
        Schema::create('option_subject_items', function (Blueprint $table) {
            $table->id();
            $table->string('name', 50);
            $table->foreignIdFor(Option::class)->constrained()->onDelete('cascade');
            $table->foreignId(OptionSubject::class)->constrained->onDelete('cascade');
            $table->unsignedSmallInteger('order')->default(1);
            $table->unsignedSmallInteger('coefficient')->default(0);
            $table->unsignedSmallInteger('max')->default(20);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('option_subject_items');
    }
};
