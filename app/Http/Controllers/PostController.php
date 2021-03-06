<?php

namespace App\Http\Controllers;

use App\User;
use App\Post;
use App\Like;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class PostController extends Controller
{


    public function create(Request $request)
    {

        $iduserauth = Auth::id();
        $iduserreceiver = $request['iduserreceiver'];
        $content = $request ['text-post'];
        $postType = $request ['options-post'];
        

        $userreceiver= User::find($iduserreceiver);

        $post = new Post();
        $post->idusertransmitter = $iduserauth;
        $post->description = $content;
        $post->typepost = $postType;

        $userreceiver->posts()->save($post);

        $idpost = $post->idpost;
        $user = Auth::user();
        $usercreate = User::find($post->idusertransmitter);
        $userreceiver = User::find($post->iduserreceiver);
        $idcheckbox = "checkbox".$post->idpost;
        $token = $request['_token'];

        $totallike = Like::where('idpostlike', '=' ,  $post->idpost)->where('iduserlike', '=' , Auth::id())->count();

        $validar;
        $totallike += 0;

        if($totallike == 0)
        {
            $validar = false;
        }else{
            $validar = true;
        }   

        $postHtml =
"
<div class='col-lg-12 col-md-12 col-sm-12 col-xs-12 divs-posts' id='dp-$idpost'>

    <div class='col-lg-12 col-md-12 col-sm-12 col-xs-12 header-post'>

        <a href='/perfil/$usercreate->iduser' class='link-photo-profile-post'> <img src='../image/photo-user/$usercreate->photo' class='photo-profile-post'> </a>

        <a href='/perfil/$usercreate->iduser' class='name-post'>$usercreate->nameUser</a>

        <div class='btn-group pull-right'>

            <button type='button' class='btn btn-link dropdown-toggle btn-options' data-toggle='dropdown'> <img src='../image/icons/points-menu.png' class='points-menu'>
               
                <span class='sr-only'>Desplegar menú</span>

             </button>
             
            <ul class='dropdown-menu' role='menu'>

                <li>
                    <a id='$idpost' class='delete-p'>Eliminar publicación</a>
                </li>   

            </ul>

        </div>
        
    </div>

    <div class='col-lg-12 col-md-12 col-sm-12 col-xs-12 content-post'>

        <p>$post->description</p>
        
    </div>

    <div class='col-lg-12 col-md-12 col-sm-12 col-xs-12 footer-post'>

        <div class='col-lg-6 col-md-6 col-sm-6 col-xs-6 options-post'>

            <a  class='link-comment' id='$idpost'><span class='glyphicon glyphicon-comment'></span><span class='comment hidden-xs'>Comentar</span></a>

    
            <input type='checkbox' name='likes' id='$idcheckbox' class='link-like' value='$idpost' @if ($validar)checked @endif />

            <label for='$idcheckbox'>Me gusta</label>               

        </div>

        <div class='col-lg-6 col-md-6 col-sm-6 col-xs-6  time-post'>
            Hace un momento
        </div>

    </div>

    <hr style='border: 0.2px solid #e0e0e0;'>

    <div id='all_comments-$idpost' class='all_comments'>

        

    </div>

    <div class='col-lg-12 col-md-12 col-sm-12 col-xs-12 comment-post'>

        <div class='col-lg-1 col-md-1 col-sm-1 hidden-xs  img-comment'>

            <img src='../image/photo-user/$user->photo' class='photo-profile-comment'/>

        </div>

        <div class='col-lg-11 col-md-11 col-sm-11 col-xs-12 txt-comment'>

            <form class='formulario' id='$idpost'>

                <input type='hidden' name='postid' value='$idpost' id='postid-$idpost' />

                <textarea class='form-control comment-txt-$idpost textarea3' placeholder='¿Tienes algo que comentar?' name='comment' id='$idpost'></textarea>

                <button type='submit' class='btn btn-link btn-submit pull-right' id='btn-submit-link-$idpost' disabled></button> 

                <input type='hidden' value='$token'  name='_token' id='token'/>
            
            </form>

        </div>

    </div>

</div>
";

    return response()->json(['response' => $postHtml]);

    }

    public function delete($idpost){

        $post = Post::find($idpost);

        $post->delete();

        return response()->json(['response' => true]);
    }

    


}
