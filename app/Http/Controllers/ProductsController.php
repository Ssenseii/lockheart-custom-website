<?php

namespace App\Http\Controllers;

use App\Mail\ProductOrderMail;
use App\Mail\ProductOrderNotification;
use App\Models\Product;
use App\Models\ProductOrder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

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
        $validator = Validator::make($request->all(), [
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|max:255',
            'phone'    => 'required|string|max:20',
            'quantity' => 'nullable|integer|min:1',
            'message'  => 'nullable|string',
            'product'  => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        try {


            $data = $request->all();
            $data['quantity'] = $data['quantity'] ?? 1;

            $productOrder = ProductOrder::create($data);

            $orderData = $request->only(['name', 'email', 'phone', 'quantity', 'message', 'product']);

            Mail::to(config('mail.from.address'))->send(new ProductOrderMail($orderData));

            return redirect()->back()->with('success', 'Votre commande a été envoyée avec succès.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Une erreur est survenue lors de l’envoi de la commande.');
        }
    }
}
