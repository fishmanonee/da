<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatusSeeder extends Seeder
{
    public function run()
    {
        DB::table('status')->insert([
            ['id' => 1, 'name' => 'Đang xử lý'],
            ['id' => 2, 'name' => 'Đã xác nhận'],
            ['id' => 3, 'name' => 'Đang giao'],
            ['id' => 4, 'name' => 'Hoàn thành'],
            ['id' => 5, 'name' => 'Hủy đơn'],
        ]);
    }
}
