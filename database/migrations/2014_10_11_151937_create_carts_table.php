<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Produit;
use App\Models\Cart;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carts', function (Blueprint $table) {
            $table->id();   
            $table->timestamps();
        });
        
        Schema::table('commandes', function (Blueprint $table){
            $table->foreignIdFor(Cart::class)->nullable()->constrained()->cascadeOnUpdate()->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('carts');
        Schema::table('commandes', function (Blueprint $table){
            $table->dropForeignIdFor(Cart::class);
        });
    }
};
