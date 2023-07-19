<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\CategorieProduit;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categorie_produits', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->longText('description');
            $table->string('image');
            $table->string('slug');
            $table->timestamps();
        });
        Schema::table('produits', function (Blueprint $table){
            $table->foreignIdFor(CategorieProduit::class)->nullable()->constrained()->cascadeOnDelete()->cascadeOnUpdate()->unsignedBigInteger();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categorie_produits');
        Schema::table('produits', function (Blueprint $table){
            $table->dropForeignIdFor(CategorieProduit::class);
        });
    }
};
