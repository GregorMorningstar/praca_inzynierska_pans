<?php

namespace App\Http\Controllers;

use App\Models\order_user;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DriverController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $userId = Auth::id();

        $orderData = order_user::where('user_id', $userId)
            ->whereNull('odjazd_dostawa') // wyswietla sie gdy nie jest zaznaczona data odjazdu z zaladunku
            ->with('order', 'user')
            ->paginate(5);

        return view('driver.index', ['user_id' => $userId, 'order_data' => $orderData]);
    }

    public function history()
    {
        $userId = Auth::id();

        $orderData = order_user::where('user_id', $userId)
            ->whereNotNull('odjazd_dostawa') // wyswietla sie gdy nie jest zaznaczona data odjazdu z zaladunku
            ->with('order', 'user')
            ->paginate(5);

        return view('driver.history', ['user_id' => $userId, 'order_data' => $orderData]);
    }
    public function details($id)
    {
        // Tutaj możesz dodać logikę dotyczącą szczegółów danego zlecenia na podstawie jego ID

        return view('driver.details', ['order_id' => $id]);
    }

    public function details_one(Request $request)
    {
        $orderId = $request->route('id');
        $orderData = order_user::where('order_id', $orderId)
                     ->firstOrFail();
        return view('driver.details_one', ['orderId' => $orderId,'orderData'=>$orderData]);

    }
}
