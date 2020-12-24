<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdmissionMembersTable extends Migration
{
    public function up()
    {
        Schema::create('admission_members', function (Blueprint $table) {
            $table->bigIncrements("id");
            $table->string("image_url")->nullable();
            $table->foreignId("user_id")->constrained("users")->onDelete('cascade')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('admission_members');
    }
}
