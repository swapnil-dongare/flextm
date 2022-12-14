<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_requests', function (Blueprint $table) {
            $table->id();
            $table->foreignId('customer_id')->nullable()->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('tm_id')->nullable()->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('organization_id')->nullable()->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->string('request_type')->default('Order');
            $table->string('start_location');
            $table->date('start_date');
            $table->time('start_time')->nullable();
            $table->time('present_in_location')->nullable();
            $table->string('end_location');
            $table->date('end_date');
            $table->time('end_time')->nullable();
            $table->time('present_in_service_hall')->nullable();
            $table->bigInteger('head_count')->nullable();
            $table->boolean('mobility_restrictions')->default(false)->nullable();
            $table->float('price')->nullable();
            $table->integer('tax_rate')->nullable();
            $table->float('price_incl_tax')->nullable();
            $table->boolean('invoiced')->default(false)->nullable();
            $table->foreignId('driver_id')->nullable()->references('id')->on('drivers')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('equipment_id')->nullable()->references('id')->on('equipment')->onDelete('cascade')->onUpdate('cascade');
            $table->string('route')->nullable();
            $table->foreignId('language_id')->nullable()->references('id')->on('languages')->onDelete('cascade')->onUpdate('cascade');
            $table->text('other_wishes')->nullable();
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
        Schema::dropIfExists('order_requests');
    }
}
