<?php

use App\Models\Category;
use App\Models\Command;
use App\Models\Direction;
use App\Models\Method;
use App\Models\Page;
use App\Models\Service;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddOrderColumns extends Migration
{
    protected $tables = [
        Category::class, Command::class, Direction::class, Service::class, Method::class, Page::class,
    ];

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        foreach ($this->tables as $model) {
            Schema::table(app($model)->getTable(), function (Blueprint $blueprint) {
                $blueprint->unsignedBigInteger('order_no')->after('id');
            });

            $model::all()->each(function ($model, $index) {
                $model->update([
                    'order_no' => $index + 1,
                ]);
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        foreach ($this->tables as $model) {
            Schema::table(app($model)->getTable(), function (Blueprint $blueprint) {
                $blueprint->dropColumn('order_no');
            });
        }
    }
}
