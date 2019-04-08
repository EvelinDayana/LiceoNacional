<?php

namespace App\Http\Controllers;

use App\User;
use App\Post;
use App\Like;
use App\comment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Http\UploadedFile;
use DateTime;
use Image;

class PostController extends Controller
{

    public function create(Request $request)
    {

        $iduserauth = Auth::id();
        $iduserreceiver = $request['iduserreceiver'];
        $content = $request ['text-post'];
        $postType = $request ['options-post'];

        $userreceiver= User::find($iduserreceiver);

    
        $file = Input::file('file-photo-post');
        // $file_document = Input::file('file-doc-post');
           

        if($file == "")
        {
            $fileExtension = NULL;
        }else{
            $fileExtension = time() . '.' . $file->getClientOriginalExtension();

            $extension = $fileExtension;

            Image::make($file)->save(public_path('/image/photo-post/'.$extension)); 
        }
        $fileDoc = $request->file('file-doc-post');
        $fileDoc->storeAs('public/documentos/', $fileDoc->getClientOriginalName().$fileDoc->getClientOriginalExtension());

        // Storage::disk('local')->put($file_document.getClientOriginalName() . $file_document.getClientOriginalExtension(), $file_document->file)

/*        Storage::disk('local')->put('app/public/documents/'.$file_document.getClientOriginalName() . $file_document.getClientOriginalExtension(), $file_document->file)*/
/*        if ($file_document == "") {
            $file_document_extenion = NULL;
        }else{
            $file_document_extenion = time() . '.' . $file_document->getClientOriginalExtension();
            $extension_documento = $file_document_extenion;
            $filepath = storage_path('app/public/documentos/'.$extension_documento);
    
        }*/
 
        $post = new Post();
        $post->idusertransmitter = $iduserauth;
        $post->description = $content;
        $post->photopost = $fileExtension;
        $post->documentpost = "file_document_extenion";
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

        $validateUser;

        if ($post->idusertransmitter == $user->iduser || $post->iduserreceiver == $user->iduser) 
        {            
            $validateUser = true;
        }else{
            $validateUser = false;
        }

        $validatePhotoPost;
        

        if ($post->photopost == NULL) {
           $validatePhotoPost = "none";
        }else{
            $validatePhotoPost = "block";
        }

        if ($post->documentpost == NULL) {
           $validateDocPost = "none";
        }else{
            $validateDocPost = "block";
        }

        $postHtml =
            "<div class='col-lg-12 col-md-12 col-sm-12 col-xs-12 divs-posts' id='dp-$idpost'>

                <div class='col-lg-12 col-md-12 col-sm-12 col-xs-12 header-post'>

                    <a href='/perfil/$usercreate->iduser' class='link-photo-profile-post'> <img src='../image/photo-user/$usercreate->photo' class='photo-profile-post'> </a>

                    <a href='/perfil/$usercreate->iduser' class='name-post'>$usercreate->nameUser</a>

                    <div class='btn-group pull-right btn-delete-post' 
                        @if ($validateUser) 
                            style='display:block'
                        @else
                            style='display:none'
                        @endif
                        >

                        <button type='button' class='btn btn-link dropdown-toggle btn-options' data-toggle='dropdown'> <img src='../image/icons/points-menu.png' class='points-menu'>
                           
                            <span class='sr-only'>Desplegar menú</span>

                         </button>
                         
                        <ul class='dropdown-menu' role='menu'>

                            <li class='style-li'>
                                <input type='hidden' value='$post->idusertransmitter' id='idusertransmitter-$post->idpost' class='$user->iduser'>

                                <button id='$idpost' class='delete-p btn btn-link' value='$post->iduserreceiver'>Eliminar publicación</button>
                            </li>   

                        </ul>

                    </div>
                    
                </div>

                <div class='col-lg-12 col-md-12 col-sm-12 col-xs-12 content-post'>

                    <p>$post->description</p>

                    <img src='../image/photo-post/$post->photopost' style='display:$validatePhotoPost;' class='image-postItem' />

                    <a style='display:$validateDocPost;' href='app/public/documentos/
                    /$post->documentpost' download> descargar </a>

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

            <div class='modal fade modal-delete' id='myModal' role='dialog'>

                <div class='modal-dialog'>

                    <div class='modal-content'>
                        <div class='modal-header'>
                          <button type='button' class='close' data-dismiss='modal'>&times;</button>
                          <h6 class='modal-title'>Eliminar publicación</h6>
                        </div>
                        <div class='modal-body'>
                          <p>¿Realmente deseas eliminar la publicación?</p>
                        </div>
                        <div class='modal-footer'>

                          <button type='button' class='btn btn-default' data-dismiss='modal'>Cancelar</button>

                          <button type='button' class='btn btn-default btn-delete-modal' id='btn-$idpost'>Eliminar</button>

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

            </div>
            ";

    return response()->json(['response' => $postHtml]);

    }


    public function delete($idpost){

        if (Auth::check()){

            $post = Post::find($idpost);

            $post->comments()->delete();

            $post->delete();

            return response()->json(['response' => true]);

        }else{
            return response()->json(['response' => false]);
        }
    }

    


}
