<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Transaction;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('montant')->nullable()->default(0);
            $table->string('mode_paiement');
            $table->string('status');
            $table->timestamps();
        });
        Schema::table('commandes', function (Blueprint $table){
            $table->foreignIdFor(Transaction::class)->nullable()->constrained()->cascadeOnUpdate()->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transactions');
        Schema::table('commandes', function (Blueprint $table){
            $table->dropForeignIdFor(Transaction::class);
        });
    }
};
