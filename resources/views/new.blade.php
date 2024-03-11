<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Profile</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />


<style>
body {
padding: 0;
margin: 0;
}

.custom-file-upload {
  display: inline-block;
  background-color: rgba(40, 0, 255, 1);
  color: #fff;
  padding: 10px 20px;
  border-radius: 5px;
  cursor: pointer;
  text-align: center;
}

.custom-file-upload i {
  margin-right: 10px;
}

.custom-file-upload span {
  font-weight: bold;
}

.custom-file-upload input[type="file"] {
  display: none;
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

#profile_pic {
width: 150px;
margin-top: -200px;
border-radius: 50%;
border: 2px solid white;
}

#menu_buttons {
width: 100px;

display: inline-block;
margin: 2px;
}

#friends_img {
width: 75px;
float: left;
margin: 8px;
}

#friends_bar {
background-color: white;
min-height: 400px;
margin-top: 20px;
color: #aaa;
padding: 8px;
border-radius:10px; 

}

#friends {
clear: both;
font-size: 12px;
font-weight: bold;
color: #ff00b3;
}

textarea{
    width:100%;
    border:none;
    font-family: tahoma;
    font-size: 14px;
    height: 60px;
}

#post_button{
    float: right;
    background-color: rgba(40, 0, 255, 1);;
    border: none;
    color: #fff;
    padding: 8px;
    font-size: 14px;
    border-radius: 5px;
    width: 70px;
}

#post_bar{
    background-color: white;
    margin-top: 20px;
    padding-top: 10px;
    border-radius:10px; 
    padding: 10px;
}
#post{
    padding: 4px;
    font-size:13px;
    display: flex;
    margin-bottom: 20px;
}

a, div, p {
		font-family: Segoe UI;
}
a {
	color: inherit;
	text-decoration: none;
}
a:hover{
	text-decoration: underline;	
}
hr {
	border-color: rgba(128, 128, 128, 0.1);
}
.container {
}
.post__composer {
	border: 1px solid rgba(128, 128, 128, 0.5);
	border-radius: 5px;
	width: fill-parent;	
	height: auto;
	back:ground-color: #FFFFFF;
	position: relative;
	padding: 10px;
	margin: 5px;
	margin-bottom: 0;
	display: grid;
	grid-template-rows: 15% auto 15%;
	margin-bottom: 25px;
}
.media__options {
	display: flex;
}

.media__options>div {
	margin-right: 20px;
	padding: 5px;
	border-radius: 3px;
	transition: all 0.15s ease-in;
}
.media__options>div:hover {
	background-color: lightgray;
	cursor: pointer;
}
.post__textarea>textarea{
	font-family: 'Segoe UI';
	width: 100%;
	border: none;
	font-size: 25px;
	resize: none;
}
.post__textarea>textarea:focus {
	outline: none;
}
.post__options {
	display: flex;
	justify-content: flex-end;
}
.post__options>div {
	padding: 5px 10px;
	border-radius: 3px;
	font-weight: 600;
/* 	margin: 5px; */
}
.privacy__options {
	background-color: lightgray;
	border: 1px solid gray;
}
.post__button {
	color: white;
	margin: 0 10px 0 10px;
	background-color: #365899;
	transition: all 0.15s ease-in;
}
.post__button:hover {
	cursor: pointer;
	background-color: #29487d;
}
.post__header {
	display: flex;
}
.post__card {
	border: 1px solid rgba(128, 128, 128, 0.5);
	border-radius: 5px 5px 0 0;
	width: fill-parent;	
	height: auto;
	back:ground-color: #FFFFFF;
	position: relative;
	padding: 10px;
	margin: 5px;
	margin-bottom: 0;
}
.caret {
	float: right;
	margin: 5px 10px 0 0;
	height: 10px;
	width: 10px;
	border: 0 solid rgba(128, 128, 128, 0.5);
	border-left-width: 3px;
	border-bottom-width: 3px;
	transform: rotate(-45deg);
	transition: border-color 0.1s ease-in;
}
.caret:hover {
	border-color: rgba(128, 128, 128, 1);
}
.post__details {
	display: flex;
	flex-direction: column;
	justify-content: space-around;
}
.post__header .thumbnail {
/* 	display: inline-block; */
}
.post__name, .post__timestamp, .post__audience{
	margin: 10px;
}
.post__name {
	font-size: 15px;
	font-weight: 700;
	color: rgba(40, 0, 255, 1);
}
.post__timestamp, .post__audience {
	font-size: 14px;
}
.post__content {
	font-size: 22px;
}
.post__actions span{
	margin-right: 15px;
	font-weight: 400;
}
.post__reactions {
	color: rgba(40, 0, 255, 0.9);
	border: 1px solid rgba(128, 128, 128, 0.5);
	border-top: 0;
	border-radius: 0 0 5px 5px;
	width: fill-parent;	
	height: auto;
	background-color: rgba(05, 0, 120, 0.1);;
	position: relative;
	padding: 10px;
	margin: 0 5px 10px 5px;
}
</style>

</head>

<body style="font-family: tahoma;background-color:#d0d8e4">
<!-- top bar -->

{{-- @if(session()->has('user'))
{{ session('user')}}
@endif --}}

@extends('header')

@section('content')
    

<div id="profile-upper" class="cover-image">
    <div id="profile-banner-image">
      <img  style="width: -moz-available;"   src="photo/{{$user['cover_image']}}" alt="Banner image">
    </div>
    <div id="profile-d">
        <!-- profile image -->
      <div id="profile-pic">
        <img src="photo/{{$user['profile_image']}}" style="width: 100%;height: 180px;">
      </div>
      <a href="{{route('change_image')}}" style="text-decoration:none;font-size: 11px;color:black;">Change Profile</a> | 
<a href="{{route('change_cover')}}" style="text-decoration:none;color:black;font-size: 11px;">Change Cover </a>
      <div id="u-name">{{$user->first_name}} {{$user->last_name}}</div>
      <div class="tb" id="m-btns">
        <div class="td">
      
        </div>
        <div class="td">
          
        </div>
      </div>
      
    </div>
    <div id="black-grd"></div>
  </div>
  <div id="main-content">
    <div class="tb">
      <div class="td" id="l-col">
        <div class="l-cnt">
          <div class="cnt-label">
            <i class="l-i" id="l-i-i"></i>
            <span>Intro</span>
            <div class="lb-action"><i class="material-icons">edit</i></div>
          </div>
          <div id="i-box">
            <div id="intro-line">Front-end Engineer</div>
            <div id="u-occ">I love making applications with Angular.</div>
            <div id="u-loc"><i class="material-icons">location_on</i><a href="#">Bengaluru</a>, <a href="#">India</a></div>
          </div>
        </div>
        <div class="l-cnt l-mrg">
          <div class="cnt-label">
            <i class="l-i" id="l-i-p"></i>
            <span>Photos</span>
            <div class="lb-action" id="b-i"></div>
          </div>
          <div id="photos">
            <div class="tb">
              <div class="tr">
                <div class="td"></div>
                <div class="td"></div>
                <div class="td"></div>
              </div>
              <div class="tr">
                <div class="td"></div>
                <div class="td"></div>
                <div class="td"></div>
              </div>
              <div class="tr">
                <div class="td"></div>
                <div class="td"></div>
                <div class="td"></div>
              </div>
            </div>
          </div>
        </div>
        <div class="l-cnt l-mrg">
          <div class="cnt-label">
            <i class="l-i" id="l-i-k"></i>
            <span>Did You Know<i id="k-nm">1</i></span>
          </div>
          <div>
            <div class="q-ad-c">
              <a href="#" class="q-ad">
                <img src="https://imagizer.imageshack.com/img923/1849/4TnLy1.png">
                <span>My favorite superhero is...</span>
              </a>
            </div>
            <div class="q-ad-c">
              <a href="#" class="q-ad" id="add_q">
                
                <span>Add Answer</span>
              </a>
            </div>
          </div>
        </div>
        <div id="t-box">
          <!-- <a href="#">Privacy</a> <a href="#">Terms</a> <a href="#">Advertising</a> <a href="#">Ad Choices</a> <a href="#">Cookies</a> <span id="t-more">More<i class="material-icons">arrow_drop_down</i></span>
          <div id="cpy-nt">Facebook &copy; <span id="curr-year"></span></div> -->
        </div>
      </div>
      <div class="td" id="m-col">
        <div class="m-mrg" id="p-tabs" style="height:50px;">
          <div class="tb">
            <div class="td">
              <div class="tb" id="p-tabs-m">
                <div class="td active"><a href="{{ route('timeline') }}" style="text-decoration:none;color: #919191;"><span>TIMELINE</span></a></div>
                <div class="td"><span>FRIENDS</span></div>
                <div class="td"><span>PHOTOS</span></div>
                <div class="td"><span>ABOUT</span></div>
                <div class="td"><span>ARCHIVE</span></div>
              </div>
            </div>
            
          </div>
        </div>
       
       <!-- insert psot -->
        <div class="m-mrg" id="composer" >
          <div id="c-tabs-cvr">
            <div class="tb" id="c-tabs">
              <div class="td active"><span>Make Post</span></div>
              <div class="td"><span>Photo/Video</span></div>
              <div class="td"><span>Live Video</span></div>
              <div class="td"><span>Life Event</span></div>
            </div>
          </div>
          <div id="c-c-main">
            <div class="tb">
              <div class="td" id="p-c-i"><img src="photo/{{$user['profile_image']}}" alt="Profile pic" style="  height: 55px;"></div>
              <div class="td" id="c-inp">

              <!-- inserting -->
              <form action="{{route('posts')}}" method="POST" enctype="multipart/form-data">
 
 @csrf 
              <textarea name="post" placeholder="What's going on your mind" style="width:100%;border-radius: 15px;"></textarea>
              </div>
            </div>
      
            <label for="file-upload" class="custom-file-upload" style="margin-left: 375px;margin-top: 5px;">
  <i class="fas fa-camera"></i>
  <span>Photos</span>
  <input type="file" id="file-upload" name="file" multiple>
</label>


            <input type="submit" id="post_button" value="Post" style="background-color: rgba(40, 0, 255, 1);color:white;padding:10px;border-radius:5px;float:right;75px;width: 75px;font-weight: bold;margin-top: 5px;">
            </form>
          </div>
        </div>


        <!-- end insert psot -->

        <div>
        

        <!-- post -->

        @foreach ($oldPosts as $oldPost)
    <div class="post">
        <div class="tb">
            <a href="#" class="td p-p-pic"><img src="photo/{{$user['profile_image']}}" alt="Profile Picture"></a>
            <div class="td p-r-hdr">
                <div class="p-u-info">
                    <a href="#">{{$user->first_name}} {{$user->last_name}}</a>
                    @if($oldPost->is_profile_image)
                        @php
                            $pronoun = ($user->gender == "Female") ? "her" : "his";
                        @endphp
                        <span>updated {{$pronoun}} profile image</span>
                    @endif
                    @if($oldPost->is_cover_image)
                        @php
                            $pronoun = ($user->gender == "Female") ? "her" : "his";
                        @endphp
                        <span>updated {{$pronoun}} cover image</span>
                    @endif
                </div>
                <div class="p-dt">
                    <i class="fa fa-calendar-o" aria-hidden="true"></i>
                    <span>{{ $oldPost->date }}</span>
                </div>
            </div>
            <div class="td p-opt"></div>
        </div>
        <a href="#" class="p-cnt-v">
            <p style="margin-left: 20px; color: black;">{{ $oldPost->post }}</p>
            @if($oldPost->image)
                <img src="photo/{{$oldPost['image']}}" alt="" style="width:100%; height:450px;">
            @endif
        </a>
        <div>
            <div class="p-acts">
                <div class="p-act like">
                    <span class="action__like"><i class="fa fa-heart" style="color: red;font-size:25px;"></i> Like</span>
                </div>
                <div class="p-act comment">
                    <span class="action__comment"><i class="fa fa-comment" style="color: grey;font-size:25px;"></i> Comment</span>
                </div>
                <div class="p-act share">
                    <span class="action__share"><i class="fa fa-share" style="font-size:25px;"></i> Share</span>
                </div>
            </div>
        </div>
        <hr style="border-color: grey;margin-top: 75px;
border: 3px solid gray;width: 106%;margin-left: -20px;">
    </div>
@endforeach
</div>
<!-- post end -->
        
       
      </div>
      <div class="td" id="r-col">
        <div id="chat-bar">
          <div id="chat-lb"><span>Contacts</span></div>
          <div id="cts">

          @foreach ($friends as $friend)
    
   



          <div class="on-ct active">
          @php
                $image = ($friend['gender'] == 'Female')
                    ? 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTpwSx0wuS1qfTwxMAfUdmK0EUMD4M9-3nm4CMrGZL0aBR-9BEINOuXI_XEjQoVQ6h3-N0&usqp=CAU'
                    : 'https://scienceoxford.com/wp-content/uploads/2018/03/avatar-male.jpg';
            @endphp
              <a href="#"><img src="{{ $image }}"></a> <span style="float:left">{{ $friend->first_name }} {{ $friend->last_name }}</span>
            </div>
            @endforeach
        </div>
      </div>
    </div>
  </div>
  


 
        <!-- post end -->



        
      </div>
    
  </div>
@endforeach
</div>



<!--  -->
</div>
</div>


</div>
@endsection

</body>

</html>