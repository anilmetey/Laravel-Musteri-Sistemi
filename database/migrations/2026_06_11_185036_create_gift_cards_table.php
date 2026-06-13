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
        Schema::create('gift_cards', function (Blueprint $table) {
            $table->id();
            $table->string('recipient_name');
            $table->decimal('amount', 8, 2);
            $table->string('design')->default('gold');
            $table->text('message')->nullable();
            $table->string('code')->unique(); // E.g., LUXE-GIFT-1234
            $table->string('status')->default('active'); // active, used, expired
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gift_cards');
    }
};
