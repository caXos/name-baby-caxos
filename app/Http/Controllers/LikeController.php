<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\BabyName;
use App\Models\Like;

class LikeController extends Controller
{
    //
    public function getLiked(Request $request) {
        $user = Auth::user()->id;
        $babyname = BabyName::find($request->id_babyname);
        $like = Like::where('id_user',$user)->where('id_babyname',$babyname->id)->first();
        if ($like != null) return response()->json([
            'message'=>'Esse usuário já deu like nessa sugestão',
        ]);
        else return response()->json([
            'message'=>'Esse usuário não deu like nessa sugestão',
        ]);
    }

    public function like(Request $request)
    {
        $babyname = BabyName::find($request->id_babyname);
        $value = $babyname->likes;
        $babyname->likes = $value+1;
        $babyname->save();
        return response()->json([
            'message'=>'Thanks',
        ]);
    }

    public function dislike(Request $request)
    {
        $babyname = BabyName::find($request->babyname);
        $value = $babyname->likes;
        $babyname->likes = $value-1;
        $babyname->save();
        return response()->json([
            'message'=>'Thanks',
        ]);
    }
}
