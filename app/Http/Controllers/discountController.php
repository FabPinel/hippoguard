<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Discount;

class discountController extends Controller
{
    public function index()
    {
        $discounts = Discount::all();
        return view('admin.products.index', compact('discounts'));
    }

    public function create()
    {
        $discounts = Discount::all();
        return view('admin.discounts.create', compact('discounts'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
        ], [
            'name.required' => 'Le nom est requis',
            'description.required' => 'La description est requise',
        ]);

        $discountPercentValue = $request->input('discount_percent');
        $discountPercent = ($discountPercentValue === null) ? 0 : $discountPercentValue;

        $discountAmountValue = $request->input('discount_amount');
        $discountAmount = ($discountAmountValue === null) ? 0 : $discountAmountValue;

        // dd($request);
        // die;
        Discount::create([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'discount_percent' => $discountPercent,
            'discount_amount' => $discountAmount,
        ]);

        return redirect()->route('admin.products.index')->with('success', 'Le code promo à bien été créé');
    }


    public function destroy(string $id)
    {
        $discounts = Discount::findOrFail($id);

        $discounts->delete();

        session()->flash('notif.success', 'Discount deleted successfully!');

        return redirect()->route('admin.products.index');
    }

    public function edit(string $id)
    {
        $discounts = Discount::find($id);
        return view(('admin.discounts.edit'), compact('discounts'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);

        $discount = Discount::find($id);

        $input = $request->all();

        // Utilisation de l'opérateur ternaire pour définir la valeur de $input['discount_amount'] à 0 si elle est vide ou non définie
        $input['discount_amount'] = ($input['discount_amount'] === null) ? 0 : $input['discount_amount'];

        // Utilisation de l'opérateur ternaire pour définir la valeur de $input['discount_percent'] à 0 si elle est vide ou non définie
        $input['discount_percent'] = ($input['discount_percent'] === null) ? 0 : $input['discount_percent'];

        $discount->update($input);

        return redirect()->route('admin.products.index')->with('success', 'La promotion a été mise à jour avec succès');
    }

    public function toggleStatus($id)
    {
        $discount = Discount::findOrFail($id);

        // Basculez le statut en utilisant la négation
        $discount->update([
            'active' => !$discount->active,
        ]);

        return redirect()->route('admin.products.index')->with('success', 'Le statut de la promo a été mis à jour avec succès');
    }

    public function applyDiscount(Request $request)
    {
        $coupon = $request->input('coupon');
        $discount = Discount::where('name', $coupon)->where('active', true)->first();
        // dd($coupon, $discount);
        if ($discount) {
            session(['discount_code' => $coupon, 'discount' => $discount]);
            return redirect()->back()->with('success', 'Code promo appliqué avec succès.');
        } else {
            return redirect()->back()->with('error', 'Code promo invalide.');
        }
    }

    public function removeDiscount()
    {
        session()->forget('discount');

        return redirect()->back(); // Redirigez où vous voulez après avoir supprimé le code promo
    }
}
