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
        Schema::create('detail_transactions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('head_transaction_id');
            $table->string('no_trans');
            // $table->foreignId('head_transaction_id')->constrained('head_transactions', 'no_trans');
            // $table->unsignedBigInteger('no_trans');
            // $table->foreign('no_trans')->references(columns: 'no_trans')->on(table: 'head_transactions')->onDelete('cascade');
            $table->string('id_user');
            $table->string('name');
            $table->string('id_catalog');
            $table->date('date');
            $table->date('date2');
            $table->integer('adult_qty');
            $table->integer('child_qty');
            $table->string('transportation_id');
            $table->foreignId('payment_id')->nullable();
            $table->string('proof')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Schema::table('detail_transactions', function (Blueprint $table) {
        //     // $table->dropForeign(['no_trans']);
        //     $table->foreignId('no_trans')->constrained();
        // });
        Schema::dropIfExists('detail_transactions');
    }
};