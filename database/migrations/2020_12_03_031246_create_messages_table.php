<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('messages', function (Blueprint $table) {
            $table->bigIncrements("id");
            $table->text("message_text");
            $table->boolean("read_by_receiver");
            $table->timestamp("send_date")->useCurrent();
            $table->foreignId("student_id")->constrained("students");
            $table->foreignId("admission_member_id")->constrained("admission_members");
            $table->foreignId("chat_id")->constrained("chats");
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
        Schema::dropIfExists('messages');
    }
}
