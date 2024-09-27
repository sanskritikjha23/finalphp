<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB; // Import DB facade

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        // Insert 10 static projects
        DB::table('projects')->insert([
            ['name' => 'Website Redesign'],
            ['name' => 'Mobile App Development'],
            ['name' => 'E-Commerce Platform'],
            ['name' => 'Marketing Campaign Launch'],
            ['name' => 'Customer Relationship Management (CRM) System'],
            ['name' => 'Data Migration Project'],
            ['name' => 'Cloud Infrastructure Setup'],
            ['name' => 'Social Media Integration'],
            ['name' => 'Product Launch Strategy'],
            ['name' => 'Internal Training Program'],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
