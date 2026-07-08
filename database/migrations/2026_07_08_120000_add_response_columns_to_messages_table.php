<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('messages', function (Blueprint $table) {
            if (!Schema::hasColumn('messages', 'reponse')) {
                $table->text('reponse')->nullable()->after('contenu');
            }
            if (!Schema::hasColumn('messages', 'repondu_par')) {
                $table->unsignedBigInteger('repondu_par')->nullable()->after('reponse');
            }
        });
    }

    public function down(): void
    {
        Schema::table('messages', function (Blueprint $table) {
            if (Schema::hasColumn('messages', 'reponse')) {
                $table->dropColumn('reponse');
            }
            if (Schema::hasColumn('messages', 'repondu_par')) {
                $table->dropColumn('repondu_par');
            }
        });
    }
};
