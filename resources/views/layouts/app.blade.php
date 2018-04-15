
<html >
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>TZ</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>


    </head>
    <body>
    
<nav class="navbar navbar-inverse">
  <div class="container">
    @include('navigation')
  </div>
</nav>
<div class="container">
@yield('content')
</div>

<style type="text/css">
    #myCarousel{
        width: 1270px;
        margin-top: -19px;
        margin-left: -74px;
        margin-bottom: 20px;
  

    }
</style>
<div>

</div>
<script type="text/javascript">
  $(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();   
});
    let subscribed=false;
        $( document ).ready(function() {
            let stop=localStorage.getItem("subscribed");
   let timer= setTimeout(()=> {
     subscribed=true;
     localStorage.setItem("subscribed", subscribed);

 let answer=confirm('Вы б не хотели подписаться на нашу новостную ленту') ? prompt('Напишите пожалуйста ваш email') : '';

}, 15000)

if(stop){
     clearTimeout(timer);
     }

})

</script>
    </body>
</html>