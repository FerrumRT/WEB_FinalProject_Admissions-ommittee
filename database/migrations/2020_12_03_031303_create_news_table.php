<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewsTable extends Migration
{
    public function up()
    {
        Schema::create('news', function (Blueprint $table) {
            $table->bigIncrements("id");
            $table->string("title");
            $table->string("image_url")->nullable();
            $table->mediumText("short_content");
            $table->text("content");
            $table->timestamp("created_date")->useCurrent();
            $table->foreignId("admission_member_id")->constrained("admission_members");
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('news');
    }
}
