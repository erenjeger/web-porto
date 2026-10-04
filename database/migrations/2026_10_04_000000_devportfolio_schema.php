<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
return new class extends Migration{
    public function up():void{
        Schema::create('users',function(Blueprint $t){$t->id();$t->string('email')->unique();$t->string('username',30)->unique();$t->timestamp('email_verified_at')->nullable();$t->string('password');$t->rememberToken();$t->timestamps();});
        Schema::create('profiles',function(Blueprint $t){$t->id();$t->foreignId('user_id')->unique()->constrained()->cascadeOnDelete();$t->string('name')->default('');$t->date('birth_date')->nullable();$t->string('phone',50)->nullable();$t->string('address')->nullable();$t->text('bio')->nullable();$t->string('avatar_path')->nullable();$t->json('hobbies')->nullable();$t->timestamps();});
        Schema::create('skills',function(Blueprint $t){$t->id();$t->foreignId('profile_id')->constrained()->cascadeOnDelete();$t->string('name',100);$t->unsignedTinyInteger('level')->default(0);$t->string('category',100)->default('General');$t->timestamps();$t->index(['profile_id','category']);});
        Schema::create('education',function(Blueprint $t){$t->id();$t->foreignId('profile_id')->constrained()->cascadeOnDelete();$t->string('institution',150);$t->string('degree',100)->nullable();$t->string('field',150)->nullable();$t->unsignedSmallInteger('start_year')->nullable();$t->unsignedSmallInteger('end_year')->nullable();$t->text('description')->nullable();$t->timestamps();});
        Schema::create('experiences',function(Blueprint $t){$t->id();$t->foreignId('profile_id')->constrained()->cascadeOnDelete();$t->string('company',150);$t->string('position',150);$t->date('start_date')->nullable();$t->date('end_date')->nullable();$t->boolean('current')->default(false);$t->text('description')->nullable();$t->timestamps();$t->index(['profile_id','start_date']);});
        Schema::create('social_links',function(Blueprint $t){$t->id();$t->foreignId('profile_id')->constrained()->cascadeOnDelete();$t->string('platform',50);$t->string('url',500);$t->timestamps();});
        Schema::create('portfolios',function(Blueprint $t){$t->id();$t->foreignId('user_id')->constrained()->cascadeOnDelete();$t->string('title',150);$t->text('description');$t->enum('type',['image','video'])->default('image');$t->string('media_path',500)->nullable();$t->string('thumbnail_path',500)->nullable();$t->json('tags')->nullable();$t->string('live_url',500)->nullable();$t->string('repo_url',500)->nullable();$t->boolean('is_featured')->default(false);$t->timestamps();$t->index(['user_id','created_at']);});
        Schema::create('cache',function(Blueprint $t){$t->string('key')->primary();$t->mediumText('value');$t->integer('expiration');});
        Schema::create('cache_locks',function(Blueprint $t){$t->string('key')->primary();$t->string('owner');$t->integer('expiration');});
        Schema::create('jobs',function(Blueprint $t){$t->id();$t->string('queue')->index();$t->longText('payload');$t->unsignedTinyInteger('attempts');$t->unsignedInteger('reserved_at')->nullable();$t->unsignedInteger('available_at');$t->unsignedInteger('created_at');});
        Schema::create('job_batches',function(Blueprint $t){$t->string('id')->primary();$t->string('name');$t->integer('total_jobs');$t->integer('pending_jobs');$t->integer('failed_jobs');$t->longText('failed_job_ids');$t->mediumText('options')->nullable();$t->integer('cancelled_at')->nullable();$t->integer('created_at');$t->integer('finished_at')->nullable();});
        Schema::create('failed_jobs',function(Blueprint $t){$t->id();$t->string('uuid')->unique();$t->text('connection');$t->text('queue');$t->longText('payload');$t->longText('exception');$t->timestamp('failed_at')->useCurrent();});
        Schema::create('sessions',function(Blueprint $t){$t->string('id')->primary();$t->foreignId('user_id')->nullable()->index();$t->string('ip_address',45)->nullable();$t->text('user_agent')->nullable();$t->longText('payload');$t->integer('last_activity')->index();});
        Schema::create('password_reset_tokens',function(Blueprint $t){$t->string('email')->primary();$t->string('token');$t->timestamp('created_at')->nullable();});
    }
    public function down():void{foreach(['password_reset_tokens','sessions','failed_jobs','job_batches','jobs','cache_locks','cache','portfolios','social_links','experiences','education','skills','profiles','users'] as $t)Schema::dropIfExists($t);}
};
