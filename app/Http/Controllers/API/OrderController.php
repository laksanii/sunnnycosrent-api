<?php

namespace App\Http\Controllers\API;

use Exception;
use App\Models\Order;
use App\Models\Costume;
use Illuminate\Http\Request;
use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\StoreCostumeRequest;
use App\Http\Requests\UpdateCostumeRequest;

class OrderController extends Controller
{
    public function fetch(Request $request)
    {
        $id = $request->input('id');
        $costume_id = $request->input('costume_id');
        $limit = $request->input('limit', 10);

        $orderQuery = Order::with(['costume']);

        // Get single data
        if ($id) {
            $order = $orderQuery->find($id);

            if ($order) {
                return ResponseFormatter::success($order, 'Order found');
            }

            return ResponseFormatter::success(null, 'Order not found');
        }

        // Get multiple data
        $order = $orderQuery;

        if ($costume_id) {
            if ($order->where('costume_id', $costume_id)->count()) {
                return ResponseFormatter::success(
                    $order->paginate($limit),
                    'Order found'
                );
            }

            return ResponseFormatter::success(null, 'Order not found');
        }

        return ResponseFormatter::success(
            $order->paginate($limit),
            'Order found'
        );
    }

    // STORE
    public function store(StoreOrderRequest $request)
    {
        try {
            //code...

            $ktp_pict_path = $request->file('KTP_pict')->store('public/ktp_pict/' . 'OD0101');
            $ktp_selfie_path = $request->file('KTP_pict')->store('public/ktp_selfie/' . 'OD0101');
            $payment_pict_path = $request->file('KTP_pict')->store('public/payment_pict/' . 'OD0101');
            $order = Order::create([
                'name' => $request->name,
                'email' => $request->email,
                'telp_numb' => $request->telp_numb,
                'whatsapp' => $request->whatsapp,
                'instagram' => $request->instagram,
                'address' => $request->address,
                'family_number1' => $request->family_number1,
                'family_number2' => $request->family_number2,
                'province' => $request->province,
                'city' => $request->city,
                'district' => $request->district,
                'post_code' => $request->post_code,
                'KTP_pict' => $ktp_pict_path,
                'KTP_selfie' => $ktp_selfie_path,
                'payment_pict' => $payment_pict_path,
                'costume_id' => $request->costume_id,
                'rent_date' => $request->rent_date,
                'ship_date' => $request->ship_date,
                'total_price' => $request->total_payment,
                'DP' => $request->DP,
                'payment_status' => 'belum lunas',
                'code' => 'OD0105',
            ]);

            if (!$order) {
                throw new Exception('Order stored failed');
            }

            return ResponseFormatter::success($order, 'Costume stored successfully');
        } catch (Exception $e) {
            return ResponseFormatter::error($e->getMessage(), 500);
        }
    }

    // UPDATE
    // public function update(UpdateCostumeRequest $request, $id)
    // {
    //     try {
    //         //code...
    //         $costume = Costume::find($id);

    //         if (!$costume) {
    //             throw new Exception('Costume not found');
    //         }

    //         // Update costume
    //         $costume->update([
    //             'name' => $request->name,
    //             'category_id' => $request->category_id,
    //             'sizes' => $request->sizes,
    //             'ld' => $request->ld,
    //             'lp' => $request->lp,
    //             'price' => $request->price,
    //         ]);

    //         return ResponseFormatter::success($costume, 'Costume updated successfully');
    //     } catch (Exception $e) {
    //         return ResponseFormatter::error($e->getMessage(), 500);
    //     }
    // }

    // // DELETE
    // public function delete($id)
    // {
    //     try {
    //         //code...
    //         $costume = Costume::find($id);

    //         if (!$costume) {
    //             throw new Exception('Costume not found');
    //         }

    //         $costume->delete();

    //         return ResponseFormatter::success('Costume deleted successfully');
    //     } catch (Exception $e) {
    //         return ResponseFormatter::error($e->getMessage(), 500);
    //     }
    // }
}