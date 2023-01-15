<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGoodsAssociationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('goods_associations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('goods_id');
            $table->unsignedBigInteger('associations_id');
            $table->timestamps();

            $table->index('goods_id', 'goods_associations_goods_idx');
            $table->index('associations_id', 'goods_associations_associations_idx');
            $table->foreign('goods_id', 'goods_associations_goods_fk')->
            on('goods')->references('id');
            $table->foreign('associations_id', 'goods_associations_associations_fk')->
            on('associations')->references('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('goods_associations');
    }
}
