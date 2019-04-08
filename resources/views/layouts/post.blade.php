<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 box-posts">
	
	<h5 class="pull-left title">Hola {{Auth::user()->nameUser}}, </h5>

	<form class="form-post" action="/publicar" method="post" enctype="multipart/form-data">

		<input type="hidden" name="iduserreceiver" value="{{$user->iduser}}" id="iduserreceiver" />

		<textarea class="form-control post-txt" rows="5" name="text-post" placeholder="Escribe tu comentario..." id="comment-txtarea" required="true"></textarea>

		<select class="form-control select-post" required="true" name="options-post" id="options-post">
			<option value="">Seleccionar</option>
			<option value="Anuncio">Anuncio importante</option>
			<option value="Otro">Otro</option>
		</select>

		<div class="col-lg-12 col-md-12 col-xs-12 col-sm-12 div-image">
			<span class="close">&times;</span>
			<img src="" class="image-post-file">	
		</div>

		<div class="col-lg-12 col-md-12 col-xs-12 col-sm-12 div-document"> 
			<div class="name-document"></div>
			<span class="close" id="close-document">&times;</span>
		</div>

		<div class="input-group col-lg-12 col-md-12 col-xs-12 col-sm-12" id="label-friends" hidden style="margin-bottom: 20px;">
			<span class="input-group-addon" id="basic-addon1">Etiquetar a:</span>
			<input type="text" class="form-control" placeholder="Escribe el nombre de tu amigo">
		</div>
		

		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 pull-left post-options">

			<span class="glyphicon glyphicon-tags option-share" id="tag-friends"></span>

			<input type="file" name="file-doc-post" accept=".xlsx,.xls, .doc, .docx,.ppt, .pptx,.txt,.pdf"  id="file-document-post"/> 

			<label for="file-document-post" class="option-document">
				<span class="glyphicon glyphicon-book"></span>
			</label>

			<input type="file" name="file-photo-post" accept="image/*"  id="file-image-post" onchange="fileImagePost()" /> 

			<label for="file-image-post" class="option-photo">
				<span class="glyphicon glyphicon-camera"></span>
			</label>

			<button type="submit"  class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--colored" id="btn-post" disabled="disabled"> Publicar </button>
			
		</div>

		

		<input type="hidden" value="{{Session::token()}}" name="_token" id="token_post" />

	</form>

</div>











