<div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <a class="navbar-brand" href="/">Home</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
    @if (count($categories) > 0)
      <ul class="nav navbar-nav">
@foreach ($categories as $category)
@if( Route::currentRouteName()===$category->path_name)
<li class="active"><a href={{ route($category->path_name) }}>{{$category->name}} <span class="sr-only">(current)</span></a></li>
@else
        <li><a  href={{ route($category->path_name) }}>{{$category->name}}</a></li>
        @endif
        @endforeach
        <li  id='search' class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Поиск <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#" id="tags">по тегам</a></li>
            <li><a href="#" id='date'>по дате</a></li>
            <li><a href="#" id='article_name'>по названии статьи</a></li>
                     </ul>
        </li>
         
      </ul>
      @endif
    <form  action="/search" method="POST"  id='search-form' class="navbar-form navbar-left" hidden>
        <div class="form-group">
          <input type="text" class="form-control"  name='query' placeholder="Search">
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
           <input type="hidden" name="typeOfData"  id='typeOfData' value="">
        </div>
        <button type="submit"   class="btn btn-default">Submit</button>
      </form>
      <ul class="nav navbar-nav navbar-right">
                @if(Auth::check())
              <div class="dropdown">
  <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
    {{Auth::user()->name}}
    <span class="caret"></span>
  </button>
  <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
    @if(Auth::user()->isModerator() || Auth::user()->isAdmin())
   <li role="presentation"><a href={{ route ('nonChecked')}}>Сообщения <span class="badge">{{$amount}}</span></a></li>
   @endif
   @if(Auth::user()->isAdmin())
   <li role="presentation"><a href={{ route ('admin.index')}}>Панель админа</a></li>
   @endif
   <li><a href={{ route('logout') }}><span class="glyphicon glyphicon-log-out"><span id="text">Выйти</span></span></a></li>
   
  </ul>
</div>
          @else
<li><a href={{ route('register') }}>Регистрация</a></li>
        <li><a href={{ route('login') }}><span class="glyphicon glyphicon-log-in"><span id="text">Войти</span></span></a></li>
@endif

      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
<style type="text/css">
  #text{
    margin-left: 5px;
    cursor: pointer;
  }
  .dropdown{
    margin-top: 7px;
  }
  #search{
    margin-top: 0px;
  }
  
</style>
<script type="text/javascript">
  $('.dropdown-menu').on('click',(e)=>{
    let form=$('#search-form');
    let search_input=$('.form-control');
    let type=$('#typeOfData');
if(e.target.id==='tags'){
  search_input.prop('type', 'text');
search_input.attr('placeholder','Введите тег');
type.val('tag');
}
else if (e.target.id==='article_name'){
  search_input.prop('type', 'text');
  search_input.attr('placeholder','Введите название статьи');
type.val('article_name');
}else{
    search_input.prop('type', 'date');
type.val('date');

}
    $('#search-form').slideDown();
  })
</script>

 
 
 