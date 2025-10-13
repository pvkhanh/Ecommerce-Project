<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Enums\OrderStatus;


return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete()->index()->comment('The person who placed the order');
            $table->string('order_number', 50)->unique()->comment('Order code');
            $table->decimal('total_amount', 10, 2)->default(0)->comment('Total amount');
            $table->decimal('shipping_fee', 10, 2)->default(0)->comment('Shipping fee');
            $table->text('customer_note')->nullable()->comment('Guest Notes');
            $table->text('admin_note')->nullable()->comment('Administrator Note');
            // $table->enum('status', ['pending', 'paid', 'shipped', 'completed', 'cancelled'])
            //     ->default('pending')
            //     ->comment('Trạng thái đơn hàng');
            $table->enum('status', OrderStatus::values())
                ->default(OrderStatus::Pending->value)
                ->comment('Order status');
            $table->timestamps();
            $table->timestamp('delivered_at')->nullable()->comment('Delivery time');
            $table->timestamp('completed_at')->nullable()->comment('Completion time');
            $table->timestamp('cancelled_at')->nullable()->comment('Time of cancellation');
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
