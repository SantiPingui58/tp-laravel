<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\StoreItem;
use App\Models\Image;
use App\Models\Category;

class StoreController extends Controller
{

    public function index(Request $request)
    {
        $items = StoreItem::query();

        if ($request->has('categoria')) {
            if ($request->categoria != 0) {
            $items->whereHas('category', function ($query) use ($request) {
                $query->where('id', $request->categoria);
            });
        }
        }

        $items = $items->orderBy('price')->get();
        $categories = Category::all();

        return view('store.index', [
            'items' => $items,
            'categories' => $categories,
        ]);
    }

    public function view($id) {
        $item = StoreItem::find($id);
        return view('store.view', ['item' => $item]);
    }


    public function admin() {
        $items = StoreItem::all();
        return view('store.admin.index',['items'=> $items]);
    }

    public function new() {
        return view('store.admin.new');
    }

    public function create() {
        $size = request()->file('imagen')->getSize();
        $extension = request()->file('imagen')->getClientOriginalExtension();
        $src = request()->file('imagen')->store('public/store/products');

        $image = new Image;
        $image->size = $size;
        $image->extension = $extension;
        $image->src = $src;
        $image->save();

        $item = new StoreItem();
        $item->name = request()->input('nombre');
        $item->description = request()->input('descripcion');
        $item->price = request()->input('precio');
        $item->disccount = request()->input('descuento');
        $item->stock = request()->input('stock');
        $item->image_id = $image->id;
        $item->save();
        return redirect('/store/admin/')->with('success', 'El producto se ha creado correctamente!');
    }

    public function edit($id) {
        $item = StoreItem::find($id);
        return view('store.admin.edit', ['item' => $item]);
    }

    public function update($id) {
        $item = StoreItem::find($id);

        $item->name = request()->input('nombre');
        $item->description = request()->input('descripcion');
        $item->price = request()->input('precio');
        $item->disccount = request()->input('descuento');
        $item->stock = request()->input('stock');

        if (request()->hasFile('imagen')) {
            $image = Image::find($item->imagen_id);
            if (!$image) {
                $image = new Image();
            }

            $size = request()->file('imagen')->getSize();
            $extension = request()->file('imagen')->getClientOriginalExtension();
            $src = request()->file('imagen')->store('products','public');

            $image->size = $size;
            $image->extension = $extension;
            $image->src = $src;
            $image->save();

            $item->image_id = $image->id;
        }

        $item->save();
        return redirect('/store/admin/')->with('success', 'El producto se ha actualizado correctamente!');
    }


    public function delete($id) {
        $item = StoreItem::find($id);
        $item->delete();
        return redirect('/store/admin/')->with('success', 'El producto se ha eliminado correctamente!');
    }


    public function addToCart($id) {
        if (session()->has('cart')) {
            $ids = session('cart');
            $ids[] = $id;
            session(['cart' => $ids]);
        } else {
            session(['cart' => [$id]]);
        }

        $item = StoreItem::find($id);
        return redirect('/store/')->with('success', "$item->name ha sido agregado al carrito de compras!");
    }

    public function removeFromCart($id) {
        $ids = session('cart');
        $ids = array_filter($ids, function ($current_id) use ($id) {
            return $current_id != $id;
        });

        session(['cart' => $ids]);
        $item = StoreItem::find($id);
        return redirect('/store/')->with('warning', "$item->name ha sido eliminado del carrito de compras.");
    }


    public function checkout() {
        if (session()->has('cart')) {
        $items = StoreItem::whereIn('id', session('cart'))->get();
        } else {
            $items = [];
        }
        return view('store.checkout', [
            'items' => $items
        ]);
    }


}
