<?php

use App\Models\Instructor;
use App\Models\School;
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
        Schema::create('instructor_school', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Instructor::class)->constrained()->cascadeOnUpdate();
            $table->foreignIdFor(School::class)->constrained()->cascadeOnUpdate();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('instructor_school');
    }
};
