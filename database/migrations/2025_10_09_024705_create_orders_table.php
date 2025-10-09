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
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete()->comment('Người đặt hàng');
            $table->string('order_number', 50)->unique()->comment('Mã đơn hàng');
            $table->decimal('total_amount', 10, 2)->default(0)->comment('Tổng tiền');
            $table->decimal('shipping_fee', 10, 2)->default(0)->comment('Phí vận chuyển');
            $table->text('customer_note')->nullable()->comment('Ghi chú của khách');
            $table->text('admin_note')->nullable()->comment('Ghi chú của admin');
            // $table->enum('status', ['pending', 'paid', 'shipped', 'completed', 'cancelled'])
            //     ->default('pending')
            //     ->comment('Trạng thái đơn hàng');
            $table->enum('status', OrderStatus::values())
                ->default(OrderStatus::Pending->value)
                ->comment('Trạng thái đơn hàng');
            $table->timestamps();
            $table->timestamp('delivered_at')->nullable()->comment('Thời điểm giao hàng');
            $table->timestamp('completed_at')->nullable()->comment('Thời điểm hoàn tất');
            $table->timestamp('cancelled_at')->nullable()->comment('Thời điểm hủy');
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