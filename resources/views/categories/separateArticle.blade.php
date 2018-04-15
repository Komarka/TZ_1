@extends('layouts.app')
@section('content')
<div id='article'>
  <input type="hidden" id="user_pic" value={{asset('img/user.png')}}>
  <meta name="csrf-token" content="{{ csrf_token() }}">
<div class="container">
	<div class="row">
  <div class="col-sm-7 col-md-9">
    <div class="thumbnail">
      <img src={{ asset($article->img_path) }} alt={{$article->title}}>
      <div class="caption">
        <h3>{{$article->title}}</h3>
        <p style="color:#d1a449;">{{$article->date}}</p>
        @if(($analytical===true)&& (!Auth::check()))
        <p>{{substr($article->text,0,285).'...'}}</p>
        <h3>Чтобы читать полностью <a href={{ route ('register') }}>зарегистрируйтесь</a></h3>
        @else
        <p>{{$article->text}}</p>
@endif
        <p><a href="#" style="color:orange;cursor:pointer;">{{$article->tags}}</a> 
        <p></p>
        <span class="glyphicon glyphicon-eye-open " aria-hidden="true"><span id="number">{{$article->views}}</span></span>
        <span class="glyphicon glyphicon-user " aria-hidden="true"><span id="readers">0</span></span>
      </div>

      @isset($comments)
      <hr>
      <div id="comments">
        @foreach($comments as $comment)
        @if(!$comment->respond && $comment->is_allowed)
        <div class="media" >
         
        <div class="media-left">
          <img src={{asset('img/user.png')}} class="media-object" style="width:45px">
        </div>
        <div class="media-body">
          <h4 class="media-heading"><a href={{route('commentator',['commentator_id'=>$comment->user_id])}}>{{$comment->user->name}} </a><small><i> {{$comment->created_at}} </i></small></h4>

          <p> {{$comment->text}} <p>
      </div>
      <input type="hidden" id="comment_user_id" value={{$comment->user_id}}>
 <input type="hidden" id="comment_id" value={{$comment->id}}><button onclick="like(this)"><span class="glyphicon glyphicon-thumbs-up" id='up' ><span  style='color:green;' id="number">{{$comment->likes}}</span></span></button>
 <input type="hidden" id="comment_id" value={{$comment->id}}><button onclick="dislike(this)"><span class="glyphicon glyphicon-thumbs-down" ><span  style='color:red;' id="number">{{$comment->dislikes}}</span></span></button>
 @if(Auth::id() !== $comment->user_id)
<p><input type="hidden" id="user_name" value={{$comment->user->name}}><a id="respond" onclick="respond(this)">Ответить</a></p>
@endif
@elseif($comment->respond && $comment->is_allowed)
    <div class="media" id="media_res">
         
        <div class="media-left">
          <img src={{asset('img/user.png')}} class="media-object" style="width:45px">
        </div>
        <div class="media-body">
          <h4 class="media-heading"><a href={{route('commentator',['commentator_id'=>$comment->user_id])}}>{{$comment->user->name}} </a><small><i> {{$comment->created_at}} </i></small></h4>

          <p> {{$comment->text}} <p>
      </div>
  <input type="hidden" id="comment_user_id" value={{$comment->user_id}}>
 <input type="hidden" id="comment_id" value={{$comment->id}}><button onclick="like(this)"><span  class="glyphicon glyphicon-thumbs-up" id='up' ><span  style='color:green;' id="number">{{$comment->likes}}</span></span></button>
 <input type="hidden" id="comment_id" value={{$comment->id}}><button onclick="dislike(this)"><span class="glyphicon glyphicon-thumbs-down" ><span  style='color:red;' id="number">{{$comment->dislikes}}</span></span></button>
 @if(Auth::id() !== $comment->user_id)
<p><input type="hidden" id="user_name" value={{$comment->user->name}}><a id="respond" onclick="respond(this)">Ответить</a></p>
@endif

  </div>
    </div>
    @endif
    @endforeach
  
  @endisset

    </div>

  </div>
@include('comments')
  </div>
 
</div>


</div>


<style type="text/css">
.glyphicon-thumbs-up{
  margin-bottom: 10px;
  cursor: pointer;
}
.glyphicon-thumbs-down{
  margin-left: 5px;
  cursor: pointer;
}
	#article{
		margin-left: 100px;
		
	}
  a{
    cursor: pointer;
  }
  

  #media_res {
  margin-left: 30px;
}

	#number{
		margin-left: 5px;
		color:grey;
	}
	#readers{
		margin-left: 5px;
		color:grey;
	}
  #showComment{
    margin-bottom: 10px;
  }
  #comments{
    margin-top: 15px;
  }
  .media button{
     background-color: Transparent;
    background-repeat:no-repeat;
    border: none;
    cursor:pointer;
    overflow: hidden;
    outline:none;
  }
      </style>
  
  
<script type="text/javascript">
  
   $(window).on('load', function () {
 setInterval(function() {
 	var views=+$('#number').text();
  var number = Math.round(0 - 0.5 + Math.random() * (5 - 0 + 1))
 views += number;
  $('#readers').text(number);
  $('#number').text(views);
},
3000);

      
 });


  $('#showComment').on('click',()=>{
    $('#comment_form').find('textarea').val('');
    $('#comment_form').slideDown();

  })

  $('#comment_form').submit((e)=>{
    e.preventDefault();
    $('#comment_form').slideUp();
    let comment=$('#comment').val();
    let user_id=$('#user_id').val();
    let news_id=$('#news_id').val();
    let user_pic=$('#user_pic').val();
    let comments_div=$('#comments');
    let form_action = e.target.getAttribute('action');
        let userToRespond='';
    $.ajax({
      type:'POST',
  url: form_action,
  data:{comment,user_id,news_id},
  success: function(res){
    if(res.moder){
      $(`<div class="alert alert-success" role="alert">${res.message}</div>`).appendTo(comments_div);
    }else{
    
    let dott=res.time.date.indexOf('.');

let comment_user_id=$('#comment_user_id').val();
if(user_id==comment_user_id){
$(`<div class="media"><div class="media-left"><img src=${user_pic} class="media-object" style="width:45px"></div>
  <div class="media-body"> <h4 class="media-heading"><a href='/commentator/${comment_user_id}'> ${res.user} </a><small><i> ${res.time.date.slice(0,dott)}</i></small></h4>
   <p>${res.comment}</p>
   </div><input type="hidden" id="comment_user_id" value=${comment_user_id}><input type="hidden" id="comment_id" value=${res.comment_id}><button onclick="like(this)"><span class="glyphicon glyphicon-thumbs-up" id='up' ><span style='color:green;'  id="number">0</span></span></button>
<input type="hidden" id="comment_id" value=${res.comment_id}><button onclick="dislike(this)"><span  class="glyphicon glyphicon-thumbs-down" ><span style='color:red;' id="number">0</span></span></button>
<p><input type="hidden" id="user_name" value=${res.user}><a id='respond' onclick="respond(this)" >Ответить</a></p></div>`).appendTo(comments_div);
    }else{
     $(`<div class="media"><div class="media-left"><img src=${user_pic} class="media-object" style="width:45px"></div>
  <div class="media-body"> <h4 class="media-heading"><a href='/commentator/${comment_user_id}'> ${res.user} </a><small><i> ${res.time.date.slice(0,dott)}</i></small></h4>
   <p>${res.comment}</p>
   </div><input type="hidden" id="comment_user_id" value=${comment_user_id}><input type="hidden" id="comment_id" value=${res.comment_id}><button onclick="like(this)"><span class="glyphicon glyphicon-thumbs-up" id='up' ><span style='color:green;'  id="number">0</span></span></button>
<input type="hidden" id="comment_id" value=${res.comment_id}><button onclick="dislike(this)"><span  class="glyphicon glyphicon-thumbs-down" ><span style='color:red;' id="number">0</span></span></button>
</div>`).appendTo(comments_div); 
    }
  }
  },
   headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }

});
  })


  function like(e){
   
  
     let comment_id=e.previousSibling.value;
     e.setAttribute("disabled", true);
  $.ajax({
      type:'POST',
  url: '/comments',
  data:{like:true,comment_id},
  success: function(res){
e.children[0].textContent=res;
clicked_like=true;
  },
   headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

  }


  function dislike(e){
       
  let comment_id=e.previousSibling.value;
     e.setAttribute("disabled", true);
  $.ajax({
      type:'POST',
  url: '/comments',
  data:{dislike:true,comment_id},
  success: function(res){
e.children[0].textContent=res;
clicked_dislike=true;
  },
   headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

  }

 function respond(e){
  $('#showComment').attr('disabled',true);
  let user_name= e.previousSibling.value;
    $('#respond_form').find('textarea').val(user_name+',');
    $('#respond_form').slideDown();
    userToRespond=e.parentNode;

 }

   $('#respond_form').submit((e)=>{

    e.preventDefault();
     $('#showComment').attr('disabled',false);
    $('#respond_form').slideUp();
    let comment=$('#respond_form').find('#comment').val();
    let user_id=$('#respond_form').find('#user_id').val();
    let news_id=$('#respond_form').find('#news_id').val();
    let user_pic=$('#user_pic').val();
    let comment_user_id=$('#comment_user_id').val();
    let respond=true;
    let form_action = e.target.getAttribute('action');


    $.ajax({
      type:'POST',
  url: form_action,
  data:{comment,user_id,news_id,respond},
  success: function(res){
    if(res.moder){
      $(`<div class="alert alert-success" role="alert">${res.message}</div>`).insertAfter(userToRespond);
    }else{
    let dott=res.time.date.indexOf('.');
    if(comment_user_id==user_id){
$(`<div style='margin-left:30px;' class="media" id='media_res'><div class="media-left"><img src=${user_pic} class="media-object" style="width:45px"></div>
  <div class="media-body"> <h4 class="media-heading"><a href='/commentator/${comment_user_id}'> ${res.user} </a><small><i> ${res.time.date.slice(0,dott)}</i></small></h4>
   <p>${res.comment}</p>
   </div><input type="hidden" id="comment_user_id" value=${comment_user_id}><input type="hidden" id="comment_id" value=${res.comment_id}><button onclick="like(this)"><span class="glyphicon glyphicon-thumbs-up" id='up' ><span style='color:green;'  id="number">0</span></span></button>
<input type="hidden" id="comment_id" value=${res.comment_id}><button onclick="dislike(this)"><span  class="glyphicon glyphicon-thumbs-down" ><span style='color:red;' id="number">0</span></span></button>
<p><input type="hidden" id="user_name" value=${res.user}><a id='respond' onclick="respond(this)" >Ответить</a></p></div>`).insertAfter(userToRespond);
    }else{
      $(`<div style='margin-left:30px;' class="media" id='media_res'><div class="media-left"><img src=${user_pic} class="media-object" style="width:45px"></div>
  <div class="media-body"> <h4 class="media-heading"><a href='/commentator/${comment_user_id}'> ${res.user} </a><small><i> ${res.time.date.slice(0,dott)}</i></small></h4>
   <p>${res.comment}</p>
   </div><input type="hidden" id="comment_user_id" value=${comment_user_id}><input type="hidden" id="comment_id" value=${res.comment_id}><button onclick="like(this)"><span class="glyphicon glyphicon-thumbs-up" id='up' ><span style='color:green;'  id="number">0</span></span></button>
<input type="hidden" id="comment_id" value=${res.comment_id}><button onclick="dislike(this)"><span  class="glyphicon glyphicon-thumbs-down" ><span style='color:red;' id="number">0</span></span></button>
</div>`).insertAfter(userToRespond);
    }
  }
  },
   headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
  })
   
 
</script>
@endsection