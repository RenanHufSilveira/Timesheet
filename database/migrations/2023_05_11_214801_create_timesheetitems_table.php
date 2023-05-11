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
        Schema::create('timesheet_items', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255);
            $table->text('description');
            $table->timestamp('started_in', 0);
            $table->timestamp('finished_in', 0);
            $table->foreignId('activities_id')->constrained();
            $table->foreignId('timesheets_id')->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('timesheet_items');
        $table->foreignId('activities_id')
                ->constrained()
                ->onDelete('cascade');
        $table->foreignId('activities_id')
                ->constrained()
                ->onDelete('cascade');
    }
};
