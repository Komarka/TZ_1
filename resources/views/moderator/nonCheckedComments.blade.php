@extends('layouts.app')
@section('content')
@isset($nonChecked)
<div class="container">
  <h2>Таблица политических комментариев</h2>            
  <table class="table">
    <thead>
      <tr>
        <th>ID статьи</th>
        <th>Комментарий</th>
        <th>Комментатор</th>
        <th>Опубликовать</th>
      </tr>
    </thead>
    <tbody>
    	@foreach($nonChecked as $comment)
      <tr>
        <td><a href={{ route('article',['id'=>$comment->news_id])}}>{{$comment->news_id}}</a></td>
        <td>{{$comment->text}}</td>
        <td><a href={{ route('commentator',['commentator_id'=>$comment->user_id])}}>{{$comment->user->name}}</a></td>
<td><form  method="POST" action={{ route('publish',['publish_id'=>$comment->id])}}> {{ csrf_field() }} <button type="submit" class="btn btn-success">Да</button></form><form  method="POST" action={{ route('notpublish',['notpublish_id'=>$comment->id])}}> {{ csrf_field() }} <button type="submit" class="btn btn-danger">Нет</button></form></td>
      </tr>
      @endforeach
      
    </tbody>
  </table>
</div>

@endisset
@endsection