<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\PromotionCategorie;


return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('promotion_categories', function (Blueprint $table) {
            $table->id();
            $table->longText('description')->nullable();
            $table->dateTime('debut')->nullable();
            $table->dateTime('fin')->nullable();
            $table->double('remise', 15, 8)->nullable()->default(0.0);
            $table->timestamps();
        });
        Schema::table('categorie_produits', function (Blueprint $table){
            $table->foreignIdFor(PromotionCategorie::class)->nullable()->constrained()->cascadeOnUpdate()->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('promotion_categories');
        Schema::table('categorie_produits', function (Blueprint $table){
            $table->dropForeignIdFor(PromotionCategorie::class);
        });
    }
};
