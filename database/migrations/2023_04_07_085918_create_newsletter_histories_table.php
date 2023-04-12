<?php

use App\Models\NewsletterHistory;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('newsletter_histories', function (Blueprint $table) {
            $table->id();
            $table->string('email');
            $table->string('content');
            $table->unsignedSmallInteger('status')->default(NewsletterHistory::STATUS_NOTSENT);
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
        Schema::dropIfExists('newsletter_histories');
    }
};
