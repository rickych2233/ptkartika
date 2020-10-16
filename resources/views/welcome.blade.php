<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>Laravel</title>
      <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
      <link href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css" rel="stylesheet" >
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <link href="{{ URL::asset('css/materialize.css') }}" rel="stylesheet"/>
      <script type="text/javascript" src="{{ URL::asset('js/jquery.js') }}"></script>
      <script type="text/javascript" src="{{ URL::asset('js/materialize.js') }}"></script>
    
  </head>

<style>
  .body {
    margin: 0;
    padding: 0;
    font-family: sans-serif;
  }
  .box{
    position:absolute;
    top:20%;
    left:35%;
    transform:transalate(-50%,-50%);
    width:400px;
    padding:40px;
    background: rgba(0,0,0,0.8);
    box-sizing: border-box;
    box-shadow: 0 15px 25px rgba(0,0,0,0.5);
    border-radius: 10px;
  }
  .box h2{
    margin: 0 0 30px;
    padding: 0;
    color: #fff;
    text-align: center;
  }
  .box .inputbox{
    position:relative;
  }
  .box .inputbox input{
    width: 300px;
    padding:3px 0;
    font-size: 16px;
    color: #fff;
    margin-bottom: 30px;
  }
</style>

  <body>
    {{ Form::open(array('url' => 'savekategoribarang')) }} 
      <div class="box">
        <h2>Login</h2>
          <div class="inputbox">
            {{Form::text('username', '', ['id'=>'username','placeholder'=>'Username','class'=>'validate'])}}
          </div>
          <div class="inputbox">
            <input name="password" id="password" type="password" class="form-control" placeholder='Password'>
          </div>  
          {{Form::submit('Login',['name'=>'btnlogin','id'=>'btnlogin','class'=>'btn waves-effect red accent-2'])}}
      </div>
    {{ Form::close() }}
  </body>
</html>


<script type="text/javascript">
  $(document).ready(function(){
    $('.carousel').carousel(fullWidth).css('height', $(window).height());
  });
</script>