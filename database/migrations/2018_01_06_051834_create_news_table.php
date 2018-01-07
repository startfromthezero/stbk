<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news', function (Blueprint $table) {
            $table->increments('id');
			$table->string('title')->comment('文章标题');
			$table->tinyInteger('from')->comment('管理端或前端');
			$table->integer('user_id')->comment('发布人');
			$table->string('img')->comment('图片');
			$table->integer('type_id')->comment('文章类别');
			$table->tinyInteger('is_show')->comment('是否展示');
			$table->tinyInteger('is_recomm')->comment('是否推荐');
			$table->tinyInteger('is_top')->comment('是否置顶');
			$table->string('keyword')->comment('关键字');
			$table->string('synopsis')->comment('内容摘要');
			$table->longText('content')->comment('文章内容');
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
        Schema::dropIfExists('news');
    }
}
