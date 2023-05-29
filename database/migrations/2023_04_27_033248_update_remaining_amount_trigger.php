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
        DB::unprepared(
            '
            CREATE TRIGGER calculate_remaining_amount BEFORE INSERT ON payments FOR EACH ROW
            BEGIN
                DECLARE total_paid DECIMAL;
            
                SELECT COALESCE(SUM(amount_paid), 0) INTO total_paid FROM payments WHERE student_id = NEW.student_id;
                
                SET total_paid = total_paid + NEW.amount_paid;
                SET NEW.remaining_amount = NEW.goal_amount - total_paid;
            END;
            '
        );
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
