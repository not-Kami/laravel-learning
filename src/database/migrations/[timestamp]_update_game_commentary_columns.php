<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('game_commentary', function (Blueprint $table) {
            // Renommer la colonne comment en content si elle existe
            if (Schema::hasColumn('game_commentary', 'comment')) {
                $table->renameColumn('comment', 'content');
            }
            
            // S'assurer que created_at est au bon format
            if (!Schema::hasColumn('game_commentary', 'created_at')) {
                $table->timestamp('created_at')->useCurrent();
            }
            
            // Supprimer updated_at s'il existe
            if (Schema::hasColumn('game_commentary', 'updated_at')) {
                $table->dropColumn('updated_at');
            }
            $table->renameColumn('user_id', 'user_name');
        });
    }

    public function down()
    {
        Schema::table('game_commentary', function (Blueprint $table) {
            if (Schema::hasColumn('game_commentary', 'content')) {
                $table->renameColumn('content', 'comment');
            }
            $table->timestamp('updated_at')->nullable();
            $table->renameColumn('user_name', 'user_id');
        });
    }
};