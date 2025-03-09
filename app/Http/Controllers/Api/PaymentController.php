<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Payment;
use Carbon\Carbon;

class PaymentController extends Controller
{
    // Lấy tất cả thanh toán
    public function index()
    {
        return response()->json([
            'status' => true,
            'data' => Payment::all(),
        ], 200);
    }

    // Lấy chi tiết thanh toán theo ID
    public function show($id)
    {
        $payment = Payment::find($id);
        if (!$payment) {
            return response()->json(['status' => false, 'message' => 'Không tìm thấy thanh toán'], 404);
        }
        return response()->json(['status' => true, 'data' => $payment], 200);
    }

    // Thêm mới thanh toán
    public function store(Request $request)
    {
        $request->validate([
            'order_id' => 'required|exists:orders,id',
            'method' => 'required|string|max:50',
            'amount' => 'required|numeric|min:1',
            'payment_date' => 'nullable|date',
            'status_id' => 'required|integer|in:0,1', // 0: Thất bại, 1: Thành công
        ]);

        try {
            $payment = Payment::create([
                'order_id' => $request->order_id,
                'method' => $request->method,
                'amount' => $request->amount,
                'payment_date' => $request->payment_date ?? Carbon::now(),
                'status_id' => $request->status_id,
            ]);

            return response()->json([
                'status' => true,
                'message' => 'Thanh toán đã được tạo',
                'data' => $payment,
            ], 201);
        } catch (\Exception $e) {
            return response()->json(['status' => false, 'message' => 'Lỗi khi tạo thanh toán'], 500);
        }
    }

    // Cập nhật thanh toán
    public function update(Request $request, $id)
    {
        $payment = Payment::find($id);
        if (!$payment) {
            return response()->json(['status' => false, 'message' => 'Không tìm thấy thanh toán'], 404);
        }

        $request->validate([
            'order_id' => 'sometimes|required|exists:orders,id',
            'method' => 'sometimes|required|string|max:50',
            'amount' => 'sometimes|required|numeric|min:1',
            'payment_date' => 'nullable|date',
            'status_id' => 'sometimes|required|integer|in:0,1',
        ]);

        try {
            $payment->update($request->all());

            return response()->json([
                'status' => true,
                'message' => 'Cập nhật thành công',
                'data' => $payment,
            ], 200);
        } catch (\Exception $e) {
            return response()->json(['status' => false, 'message' => 'Lỗi khi cập nhật thanh toán'], 500);
        }
    }

    // Xóa thanh toán
    public function destroy($id)
    {
        $payment = Payment::find($id);
        if (!$payment) {
            return response()->json(['status' => false, 'message' => 'Không tìm thấy thanh toán'], 404);
        }

        try {
            $payment->delete();
            return response()->json(['status' => true, 'message' => 'Xóa thành công'], 200);
        } catch (\Exception $e) {
            return response()->json(['status' => false, 'message' => 'Lỗi khi xóa thanh toán'], 500);
        }
    }
}
