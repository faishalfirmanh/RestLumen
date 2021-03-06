<?php

namespace App\Http\Controllers;

use App\Model\Item;
use Illuminate\Http\Request;

class ItemController extends Controller {

    public function index(){
        $item = Item::all();
        return response()->json($item);
    }

    public function show($id){
        $item = Item::findOrFail($id);
        return response()->json($item);
    }

    public function create(Request $req){
        $item = Item::create($req->all())->id_item;
        // dd($iten);
        return response()->json(['Messages'=>'Successfully Saved']);
    }

    public function update(Request $req,$id){
        Item::find($id)->update($req->all());
        return response()->json([
            'Messages' => 'Successfully Updated',
            'Data' => Item::find($id)
        ]);
    }

    public function delete($id){
        Item::destroy($id);
        return response()->json(['message' => 'Successfully Deleted']);
    }

}
