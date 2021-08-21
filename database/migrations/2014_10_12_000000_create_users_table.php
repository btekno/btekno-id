<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid')->nullable();

            $table->string('image')->nullable();
            $table->string('cover')->nullable();
            $table->string('name')->nullable();

            $table->string('username')->unique();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();

            $table->string('password')->nullable();
            $table->string('plain')->nullable();
            $table->string('phone')->nullable();
            $table->enum('gender', ['M', 'F', 'N'])->nullable();
            $table->string('birthday')->nullable();
            $table->string('address')->nullable();
            $table->string('village')->nullable();
            $table->string('district')->nullable();
            $table->string('city')->nullable();
            $table->string('country')->nullable();

            $table->text('bio')->nullable();
            $table->string('website')->nullable();
            $table->string('facebook')->nullable();
            $table->string('twitter')->nullable();
            $table->string('instagram')->nullable();
            $table->string('linkedin')->nullable();
            $table->string('pinterest')->nullable();
            $table->string('dribbble')->nullable();
            $table->string('youtube')->nullable();

            $table->string('provider')->nullable();
            $table->string('provider_id')->nullable();

            $table->boolean('is_private')->default(false);
            $table->boolean('is_verified')->default(false);
            $table->boolean('is_staff')->default(false);
            $table->boolean('is_spam')->default(false);
            $table->boolean('is_suspended')->default(false);

            $table->boolean('notifications_email')->default(true);
            $table->boolean('notifications_web')->default(true);

            $table->string('status')->nullable();
            $table->string('status_emoji')->nullable();
            $table->string('timezone')->nullable();

            $table->string('last_ip')->nullable();
            $table->dateTime('last_active')->nullable();
            $table->string('api_token', 80)->unique()->nullable()->default(null);
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();

            $table->index('id');
            $table->index('username');
            $table->index('name');
            $table->index('email');
            $table->index('email_verified_at');
            $table->index('provider');
            $table->index('provider_id');
            $table->index('is_staff');
            $table->index('is_suspended');
            $table->index('is_spam');
            $table->index('is_verified');
            $table->index('gender');
            $table->index('village');
            $table->index('district');
            $table->index('city');
            $table->index('country');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
