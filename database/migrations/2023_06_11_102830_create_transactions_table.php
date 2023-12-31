<?php

use App\Models\Cart;
use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->id();
            $table->enum("status", ["success", "fail", "pending"]);
            $table->unsignedInteger("price");
            $table->unsignedInteger("transaction_price")->default(5000);
            $table->foreignIdFor(Cart::class,"cart_id_from");
            $table->foreignIdFor(Cart::class,"cart_id_to");
            $table->foreignIdFor(User::class);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
