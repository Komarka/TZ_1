<h1><a href={{route('policy')}}>Политика</a></h1>
<div class="media">
  <div class="media-left media-middle">
    <a href="#">
      <img class="media-object" src={{ asset($political_news[0]->img_path) }} width='84px' alt={{$political_news[0]->title}}>
    </a>
  </div>
  <div class="media-body">
    <h4 class="media-heading"><a href={{route('article',['id'=>$political_news[0]->id])}}>{{$political_news[0]->title}}</a></h4>
    <span style="color:orange;">{{$political_news[0]->date}}</span>
    {{substr($political_news[0]->text,0,285).'...'}}
  </div>
</div>
<div class="media">
  <div class="media-left media-middle">
    <a href="#">
      <img class="media-object" src={{ asset($political_news[1]->img_path) }} width='84px' alt={{$political_news[1]->title}}>
    </a>
  </div>
  <div class="media-body">
    <h4 class="media-heading"><a href={{route('article',['id'=>$political_news[1]->id])}}>{{$political_news[1]->title}}</a></h4>
    <span style="color:orange;">{{$political_news[1]->date}}</span>
    {{substr($political_news[1]->text,0,285).'...'}}
  </div>
</div>
<div class="media">
  <div class="media-left media-middle">
    <a href="#">
      <img class="media-object" src={{ asset($political_news[2]->img_path) }} width='84px' alt={{$political_news[2]->title}}>
    </a>
  </div>
  <div class="media-body">
    <h4 class="media-heading"><a href={{route('article',['id'=>$political_news[2]->id])}}>{{$political_news[2]->title}}</a></h4>
    <span style="color:orange;">{{$political_news[2]->date}}</span>
    {{substr($political_news[2]->text,0,285).'...'}}
  </div>
</div>
<h1><a href={{route('economic')}}>Экономика</a></h1>
<div class="media">
  <div class="media-left media-middle">
    <a href="#">
      <img class="media-object" src={{ asset($economic_news[0]->img_path) }} width='84px' alt={{$economic_news[0]->title}}>
    </a>
  </div>
  <div class="media-body">
    <h4 class="media-heading"><a href={{route('article',['id'=>$economic_news[0]->id])}}>{{$economic_news[0]->title}}</a></h4>
    <span style="color:orange;">{{$economic_news[0]->date}}</span>
    {{substr($economic_news[0]->text,0,285).'...'}}
  </div>
</div>
<div class="media">
  <div class="media-left media-middle">
    <a href="#">
      <img class="media-object" src={{ asset($economic_news[1]->img_path) }} width='84px' alt={{$economic_news[1]->title}}>
    </a>
  </div>
  <div class="media-body">
    <h4 class="media-heading"><a href={{route('article',['id'=>$economic_news[1]->id])}}>{{$economic_news[1]->title}}</a></h4>
     <span style="color:orange;">{{$economic_news[1]->date}}</span>
    {{substr($economic_news[1]->text,0,285).'...'}}
  </div>
</div>
<div class="media">
  <div class="media-left media-middle">
    <a href="#">
      <img class="media-object" src={{ asset($economic_news[2]->img_path) }} width='84px' alt={{$economic_news[2]->title}}>
    </a>
  </div>
  <div class="media-body">
    <h4 class="media-heading"><a href={{route('article',['id'=>$economic_news[2]->id])}}>{{$economic_news[2]->title}}</a></h4>
     <span style="color:orange;">{{$economic_news[2]->date}}</span>
    {{substr($economic_news[2]->text,0,285).'...'}}
  </div>
</div>
<h1><a href={{route('culture')}}>Культура</a></h1>
<div class="media">
  <div class="media-left media-middle">
    <a href="#">
      <img class="media-object" src={{ asset($culture_news[0]->img_path) }} width='84px' alt={{$culture_news[0]->title}}>
    </a>
  </div>
  <div class="media-body">
    <h4 class="media-heading"><a href={{route('article',['id'=>$culture_news[0]->id])}}>{{$culture_news[0]->title}}</a></h4>
    <span style="color:orange;">{{$culture_news[0]->date}}</span>
    {{substr($culture_news[0]->text,0,285).'...'}}
  </div>
</div>
<div class="media">
  <div class="media-left media-middle">
    <a href="#">
      <img class="media-object" src={{ asset($culture_news[1]->img_path) }} width='84px' alt={{$culture_news[1]->title}}>
    </a>
  </div>
  <div class="media-body">
    <h4 class="media-heading"><a href={{route('article',['id'=>$culture_news[1]->id])}}>{{$culture_news[1]->title}}</a></h4>
    <span style="color:orange;">{{$culture_news[1]->date}}</span>
    {{substr($culture_news[1]->text,0,285).'...'}}
  </div>
</div>
<div class="media">
  <div class="media-left media-middle">
    <a href="#">
      <img class="media-object" src={{ asset($culture_news[2]->img_path) }} width='84px' alt={{$culture_news[2]->title}}>
    </a>
  </div>
  <div class="media-body">
    <h4 class="media-heading"><a href={{route('article',['id'=>$culture_news[2]->id])}}>{{$culture_news[2]->title}}</a></h4>
    <span style="color:orange;">{{$culture_news[2]->date}}</span>
    {{substr($culture_news[2]->text,0,285).'...'}}
  </div>
</div>
<h1><a href={{route('sport')}}>Спорт</a></h1>
<div class="media">
  <div class="media-left media-middle">
    <a href="#">
      <img class="media-object" src={{ asset($sport_news[0]->img_path) }} width='84px' alt={{$sport_news[0]->title}}>
    </a>
  </div>
  <div class="media-body">
    <h4 class="media-heading"><a href={{route('article',['id'=>$sport_news[0]->id])}}>{{$sport_news[0]->title}}</a></h4>
    <span style="color:orange;">{{$sport_news[0]->date}}</span>
    {{substr($sport_news[0]->text,0,285).'...'}}
  </div>
</div>
<div class="media">
  <div class="media-left media-middle">
    <a href="#">
      <img class="media-object" src={{ asset($sport_news[1]->img_path) }} width='84px' alt={{$sport_news[1]->title}}>
    </a>
  </div>
  <div class="media-body">
    <h4 class="media-heading"><a href={{route('article',['id'=>$sport_news[1]->id])}}>{{$sport_news[1]->title}}</a></h4>
    <span style="color:orange;">{{$sport_news[1]->date}}</span>
    {{substr($sport_news[1]->text,0,285).'...'}}
  </div>
  <div class="media">
  <div class="media-left media-middle">
    <a href="#">
      <img class="media-object" src={{ asset($sport_news[2]->img_path) }} width='84px' alt={{$sport_news[2]->title}}>
    </a>
  </div>
  <div class="media-body">
    <h4 class="media-heading"><a href={{route('article',['id'=>$sport_news[2]->id])}}>{{$sport_news[2]->title}}</a></h4>
    <span style="color:orange;">{{$sport_news[2]->date}}</span>
    {{substr($sport_news[2]->text,0,285).'...'}}
  </div>
</div>
</div>