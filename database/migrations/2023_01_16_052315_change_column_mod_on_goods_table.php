<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeColumnModOnGoodsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('goods', function (Blueprint $table) {
            $table->unsignedBigInteger('mod')->change();
        });
    }
    public function down()
    {
        Schema::table('goods', function (Blueprint $table) {
            $table->string('mod')->change();
        });
    }
}
