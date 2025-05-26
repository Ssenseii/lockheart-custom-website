<?php

namespace App\Http\Controllers;

use App\Mail\ProductOrderNotification;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ProductsController extends Controller
{

    public function index()
    {
        $products = Product::all();
        return view('website.pages.products', compact('products'));
    }

    public function show($slug)
    {
        $product = Product::where('slug', $slug)->firstOrFail();
        return view('website.pages.product', compact('product'));
    }

    public function buy(Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:20',
            'quantity' => 'required|integer|min:1',
            'message' => 'nullable|string',
            'product' => 'required|string',
        ]);

        // Prepare the order data
        $orderData = [
            'product' => $validatedData['product'],
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'phone' => $validatedData['phone'] ?? 'Non fourni',
            'quantity' => $validatedData['quantity'],
            'message' => $validatedData['message'] ?? 'Aucun message supplémentaire',
            'orderDate' => now()->format('d/m/Y H:i'),
        ];

        // Send email (to admin and optionally to customer)
        try {
            // Send to admin
            Mail::to('admin@example.com')->send(new ProductOrderNotification($orderData));

            // Optionally send a copy to the customer
            Mail::to($validatedData['email'])->send(new ProductOrderNotification($orderData, true));

            return back()->with('success', 'Votre demande a été envoyée avec succès! Nous vous contacterons bientôt.');
        } catch (\Exception $e) {
            return back()->with('error', 'Une erreur est survenue lors de l\'envoi de votre demande. Veuillez réessayer.')->withInput();
        }
    }
}
