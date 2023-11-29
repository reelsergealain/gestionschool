<?php

use App\Models\OptionSubjectItem;
use App\Models\Student;
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
        Schema::create('grades', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Student::class)->constrained()->onDelete('cascade');
            $table->foreignIdFor(OptionSubjectItem::class)->constrained()->onDelete('cascade');
            $table->enum('grade_type', ['E', 'D'])->default('E');
            $table->decimal('value', 5, 2)->default(0);
            $table->enum('semester', ['S1', 'S2']); // Assure-toi que SEMESTER_CHOICES est défini dans ton modèle
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('grades');
    }
};
