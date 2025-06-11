<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
            // 1. First copy data from image_path to image if needed
            \DB::statement('UPDATE products SET image = image_path WHERE image IS NULL');

            // 2. Then drop the image_path column
            $table->dropColumn('image_path');

            // 3. Ensure image column has proper structure
            $table->string('image')->nullable()->change();
        });
    }

    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            // For rollback safety
            $table->string('image_path')->nullable()->after('image');
            \DB::statement('UPDATE products SET image_path = image');
        });
    }
};
