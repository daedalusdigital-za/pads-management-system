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
        Schema::create('reports', function (Blueprint $table) {
            $table->id();
            $table->string('district_no');
            $table->string('ward_no');
            $table->string('school_name');
            $table->string('school_type');
            $table->integer('no_of_learners')->default(0);
            $table->integer('no_of_girls')->default(0);
            $table->integer('no_of_pads')->default(0);
            $table->date('date_delivered')->nullable();
            $table->text('remarks')->nullable();
            $table->timestamps();
            
            $table->index(['district_no', 'ward_no']);
            $table->index('school_type');
            $table->index('date_delivered');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reports');
    }
};
