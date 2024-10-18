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
        
        //thiết lập các trường cho table, ràng buộc nếu có
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->integer('price')->nullable();
            $table->tinyInteger('status')->default(0);
            $table->softDeletes();
            //lưu ngày giờ thay đổi
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
        Schema::dropIfExists('products');
    }
};
