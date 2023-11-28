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
        // Schema::create('view_carts', function (Blueprint $table) {
        //     $table->id();
        //     $table->timestamps();
        // });
        DB::statement('
            CREATE VIEW view_carts AS
            SELECT 
            head_transactions.id AS head_id, 
            head_transactions.no_trans, 
            head_transactions.date AS date_head, 
            detail_transactions.id AS detail_id, 
            detail_transactions.head_transaction_id, 
            detail_transactions.no_trans AS no_trans_detail, 
            detail_transactions.id_user AS id_user_detail, 
            detail_transactions.name, 
            detail_transactions.id_catalog AS id_catalog_detail, 
            detail_transactions.adult_qty, 
            detail_transactions.child_qty, 
            users.id AS user_id, 
            users.username, 
            catalogs.id AS catalog_id, 
            catalogs.title, 
            catalogs.slug, 
            catalogs.location, 
            catalogs.price, 
            catalogs.description, 
            catalogs.main_image, 
            catalogs.categories, 
            head_transactions.status, 
            head_transactions.date AS date_tour 
        FROM 
            head_transactions
        INNER JOIN 
            detail_transactions ON head_transactions.id = detail_transactions.head_transaction_id
        INNER JOIN 
            users ON detail_transactions.id_user = users.id
        INNER JOIN 
            catalogs ON detail_transactions.id_catalog = catalogs.id;
        ');
        // HeadTransaction::select('head_transactions.id', 'head_transactions.no_trans', 'head_transactions.date as date_head', 'detail_transactions.id', 'detail_transactions.head_transaction_id as head_transaction_id', 'detail_transactions.no_trans as no_trans_detail', 'detail_transactions.id_user as id_user_detail', 'detail_transactions.name', 'detail_transactions.id_catalog as id_catalog_detail', 'detail_transactions.adult_qty as adult_qty', 'detail_transactions.child_qty as child_qty', 'users.id', 'users.username', 'catalogs.id', 'catalogs.title', 'catalogs.slug', 'catalogs.location', 'catalogs.price', 'catalogs.description', 'catalogs.main_image', 'catalogs.categories', 'head_transactions.status', 'head_transactions.date as date_tour')
        //     ->join('detail_transactions', 'head_transactions.id', '=', 'detail_transactions.head_transaction_id')
        //     ->join('users', 'detail_transactions.id_user', '=', 'users.id')
        //     ->join('catalogs', 'detail_transactions.id_catalog', '=', 'catalogs.id');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Schema::dropIfExists('view_carts');
        DB::statement('DROP VIEW IF EXISTS view_carts');
    }
};