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
        if ($like != null) return response()->json('Esse usuário já deu like nessa sugestão');
        else return response()->json('Esse usuário não deu like nessa sugestão');
    }

    public static function getLikes(int $id_user) {
        // $likes = Like::where('id_user',$id_user)->get('id_babyname');
        $likes = Like::where('id_user',$id_user)->get('id_babyname')->toArray('id_babyname');
        // $likes = Like::where('id_user',$id_user)->get('id_babyname')->toJSON();
        // $likes = Like::where('id_user',$id_user)->get('id_babyname')->toArray();
        // error_log($likes);
        //return $likes;
        error_log(response()->json($likes));
        return response()->json($likes);
        // return response($likes);
    }

    public function like(Request $request)
    {
        $babyname = BabyName::find($request->id_babyname);
        $value = $babyname->likes;
        $babyname->likes = $value+1;
        $babyname->save();
        $like = new Like([
            'id_user' => Auth::user()->id,
            'id_babyname' => $babyname->id
        ]);
        $like->save();
        // return response()->json('Like adicionado!');
        return true;
    }

    public function dislike(Request $request)
    {
        $babyname = BabyName::find($request->id_babyname);
        $value = $babyname->likes;
        $babyname->likes = $value-1;
        $babyname->save();
        $like = Like::where('id_user',Auth::user()->id)->where('id_babyname',$babyname->id);
        $like->delete();
        return response()->json('Like removido!');
    }
}
