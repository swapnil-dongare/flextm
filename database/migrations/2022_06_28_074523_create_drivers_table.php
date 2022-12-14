<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDriversTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('drivers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('organization_id')->nullable()->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->string("name");
            $table->bigInteger("mobile");
            $table->string('email')->nullable();
            $table->text('address')->nullable();
            $table->string('liscense_no')->nullable();
            $table->string('directive')->nullable();
            $table->date('valid_until')->nullable();
            $table->bigInteger('social_security_no')->nullable();
            $table->string('language_id')->nullable()->references('id')->on('languages')->onDelete('cascade')->onUpdate('cascade');
            $table->string('profile_url')->nullable();
            $table->boolean('expired')->default(false);
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
        Schema::dropIfExists('drivers');
    }
}
