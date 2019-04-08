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


        $usercreatecomment = User::find($comment->iduser);
        $postcomment = Post::find($comment->idpost);

        $nameUser = Auth::user()->nameUser;
        $idcomment = $comment->id;


        $validateUser;

        if ($postcomment->idusertransmitter == $iduser || $postcomment->iduserreceiver == $iduser || $comment->iduser == $iduser)
        {
            $validateUser = true;

        }else{

            $validateUser = false;
        }

        $commentHtml =
        "<div class='col-lg-12 col-md-12 col-sm-12 col-xs-12 header-post-comment dc-$idcomment' id='$idcomment'>

            <div class='col-lg-1 col-md-1 col-sm-1 col-xs-1 header-comment'>
                <a href=''> <img src='../image/photo-user/$usercreatecomment->photo' class='photo-profile-comment'> 
                </a>
            </div>
            
            <div class='col-lg-10 col-md-10 col-sm-10 col-xs-10 header-comment'>

                <a href='' class='name-user-comments'>$nameUser</a>

                <p class='comment-text'>$comment->comment</p>

            </div>

            <div class='col-lg-1 col-md-1 col-sm-1 col-xs-1 btn-comment-$idcomment btn-comment-icon' id='$validateUser' @if($validateUser == false) style='display:none' @endif>

                <div class='btn-group pull-right'>
                    <button type='button' class='btn btn-link dropdown-toggle btn-options' data-toggle='dropdown'> 
                        <img src='../image/icons/points-menu.png' class='points-menu-2'/>
                        <span class='sr-only'>Desplegar menú</span>
                    </button>
         
                    <ul class='dropdown-menu' role='menu'>
                        <li>
                            <input type='hidden' id='idusers-$idcomment' value='$postcomment->iduserreceiver' class='$iduser'>

                            <input type='hidden' value='$comment->iduser' id='idusercommment-$idcomment'>          

                            <button  id='$idcomment' class='delete-c' value='$postcomment->idusertransmitter'>Eliminar
                            </button>

                        </li>
                    </ul>
                </div>
            </div>


            <div class='modal fade modal-delete' id='delete-comment' role='dialog'>

                <div class='modal-dialog'>

                    <div class='modal-content'>
                        <div class='modal-header'>
                          <button type='button' class='close' data-dismiss='modal'>&times;</button>
                          <h6 class='modal-title'>Eliminar comentario</h6>
                        </div>
                        <div class='modal-body'>
                          <p>¿Realmente deseas eliminar el comentario?</p>
                        </div>
                        <div class='modal-footer'>

                          <button type='button' class='btn btn-default' data-dismiss='modal'>Cancelar</button>

                          <button type='button' class='btn btn-default btn-delete-modal-comment' id='btn-$idcomment' value='eliminar'>Eliminar</button>

                        </div>

                </div>

            </div>

            <div class='modal fade modal-delete' id='warning' role='dialog'>

                <div class='modal-dialog'>

                    <div class='modal-content'>
                        <div class='modal-header'>
                          <button type='button' class='close' data-dismiss='modal'>&times;</button>
                          <h6 class='modal-title'>¡Advertencia!</h6>
                        </div>
                        <div class='modal-body'>
                          <p>Tu no estás permitido para realizar este procedimiento, sólo puede hacerlo el propietario de la publicación.</p>
                        </div>
                        <div class='modal-footer'>

                          <button type='button' class='btn btn-default' data-dismiss='modal'>Cancelar</button>

                        </div>

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
