<?php

use App\Models\Ticket;
use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('ticket_approvals', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Ticket::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(User::class, 'approver_id')->constrained('users')->cascadeOnDelete();
             $table->unsignedTinyInteger('level');
            $table->enum('status', ['PENDING', 'APPROVED', 'REJECTED'])->default('PENDING');
            $table->text('comment')->nullable();
            $table->timestamp('approved_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ticket_approvals');
    }
};
