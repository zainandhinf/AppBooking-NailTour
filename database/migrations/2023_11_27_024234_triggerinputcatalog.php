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
        // DB::statement('
        //     create trigger ins_catalog after insert on catalogs for each row insert into log_user VALUES('Insert Catalogs',now());
        // ');
        DB::statement('
            CREATE TRIGGER ins_catalog AFTER INSERT ON catalogs FOR EACH ROW 
            INSERT INTO log_users(action, date) VALUES (\'Insert Catalogs\', NOW());
        ');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};