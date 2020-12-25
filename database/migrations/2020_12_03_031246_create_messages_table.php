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
            $table->boolean("read_by_receiver")->default(false);
            $table->timestamp("send_date")->useCurrent();
            $table->boolean("student_sender")->nullable();
            $table->foreignId("student_id")->constrained("students")->nullable();
            $table->foreignId("admission_member_id")->constrained("admission_members")->nullable();
            $table->foreignId("chat_id")->constrained("chats")->nullable();
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
