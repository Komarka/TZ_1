@isset($advertisement)
<h1 style="color:green;">Рекламные объявления: </h3></h1>
@foreach($advertisement as $a)
<div class="row" >
  <div class="col-sm-4 col-md-7 adv"  data-toggle="tooltip"  title="Купон на скидку:34533435 примените и получите скидку 10%"  >
    <div class="thumbnail">
      <img src={{asset($a->img)}}  width='330px'>
      <div class="caption">
        <h3>{{$a->name}} <span class="label label-default">New</span></h3>
        <p>{{$a->desciption}}</p>
         <p id="price" >{{$a->price}}$</p>
              </div>
    </div>
  </div>
</div>
@endforeach
@endisset
<script type="text/javascript">
  var price;
  $('.adv').on('mouseenter',function(){
     price=$(this).find('#price').text();
   new_price=parseInt(price);
    new_price=new_price-(new_price * .10);
   $(this).find('#price').text(new_price+'$').css('color','red').css('font-size','10px');
  }).on('mouseleave',function(){
     $(this).find('#price').text(price).css('color','black').css('font-size','14px');
  })

  

 </script>



