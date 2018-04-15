
@if(count($active_users)>0)
<div id="active_users">
<h1 id="active">Активные пользователи:</h1>
@foreach($active_users as $user)

<div class="media" >
  <div class="media-left media-middle">
  
      <img class="media-object" src={{asset ('img/user.png') }} width="30px" >
   
  </div>
  <div class="media-body">
    <h4 class="media-heading">  <a href={{route('commentator',['commentator_id'=>$user->id])}}>{{$user->name}}</a></h4>
    Количество комментариев: <span class="badge">{{$user->comments->count()}}</span>
  </div>
</div>
@endforeach
@endif
</div>
<style type="text/css">
	#active{
		color: green;
	}
	#active_users{
		position: absolute;
		width: 530px;
		top: 2030px;
		right: 300px;
	border-radius: 53px 53px 53px 53px;
-moz-border-radius: 53px 53px 53px 53px;
-webkit-border-radius: 53px 53px 53px 53px;
border: 12px double #2e4d41;
	}
	#active_users .media{
		margin-left: 45px;
		margin-bottom: 10px;
	}
	</style>