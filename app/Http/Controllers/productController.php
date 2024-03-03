<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Discount;
use Illuminate\Support\Facades\Storage;

class productController extends Controller
{
    public function index()
    {
    $products = Product::orderBy('created_at', 'desc')->paginate(10);
        $categories = Category::orderBy('created_at', 'desc')->paginate(10);
        $discounts = Discount::orderBy('created_at', 'desc')->paginate(10);

        return view('admin.products.index', compact('products', 'categories', 'discounts'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.products.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'information' => 'required',
            'price' => 'required',
            'id_category' => 'required|numeric',
            'quantity' => 'required|numeric',
            'media' => 'required|mimes:jpeg,jpg,png,svg,webp|max:10000',
        ], [
            'name.required' => 'Le nom est requis',
            'description.required' => 'La description est requise',
            'information.required' => 'Il faut entrer les informations du produit',
            'price.required' => 'Veuillez renseigner un prix',
            'id_category.required' => 'Vous devez associer une catégorie',
            'quantity.required' => 'Il faut renseigner la quantité',
            'media.required' => "Il faut ajouter une image au produit",
            'media.mimes' => "Votre image n'a pas le bon format, formats autorisés : jpeg,jpg,gif,svg,webp",
            'media.max' => "Votre image est trop lourde. max : 10 mo",
            'media.image' => "Votre image est trop lourde. max : 10 mo",
        ]);

        $data = $request->except('media');

        // Vérifiez si une image a été téléchargée avant de tenter de la stocker
        if ($request->hasFile('media')) {
            $image = $request->file('media');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('public/images', $imageName);
            $data['media'] = $imageName;
        }
        Product::create($data);

        return redirect()->route('admin.products.index')->with('success', 'Le produit a bien été créé');
    }

    public function edit(string $id)
    {
        $product = Product::find($id);
        return view(('admin.products.edit'), compact('product'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
            'quantity' => 'required|numeric',
        ]);
        $product = Product::find($id);

        $input = $request->all();

        if ($request->hasFile('media')) {
            $image = $request->file('media');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('public/images', $imageName);
            $input['media'] = $imageName;
            if ($product->media) {
                Storage::delete('public/images/' . $product->media);
            }
        }
        $product->update($input);
        //dd($product);
        return redirect()->route('admin.products.index')->with('success', 'Le produit a été mis à jour avec succès');
    }

    public function destroy(string $id)
    {
        $produits = Product::findOrFail($id);

        if (!is_null($produits->featured_image)) {
            Storage::disk('public')->delete($produits->featured_image);
        }

        $produits->delete();

        session()->flash('notif.success', 'Category deleted successfully!');

        return redirect()->route('admin.products.index');
    }

    public function createCategory()
    {
        return view('admin.category.create');
    }

    public function storeCategory(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
        ], [
            'name.required' => 'Le nom est requis',
            'description.required' => 'La description est requise',
        ]);

        Category::create($request->post());

        return redirect()->route('admin.products.index')->with('success', 'La catégorie à bien été créée');
    }

    public function show(Product $product)
    {
        return view('shop.category', compact('product'));
    }

    public function editCategory(Category $category, $id)
    {
        $category = Category::find($id);
        return view(('admin.category.edit'), compact('category'));
    }

    public function updateCategory(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required'
        ]);
        $category = Category::find($id);
        $category->update($request->all());
        return redirect()->route('admin.products.index')->with('success', 'La catégorie a été mise à jour avec succès');
    }

    public function destroyCategory(string $id)
    {
        $category = Category::findOrFail($id);

        if (!is_null($category->featured_image)) {
            Storage::disk('public')->delete($category->featured_image);
        }

        $category->delete();

        session()->flash('notif.success', 'Category deleted successfully!');

        return redirect()->route('admin.products.index');
    }

    public function toggleStatus($id)
    {
        $product = Product::findOrFail($id);

        $product->update([
            'active' => !$product->active,
        ]);

        return redirect()->route('admin.products.index')->with('success', 'Le statut du produit a bien été mis à jour');
    }
}
