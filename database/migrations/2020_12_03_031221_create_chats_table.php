<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chats', function (Blueprint $table) {
            $table->bigIncrements("id");
            $table->timestamp("created_date")->useCurrent();
            $table->text("latest_message_text")->nullable();
            $table->boolean("latest_message_sender")->nullable();
            $table->timestamp("latest_message_time")->nullable();
            $table->foreignId("student_id")->constrained("students");
            $table->foreignId("admission_member_id")->constrained("admission_members");
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
        Schema::dropIfExists('chats');
    }
}
