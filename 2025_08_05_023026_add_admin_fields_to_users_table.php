<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Log; // Added Log facade

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        try {
            Schema::table('users', function (Blueprint $table) {
                if (!Schema::hasColumn('users', 'company_name')) {
                    $table->string('company_name')->nullable()->after('role');
                }
                if (!Schema::hasColumn('users', 'company_profile')) {
                    $table->text('company_profile')->nullable()->after('company_name');
                }
            });
        } catch (\Exception $e) {
            Log::error('Migration failed: ' . $e->getMessage()); // Ensure Log is available
            throw $e; // Re-throw to halt migration on failure
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['company_name', 'company_profile']);
        });
    }
};
?>