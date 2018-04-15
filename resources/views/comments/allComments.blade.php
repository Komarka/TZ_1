@extends('layouts.app')
@section('content')
@isset($error)
<div class="alert alert-danger" role="alert">{{$error}}</div>
@endisset
@if (count($comments) > 0)
@foreach ($comments as $a)
<div class="media">
  <div class="media-left media-middle">
  </div>
  <div class="media-body">
    <h4 class="media-heading"><a href={{ route('article',['id'=>$a->news_id]) }} style="cursor:pointer;" >Статья</a></h4>
    <span style="color:#d1a449;">{{$a->created_at}}</span>
    <p>Комментарий: {{$a->text}}</p>
 
  </div>
</div>
@endforeach
      @endif
      {{$comments->links()}}
@endsection

<style type="text/css">
	.media{
		margin-bottom: 70px;
	}
</style>