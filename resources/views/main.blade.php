@extends('layouts.app')
@section('content')
<div id="myCarousel" class="carousel slide" data-interval="false">
<ol class="carousel-indicators">
    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    <li data-target="#myCarousel" data-slide-to="1"></li>
    <li data-target="#myCarousel" data-slide-to="2"></li>
  </ol>

  <!-- Wrapper for slides -->
      @if (count($latestNews) > 0)
  <div class="carousel-inner">
    <div class="item active">
      <img src={{ asset($latestNews[0]->img_path) }} width="1405px"  alt={{$latestNews[0]->title}}>
      <div class="carousel-caption">
        <a href={{route('article',["id"=>$latestNews[0]->id])}}><h3>{{$latestNews[0]->title}}</h3></a>
        <p style="color:orange;">{{$latestNews[0]->date}}</p>
      </div>
    </div>

    <div class="item">
      <img style='text-align:center;' src={{ asset($latestNews[1]->img_path) }}  width="1655px" alt={{$latestNews[1]->title}}>
      <div class="carousel-caption">
          <a href={{route('article',["id"=>$latestNews[1]->id])}}><h3>{{$latestNews[1]->title}}</h3></a>
        <p style="color:orange;">{{$latestNews[1]->date}}</p>
      </div>
    </div>

    <div class="item">
      <img style='text-align:center;' src={{ asset($latestNews[2]->img_path) }}  width="1305px" alt={{$latestNews[2]->title}}>
      <div class="carousel-caption">
           <a href={{route('article',["id"=>$latestNews[2]->id])}}><h3>{{$latestNews[2]->title}}</h3></a>
        <p style="color:orange;">{{$latestNews[2]->date}}</p>
      </div>
    </div>
  </div>
 @endif
  <!-- Left and right controls -->
  <a class="left carousel-control" href="#myCarousel" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#myCarousel" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right"></span>
    <span class="sr-only">Next</span>
  </a>
  </div>
  <div class="container">
    <div>
      @include('mainTopics')
    </div>
    @include('mainNews')
  </div>
  @endsection