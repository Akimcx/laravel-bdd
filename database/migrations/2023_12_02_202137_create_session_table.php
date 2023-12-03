<?php

use App\Models\Course;
use App\Models\School;
use App\Models\Student;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('sessions', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Course::class)->constrained()->cascadeOnUpdate();
            // $table->foreignIdFor(Student::class)->constrained()->cascadeOnUpdate();
            $table->foreignIdFor(School::class)->constrained()->cascadeOnUpdate();
            $table->date('session_date')->default(DB::raw('CURRENT_DATE'));
            // $table->boolean('is_present')->default(false);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('attendances');
    }
};
