<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Produit;
use App\Models\Cart;
use App\Models\Commande;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produits', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->longText('description');
            $table->bigInteger('prix');
            $table->bigInteger('nb_commande');
            $table->string('image');
            $table->bigInteger('quantite_stock');
            $table->timestamps();
        });
        Schema::table('avis', function (Blueprint $table){
            $table->foreignIdFor(Produit::class)->nullable()->constrained()->cascadeOnUpdate()->cascadeOnDelete();
        });
        Schema::create('cart_produit', function (Blueprint $table) {
            $table->foreignIdFor(Produit::class)->constrained()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignIdFor(Cart::class)->constrained()->cascadeOnUpdate()->cascadeOnDelete();
            $table->primary(['produit_id','cart_id']);
            $table->integer('quantite');
            $table->timestamps();
        });
        Schema::create('commande_produit', function (Blueprint $table) {
            $table->foreignIdFor(Produit::class)->constrained()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignIdFor(Commande::class)->constrained()->cascadeOnUpdate()->cascadeOnDelete();
            $table->primary(['produit_id','commande_id']);
            $table->integer('quantite');
            $table->double('remise', 15, 8)->nullable()->default(0.0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('produits');
        Schema::dropIfExists('cart_produit');
        Schema::table('avis', function (Blueprint $table){
            $table->dropForeignIdFor(Produit::class);
        });
    }
};
