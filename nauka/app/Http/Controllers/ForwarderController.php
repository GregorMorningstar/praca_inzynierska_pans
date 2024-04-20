<?php

namespace App\Http\Controllers;

use App\enum\OrderStatus;
use App\Models\Orders;
use Illuminate\Http\Request;

class ForwarderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Wybierz tylko rekordy, których rola to 'wystawione'
        $orders = Orders::where('role', OrderStatus::PENDING)->paginate(10);

        return view('forwarder.index', ['orders' => $orders]);
    }

    public function driver()
    {
        return view('forwarder.driver');

    }

    public function history()
    {
        // Wybierz tylko rekordy, których rola to 'wystawione'
        $orders = Orders::where('role', OrderStatus::DONE)->paginate(10);

        return view('forwarder.history',['orders' => $orders]);

    }

    public function active()
    {
        // Wybierz tylko rekordy, których rola to 'wystawione'
        $orders = Orders::where('role', OrderStatus::DELIVERED)->paginate(5);




        return view('forwarder.active',['orders' => $orders]);

    }

    public function detalsOrder(Request $request, $id)
    {
        //zabezpieczenie przed wyswietlaniem zlecen juz pobranych
        $orderDriver = Orders::where('role', OrderStatus::PENDING)->findOrFail($id);
        return view('forwarder.detals-order', ['myOrder' => $orderDriver]);

    }


    public function assign($id)
    {
        $assing = Orders::findOrFail($id);
        return view('forwarder.assing', ['assing' => $assing]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
