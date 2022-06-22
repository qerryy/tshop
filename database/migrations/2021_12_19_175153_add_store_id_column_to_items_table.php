<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddStoreIdColumnToItemsTable extends Migration
{
    public function up()
    {
        Schema::table('items', function (Blueprint $table) {
            $table->foreignId('store_id')->after('stock')->constrained('stores');
            $table->string('item_photo_path', 2048)->nullable();
        });
    }

    public function down()
    {
        Schema::table('items', function (Blueprint $table) {
            $table->dropColumn('store_id');
            $table->dropColumn('item_photo_path');
        });
    }
}
