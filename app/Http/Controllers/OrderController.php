<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders = Order::where('status', 'wait')->get();
        $ordersAccepted = Order::whereIn('status', ['accept', 'received', 'collect'])->get();

        return view('order.commande', compact('orders', 'ordersAccepted'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }
    public function accept(Order $order)
    {
        // Décrémenter la quantité
        $order->book->quantity -+ 1;

        // Mettre à jour le statut et la date de prise
        $order->status = 'accept';
        $order->date_take = now();

        // Sauvegarder la commande
        $order->save();

        // Afficher un message de succès
        toastr()->success('Order accepted successfully.');

        // Rediriger vers la page d'index des commandes
        return redirect()->route('order.index');
    }


    public function received(Order $order)
    {
        $order->status = 'done';
        $order->book->quantity += 1;
        $order->save();
        toastr()->success('Book or ebook Collected successfully.');

        return redirect()->route('order.index');
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
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        $order->delete();
        toastr()->warning('Order deleted successfully.');

        return to_route('order.index');
    }
}
