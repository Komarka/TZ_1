@extends('layouts.app')
@section('content')
@isset($error)
<div class="alert alert-danger" role="alert">{{$error}}</div>
@endisset
@if (count($articles) > 0)
@foreach ($articles as $a)
<div class="media">
  <div class="media-left media-middle">
    <a href="#">
      <img class="media-object" src={{ asset($a->img_path) }} width='124px' alt={{$a->title}}>
    </a>
  </div>
  <div class="media-body">
    <h4 class="media-heading"><a href={{ route('article',['id'=>$a->id]) }} style="cursor:pointer;" >{{$a->title}}</a></h4>
    <span style="color:#d1a449;">{{$a->date}}</span>
    {{substr($a->text,0,285).'...'}}
    <p><a href={{ route('tag',['tag'=>$a->tags]) }} style="color:orange;cursor:pointer;">{{$a->tags}}</a></p>
 
  </div>
</div>
@endforeach
      @endif
      {{$articles->links()}}
@endsection

<style type="text/css">
	.media{
		margin-bottom: 70px;
	}
</style>
