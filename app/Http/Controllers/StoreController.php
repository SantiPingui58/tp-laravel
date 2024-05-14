<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\StoreItem;

class StoreController extends Controller
{
    public function index() {
        $items = StoreItem::all();
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
        $item = new StoreItem();
        $item->nombre = request()->input('nombre');
        $item->descripcion = request()->input('descripcion');
        $item->precio = request()->input('precio');
        $item->descuento = request()->input('descuento');
        $item->stock = request()->input('stock');
        $item->imagen = request()->input('imagen');
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
        $item->imagen = request()->input('imagen');
        $item->save();
        return redirect('/store/admin/')->with('success', 'El producto se ha guardado correctamente!');

    }

    public function delete($id) {
        $item = StoreItem::find($id);
        $item->delete();
        return redirect('/store/admin/')->with('success', 'El producto se ha eliminado correctamente!');
    }


}
