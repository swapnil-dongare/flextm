<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEquipmentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('equipment', function (Blueprint $table) {
            $table->id();
            $table->foreignId('organization_id')->nullable()->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->bigInteger('reg_no');
            $table->bigInteger('amount_of_seats');
            $table->boolean('disablity')->default(false);
            $table->integer('reg_year')->nullable();
            $table->string('emmission_classification')->nullable();
            $table->date('next_inspection');
            $table->foreignId('place_of_business')->nullable()->references('id')->on('business_places')->onDelete('cascade')->onUpdate('cascade');
            $table->text('maintenance')->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('equipment');
    }
}
