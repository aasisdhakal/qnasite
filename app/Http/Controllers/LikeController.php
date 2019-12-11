<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

use Illuminate\Support\Facades\Auth;

use  App\Like;

class LikeController extends Controller
{
    //

    // app/Http/Controllers/LikeController.php

    public function isLikedByMe($id)
    {
        $post = Post::findOrFail($id)->first();
        if (Like::whereUserId(Auth::id())->wherePostId($post->id)->exists()){
            return 'true';
        }
        return 'false';
    }

    public function like(Post $post)
    {
        dd($post->id);


        $existing_like = Like::withTrashed()->wherePostId($post->id)->whereUserId(Auth::id())->first();

        dd($existing_like);

        if (is_null($existing_like)) {
            Like::create([
                'post_id' => $post->id,
                'user_id' => Auth::id()
            ]);
        } else {
            if (is_null($existing_like->deleted_at)) {
                $existing_like->delete();
            } else {
                $existing_like->restore();
            }
        }
    }

}
