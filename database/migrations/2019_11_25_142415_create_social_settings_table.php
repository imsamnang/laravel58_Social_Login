<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSocialSettingsTable extends Migration
{
    public function up()
    {
			Schema::create('social_settings', function (Blueprint $table) {
				$table->bigIncrements('id');
				$table->string('facebook_client_id')->nullable();
				$table->string('facebook_client_secret')->nullable();
				$table->integer('facebook_client_status')->default('0');				
				$table->string('google_client_id')->nullable();
				$table->string('google_client_secret')->nullable();
				$table->integer('google_client_status')->default('0');
				$table->string('github_client_id')->nullable();
				$table->string('github_client_secret')->nullable();
				$table->integer('github_client_status')->default('0');
				$table->string('linkedin_client_id')->nullable();
				$table->string('linkedin_client_secret')->nullable();
				$table->integer('linkedin_client_status')->default('0');
				$table->string('twitter_client_id')->nullable();
				$table->string('twitter_client_secret')->nullable();
				$table->integer('twitter_client_status')->default('0');
				$table->string('bitbucket_client_id')->nullable();
				$table->string('bitbucket_client_secret')->nullable();
				$table->integer('bitbucket_client_status')->default('0');
				$table->string('nocaptcha_sitekey')->nullable();
				$table->string('nocaptcha_secret')->nullable();
				$table->integer('nocaptcha_status')->default('0');
				$table->timestamps();
			});
    }

    public function down()
    {
      Schema::dropIfExists('social_settings');
    }
}
