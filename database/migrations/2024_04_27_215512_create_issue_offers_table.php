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
        Schema::create('issue_offers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('issue_id');
            $table->bigInteger('user_id');
            $table->text('reply');
            $table->decimal('price',8,2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('issue_offers');
    }
};
