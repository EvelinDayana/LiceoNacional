<!DOCTYPE html>
<html>
<head>

	<script type="text/javascript" src="{{asset('js/follow.js')}}"></script>

</head>
<body>

	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 div-box">

		<input type="hidden" value="{{$user->iduser}}" id="iduser">
		<div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">
			
		</div>

		<div class="col-lg-10 col-md-10 col-sm-10 col-xs-10  sub-div-box-follow" style="height: 110px;">

			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 div-title-follow mdl-shadow--2dp">

				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="height: 50%;">

					<div class="mdl-textfield mdl-js-textfield mdl-textfield--expandable mdl-textfield--floating-label mdl-textfield--align-right" id="div-search">

                    	<label class="mdl-button mdl-js-button mdl-button--icon"
                       for="fixed-header-drawer-exp" id="label-input-search">
                       		<img src="{{asset('/image/icons/search.png')}}">
                    	</label>

                    	<div class="mdl-textfield__expandable-holder">
                        	<input class="mdl-textfield__input" type="text" name="search" id="fixed-header-drawer-exp" id="	sample6">
                        	<label class="mdl-textfield__label" for="sample6" id="label-search"> </label>
                    	</div>

                	</div>

            	</div> 

            	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 options-tabs">

                	<a href="" class="col-lg-6 col-md-6 col-sm-6 col-xs-6 active link-follower">Seguidores</a>

                	<a href="" class="col-lg-6 col-md-6 col-sm-6 col-xs-6 link-followed">Seguidos</a>	

            	</div>

			</div>
		

			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin:0; padding: 0;">

				

				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 page-content" id="content-links-follows" style="margin:0px; padding: 0px; background: white; height: 100%;">
		            	
		       	</div>

		        
				
			</div>
			
		</div>

		<div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">
			
		</div>

	</div>

</body>

	

</html>

