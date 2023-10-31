<?php

use App\Models\Fac;
use App\Models\Prof;
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
        Schema::create('chairs', function (Blueprint $table) {
            $table->id();
            $table->enum('vacation', ['AM', 'PM']);
            $table->foreignIdFor(Prof::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(Fac::class)->constrained()->cascadeOnDelete();
            $table->timestamps();
            $table->date('dates');
            $table->softDeletes();
            $table->unique(['fac_id', 'prof_id', 'vaction']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('registers');
    }
};
