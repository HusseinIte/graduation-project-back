<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('direct_orders', function (Blueprint $table) {
            $table->id();
            $table->string('customerName');
            $table->string('centerName');
            $table->string('orderStatus');
            $table->string('orderType');
            $table->double('totalPrice');
            $table->boolean('isExecute')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('direct_orders');
    }
};
