<?php

namespace App\Http\Controllers;

use App\Models\BabyName;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class BabyNameController extends Controller
{
    //
    public function index()
    {
        $babynames = BabyName::all()->toArray();
        // $babynames = BabyName::all()->json();
        return array_reverse($babynames);     
        // return $babynames;
    }
    public function store(Request $request)
    {
        $babyname = new BabyName([
            'name' => $request->input('name'),
            'gender' => $request->input('gender'),
            'creator' => Auth::user()->name,
            'creator_id' => Auth::user()->id,
            'likes' => 0
        ]);
        $babyname->save();
        // return true; //Alterar essa "div"
        // return response('Sugestão criada!'); //Alterar essa "div"
        // return response()->json('Sugestão criada!'); //Alterar essa "div"
        // return response()->view('sugestaoCriada',[''],200); //Alterar essa "div"
        return Inertia::render('SugestaoCriada',['gender'=>$babyname->gender,'suggestionName'=>$babyname->name]); //Alterar essa "div"
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
