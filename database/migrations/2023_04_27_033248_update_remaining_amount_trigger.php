<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::unprepared('
        CREATE TRIGGER update_remaining AFTER INSERT ON payments
        FOR EACH ROW
        BEGIN
            -- Get the paid amount of that user
            SET @totalpaid = (SELECT COALESCE(SUM(amount_paid), 0) FROM payments WHERE student_id = NEW.student_id);
    
            -- Update the remaining amount for the inserted row
            UPDATE payments SET NEW.remaining_amount = (NEW.goal_amount - @totalpaid) WHERE id = NEW.id;
        END;
    ');
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('payments', function (Blueprint $table) {
            //
        });
    }
};
