<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('financial_evaluations', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('techsubId')->unsigned();
            $table->foreign('techsubId')->references('id')->on('tender_status_tech_evaluations_subs')->onDelete("cascade")->onUpdate("NO ACTION");

            $table->bigInteger('competitorId')->unsigned();
            $table->foreign('competitorId')->references('id')->on('competitor_profile_creations')->onDelete("Restrict")->onUpdate("NO ACTION");

            $table->double('amt');

            $table->bigInteger('unit')->unsigned();
            $table->foreign('unit')->references('id')->on('unit_masters')->onDelete("Restrict")->onUpdate("NO ACTION");

            $table->string('least');

            $table->integer('created_by');
            $table->integer('edited_by')->nullable()->default(null);
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
        Schema::dropIfExists('financial_evaluations');
    }
};
