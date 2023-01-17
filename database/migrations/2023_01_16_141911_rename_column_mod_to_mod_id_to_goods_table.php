<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RenameColumnModToModIdToGoodsTable extends Migration
{
    public function up()
    {
        Schema::table('goods', function (Blueprint $table) {
            $table->renameColumn('mod', 'mod_id');
        });
    }

    public function down()
    {
        Schema::table('goods', function (Blueprint $table) {
            $table->renameColumn('mod_id', 'mod');
        });
    }
}
