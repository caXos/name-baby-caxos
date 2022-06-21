<?php

namespace App\Http\Controllers;

use App\Models\BabyName;
use Illuminate\Http\Request;

class BabyNameController extends Controller
{
    //
    public function index()
    {
        $babynames = BabyName::all()->toArray();
        return array_reverse($babynames);      
    }
    public function store(Request $request)
    {
        $babyname = new BabyName([
            'name' => $request->input('name'),
            'detail' => $request->input('detail')
        ]);
        $babyname->save();
        return response()->json('BabyName created!');
    }
    public function show($id)
    {
        $babyname = BabyName::find($id);
        return response()->json($babyname);
    }
    public function update($id, Request $request)
    {
        $babyname = BabyName::find($id);
        $babyname->update($request->all());
        return response()->json('BabyName updated!');
    }
    public function destroy($id)
    {
        $babyname = BabyName::find($id);
        $babyname->delete();
        return response()->json('BabyName deleted!');
    }
}
