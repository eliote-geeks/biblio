<?php

namespace App\Http\Controllers;

use App\Models\Book;
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
        // Récupérer le livre existant par son ID
        $book = Book::find($order->book_id);
        // Vérifier si le livre existe
        if ($book) {
            $book->quantity -= 1;
            $book->save();
        } else {
           
            throw new \Exception('Le livre associé à la commande n\'a pas été trouvé.');
        }

        // Mettre à jour le statut et la date de prise de la commande
        $order->status = 'accept';
        $order->date_take = now();

        // Sauvegarder la commande
        $order->save();

        toastr()->success('Order accepted successfully.');

        // Rediriger vers la page d'index des commandes
        return redirect()->route('order.index');
    }



    public function received(Order $order)
    {
        // Récupérer le livre existant par son ID
        $book = Book::find($order->book_id);
        // Vérifier si le livre existe
        if ($book) {
            $book->quantity += 1;
            $book->save();
        } else {
           
            throw new \Exception('Le livre associé à la commande n\'a pas été trouvé.');
        }
        $order->status = 'done';

        $order->book->quantity += 1;
        $order->delete();
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
