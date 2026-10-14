<?php

use App\Models\Participant;
use App\Models\School;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('school_data', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Participant::class);
            $table->foreignIdFor(School::class);
            $table->string('class');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('school_data');
    }
};
