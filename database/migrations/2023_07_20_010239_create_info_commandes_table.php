<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\models\InfoCommande;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('info_commandes', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->string('prenom');
            $table->string('email');
            $table->string('adresse');
            $table->string('tel');
            $table->string('tel_2')->nullable();
            $table->longText('info_sup')->nullable();
            $table->timestamps();
        });

        Schema::table('commandes', function (Blueprint $table){
            $table->foreignIdFor(InfoCommande::class)->nullable()->constrained()->cascadeOnUpdate()->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('info_commandes');
        Schema::table('commandes', function (Blueprint $table){
            $table->dropForeignIdFor(InfoCommande::class);
        });
    }
};
