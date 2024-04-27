<?php

namespace App\Http\Controllers;

use App\enum\OrderStatus;
use App\enum\UserRoles;
use App\Models\Orders;
use App\Models\User;
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

        return view('forwarder.history', ['orders' => $orders]);
    }

    public function active()
    {
        // Wybierz tylko rekordy, których rola to 'wystawione'
        $orders = Orders::where('role', OrderStatus::DELIVERED)
            ->orderBy('updated_at', 'desc')
            ->paginate(5);

        return view('forwarder.active', ['orders' => $orders]);
    }

    public function detailsOrder(Request $request, $id)
    {
        // Zabezpieczenie przed wyświetlaniem zleceń już pobranych
        $orderDriver = Orders::where('role', OrderStatus::PENDING)->findOrFail($id);
        return view('forwarder.details-order', ['myOrder' => $orderDriver]);
    }

    public function assign($id)
    {
        $order = Orders::findOrFail($id);
        $drivers = User::where('role', UserRoles::DRIVER)->get();

        return view('forwarder.assing', ['myOrder' => $order, 'drivers' => $drivers]);
    }

    // Przydzielenie kierowcy do zadania
    public function activeOrdersDriver(Request $request)
    {

        //id zamowienia
        $order_id = $request->input('order_id');
        //id kierowcy z inputa
        $driver_id = $request->input('driver_id');
     dd('zamowienie: '.$order_id,'kierowca '.$driver_id);
    }

    // Aktywacja zlecenia przez spedytora
    public function activation($id)
    {
        $activation = Orders::findOrFail($id);

        // Aktualizacja roli użytkownika
        $activation->role = \App\enum\OrderStatus::DELIVERED;

        // Zapisanie zmian w bazie danych
        $activation->update();
        return redirect()->route('forwarder.active', $activation->id)->with('success', 'Rola użytkownika została zaktualizowana pomyślnie!');
    }

    public function update(Request $request, string $id)
    {
        //
    }

    public function destroy(string $id)
    {
        //
    }
}
