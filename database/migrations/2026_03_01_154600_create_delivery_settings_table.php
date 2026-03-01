<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('delivery_settings', function (Blueprint $table) {
            $table->id();
            $table->decimal('semenanjung_rate', 10, 2)->default(8.00);
            $table->decimal('east_malaysia_rate', 10, 2)->default(15.00);
            $table->decimal('free_shipping_minimum', 10, 2)->default(150.00);
            $table->boolean('free_shipping_enabled')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('delivery_settings');
    }
};
