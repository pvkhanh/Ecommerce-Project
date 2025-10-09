<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Enums\PaymentMethod;
use App\Enums\PaymentStatus;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')->constrained('orders')->cascadeOnDelete();
            // $table->enum('payment_method', ['card', 'bank', 'cod', 'wallet'])
            //     ->comment('Phương thức thanh toán');
            $table->enum('payment_method', PaymentMethod::values())
                ->comment('Phương thức thanh toán');
            $table->string('transaction_id', 100)->nullable()
                ->comment('Mã giao dịch');
            $table->decimal('amount', 10, 2)->default(0);
            $table->timestamp('paid_at')->nullable();
            // $table->enum('status', ['pending', 'success', 'failed'])->default('pending')
            //     ->comment('Trạng thái thanh toán');
            $table->enum('status', PaymentStatus::values())
                ->default(PaymentStatus::Pending->value)
                ->comment('Trạng thái thanh toán');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};