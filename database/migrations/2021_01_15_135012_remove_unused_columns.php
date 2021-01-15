<?php

use App\Models\Category;
use App\Models\Direction;
use App\Models\Service;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RemoveUnusedColumns extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasColumn(app(Category::class)->getTable(), 'thread')) {
            Schema::table(app(Category::class)->getTable(), function (Blueprint $table) {
                $table->dropColumn('thread');
            });
        }

        if (Schema::hasColumn(app(Service::class)->getTable(), 'price')) {
            Schema::table(app(Service::class)->getTable(), function (Blueprint $table) {
                $table->dropColumn('price');
            });
        }

        if (Schema::hasColumn(app(Direction::class)->getTable(), 'category_id')) {
            Schema::table(app(Direction::class)->getTable(), function (Blueprint $table) {
                $table->dropForeign(['category_id']);
                $table->dropColumn('category_id');
            });
        }
    }
}
