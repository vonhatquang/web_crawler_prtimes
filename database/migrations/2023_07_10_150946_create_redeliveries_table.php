<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRedeliveriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('redeliveries', function (Blueprint $table) {
            $table->id()->unique();
            $table->string('uuid',50)->unique();
            $table->string('project_title',128);
            $table->string('requester_name',60);
            $table->string('pickup_zipcode',8)->nullable();
            $table->string('pickup_add1',60)->nullable();
            $table->string('pickup_add2',60)->nullable();
            $table->string('pickup_tel',15)->nullable();
            $table->string('delivery_zipcode',8)->nullable();  
            $table->string('delivery_add1',60)->nullable();
            $table->string('delivery_add2',60)->nullable(); 
            $table->string('delivery_tel',15)->nullable();
            $table->string('delivery_name',60)->nullable();          
            $table->datetime('delivery_date');
            $table->integer('package_type');
            $table->string('package_type_name',10)->nullable();            
            $table->integer('quantity');         
            $table->integer('fare_amount');
            $table->string('delivery_driver',128);
            $table->integer('status_id')->nullable();
            $table->string('status_name',10)->nullable(); 
            $table->string('package_code',128)->nullable();
            $table->integer('storage_period')->nullable();
            $table->string('note', 246)->nullable();
            $table->date('redelivery_date')->nullable();
            $table->integer('redelivery_time_id')->nullable();
            $table->string('redelivery_time_name',20)->nullable(); 
            $table->datetime('deleted_at')->nullable();
            $table->datetime('created_at')->nullable();
            $table->datetime('updated_at')->nullable();
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
        Schema::dropIfExists('redeliveries');
    }
}
