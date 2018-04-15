<div id="topics">
	<div class="container">
<h3 id="actual">Актуальные статьи:</h3>
@if(count($comments)>0)
@foreach($comments as $topic)
<div class="row">
  <div class="col-sm-6 col-md-3">
    <div class="thumbnail">
      <img src={{asset($topic->img_path)}} >
      <div class="caption">
          <h3 style="color: orange;"><a href={{ route('article',['id'=>$topic->id]) }}>{{$topic->title}}</a></h3>
        <p  >{{substr($topic->text,0,495).'...'}}</p>
            </div>
    </div>
  </div>
</div>

@endforeach
@endif
</div>
@include('activeUsers')
<div class="container" id="advertisement">
	@include('advertisement')
</div>
</div>
<hr>
<style type="text/css">
	#actual{
		color: #367a64;
	}
#topics{
	

}
#topics a{
	color: orange;
	position: relative;
}
#topics .panel-footer{
-webkit-box-shadow: inset 10px 4px 55px 5px rgba(82,212,171,1);
-moz-box-shadow: inset 10px 4px 55px 5px rgba(82,212,171,1);
box-shadow: inset 10px 4px 55px 5px rgba(82,212,171,1);
}
#advertisement{
	position: absolute;
		top: 760px;
		left: 400px;

		
}


</style>

