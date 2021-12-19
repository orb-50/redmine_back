<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->string("title",100);
            $table->string("ticket_contents",10000)->nullable();
            $table->foreignId('user_id')->constrained()->onUpdate("cascade")->onDelete("cascade");
            $table->foreignId('category_id')->default(0)->constrained()->onUpdate("cascade")->onDelete("cascade");
            $table->bigInteger('open')->unsigned();
            $table->foreign('open')->references('id')->on('codes');
            $table->bigInteger('status')->unsigned();
            $table->foreign('status')->references('id')->on('codes');
            $table->bigInteger('priority')->unsigned();
            $table->foreign('priority')->references('id')->on('codes');
            $table->tinyInteger('progress')->unsigned()->default(0);
            $table->decimal('work_hours', 6,  1)->default(0.0);
            $table->date('scheduled_start_at')->useCurrent()->nullable();
            $table->date('scheduled_finish_at')->useCurrent()->nullable();
            $table->date('startAt')->nullable();
            $table->date('finishAt')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tickets');
    }
}
