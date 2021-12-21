<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ListItem;
use Illuminate\Support\Facades\Log;

class TodoListController extends Controller
{

    public function rendbenVan($id) {
        $listItem = ListItem::find($id);
        $listItem->befejezett = 1;
        $listItem->save();
        return redirect('/');
    }

    public function index()
    {
        return view('welcome', ['listItems' => ListItem::where('befejezett',0)->get()]);
    }

    public function saveItem(Request $request)
    {
        $newListItem = new ListItem;
        $newListItem->leiras = $request->listItem;
        $newListItem->befejezett = 0;
        $newListItem->save();
        return redirect('/');
        
    }
}
