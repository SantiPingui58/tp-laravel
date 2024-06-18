<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\StoreItem;
use App\Models\Image;

class StoreController extends Controller
{

    public function index() {
        if(request()->has('nombre')) {

        $items = StoreItem::where('nombre','like','%'.request()->input('nombre').'%')
        ->orderBy('precio')->get();
        } else {
            $items = StoreItem::all();
        }

        return view('store.index',['items'=> $items]);
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
        $item->nombre = request()->input('nombre');
        $item->descripcion = request()->input('descripcion');
        $item->precio = request()->input('precio');
        $item->descuento = request()->input('descuento');
        $item->stock = request()->input('stock');
        $item->imagen_id = $image->id;
        $item->save();
        return redirect('/store/admin/')->with('success', 'El producto se ha creado correctamente!');
    }

    public function edit($id) {
        $item = StoreItem::find($id);
        return view('store.admin.edit', ['item' => $item]);
    }

    public function update($id) {
        $item = StoreItem::find($id);

        $item->nombre = request()->input('nombre');
        $item->descripcion = request()->input('descripcion');
        $item->precio = request()->input('precio');
        $item->descuento = request()->input('descuento');
        $item->stock = request()->input('stock');

        if (request()->hasFile('imagen')) {
            $image = Image::find($item->imagen_id);
            if (!$image) {
                $image = new Image();
            }

            $size = request()->file('imagen')->getSize();
            $extension = request()->file('imagen')->getClientOriginalExtension();
            $src = request()->file('imagen')->store('public/store/products');

            $image->size = $size;
            $image->extension = $extension;
            $image->src = $src;
            $image->save();

            $item->imagen_id = $image->id;
        }

        $item->save();
        return redirect('/store/admin/')->with('success', 'El producto se ha actualizado correctamente!');
    }


    public function delete($id) {
        $item = StoreItem::find($id);
        $item->delete();
        return redirect('/store/admin/')->with('success', 'El producto se ha eliminado correctamente!');
    }


}
