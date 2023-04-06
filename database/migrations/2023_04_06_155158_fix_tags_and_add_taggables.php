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
        Schema::table('tags', function (Blueprint $table) {
            //
            $table->string('tag_name')->after('id');
        });

        Schema::create('taggables', function (Blueprint $table) {
            $table->integer('tag_id');
            $table->integer('taggable_id');
            $table->string('taggable_type');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
