<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class OrdersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('orders')->insert([
            [
                'user_id' => 1,
                'total_amount' => 250000.00,
                'status_id' => 1, // Đang xử lý
                'item_count' => 3,
                'subtotal' => 230000.00,
                'promotion_id' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'user_id' => 2,
                'total_amount' => 180000.00,
                'status_id' => 2, // Hoàn thành
                'item_count' => 2,
                'subtotal' => 170000.00,
                'promotion_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'user_id' => 3,
                'total_amount' => 50000.00,
                'status_id' => 3, // Đã hủy
                'item_count' => 1,
                'subtotal' => 50000.00,
                'promotion_id' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
