<?php

namespace App\Http\Controllers;

use App\User;
use App\Post;
use App\Comment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    
    public function createComment(Request $request)
    {
        
        $iduser = Auth::user()->iduser;
 

        $comment = new Comment();
        $comment->iduser = $iduser;
        $comment->comment = $request['comment'];
        $comment->idpost = $request['postid'];
    
        $comment->save();

        $user = Auth::user();
        $nameUser = Auth::user()->nameUser;
        $idcomment = $comment->id;

        $commentHtml = "<div class='col-lg-12 col-md-12 col-sm-12 col-xs-12 header-post-comment dc-$idcomment' id='$idcomment'>
            <div class='col-lg-1 col-md-1 col-sm-1 col-xs-1 header-comment'>
                <a href=''> <img src='../image/photo-user/$user->photo' class='photo-profile-comment'> 
                </a>
            </div>

            <div class='col-lg-10 col-md-10 col-sm-10 col-xs-10 header-comment'>

                <a href='' class='name-user-comments'>$nameUser</a>

                <p class='comment-text'>$comment->comment</p>

            </div>

            <div class='col-lg-1 col-md-1 col-sm-1 col-xs-1 btn-comment-$idcomment' id='btn-comment'>
                <div class='btn-group pull-right'>
                    <button type='button' class='btn btn-link dropdown-toggle btn-options' data-toggle='dropdown'> 
                        <img src='../image/icons/points-menu.png' class='points-menu-2'/>
                        <span class='sr-only'>Desplegar menú</span>
                    </button>
         
                    <ul class='dropdown-menu' role='menu'>
                        <li><a id='$idcomment' class='delete-c'>Eliminar</a></li>
                    </ul>
                </div>
            </div>

        </div>";
   
    return response()->json(['response' => $commentHtml]);
        
    }

   

    public function deleteComment($idcomment)
    {
  
        $comment = Comment::find($idcomment);
        $comment->delete();

        return response()->json(['response' => true]);

    }

    
   
}
