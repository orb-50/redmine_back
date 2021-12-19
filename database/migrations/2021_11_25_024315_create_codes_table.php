<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCodesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('codes', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('kind');
            $table->foreign('kind')->references('kind')->on('code_kinds')
            ->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedInteger('sort');
            $table->string('name', 100);
            $table->timestamps();
            // 外部キーの設定
            // 主キーの設定
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('codes');
    }
}
