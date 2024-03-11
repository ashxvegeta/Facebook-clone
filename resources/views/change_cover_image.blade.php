
<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Chage Profile Image</title>

<style>
body {
padding: 0;
margin: 0;
}

#blue_bar {
background-color: #8e44ad;
height: 50px;
color: white;

}

#searchbox {
width: 400px;
height: 20px;
border-radius: 5px;
border: none;
padding: 4px;
font-size: 14px;
background-image: url(search.png);
background-repeat: no-repeat;
background-position: right;
}








#post_button{
    float: right;
    background-color: #ff00b3;
    border: none;
    color: #fff;
    padding: 4px;
    font-size: 14px;
    border-radius: 2px;
    width: 100px;
}

#post_bar{
    background-color: white;
    margin-top: 20px;
    padding-top: 10px;
}
#post{
    padding: 4px;
    font-size:13px;
    display: flex;
    margin-bottom: 20px;
}
</style>

</head>

<body style="font-family: tahoma;background-color:#d0d8e4">
<!-- top bar -->

@extends('header')
@section('content')


<!-- cover area -->
<div style="width:800px;margin:auto;min-height:400px;">




<!-- Below cover area -->
<div style="display:flex;">
<!-- friends area -->

<!-- post area -->
<div
 style="min-height:400px;flex:2.5;padding:20px;padding-right:0px;">
<form action="{{route('upload_cover')}}"   method="post" enctype="multipart/form-data">
@csrf
<div style="border:solid thin #aaa; padding:10px;background-color:white;padding:35px;border-radius:5px;" >
<input type="file" name="file" >
@if($errors->has('type'))
    <small style="color:red;">
        {{ $errors->first('type') }}
    </small>
@endif

@if($errors->has('empty'))
    <small style="color:red;">
        {{ $errors->first('empty') }}
    </small>
@endif

@if($errors->has('size'))
    <small style="color:red;">
        {{ $errors->first('size') }}
    </small>
@endif
<input type="submit" id="post_button" value="Change">
<br>
<img src="photo/{{$coverimage}}" alt="" srcset="" style="width: 30%;height: 150px;margin-left:30%;border-radius:15px;border:3px solid grey">
</div>
</form>

<!-- posts -->





<!--  -->
</div>
</div>


</div>
@endsection

</body>

</html>