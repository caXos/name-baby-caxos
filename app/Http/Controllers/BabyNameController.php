<?php

namespace App\Http\Controllers;

use App\Models\BabyName;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
            'gender' => $request->input('gender'),
            'creator' => Auth::user()->name,
            'votes' => 0
        ]);
        $babyname->save();
        return response()->json('BabyName created!'); //Alterar essa "div"
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