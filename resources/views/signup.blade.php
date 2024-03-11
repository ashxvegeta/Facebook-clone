<html>
<head>
	<title>FB Homepage</title>
	<link rel="stylesheet" type="text/css" href="style.css">
    <style>
        *{box-sizing: border-box; border:none; outline: none;}
.mg{margin:0px auto; float: none;}
.b{border:1px solid red;}
body{
	background: -webkit-linear-gradient(white, #D3D8E8);
	background: -o-linear-gradient(white, #D3D8E8);
	background: linear-gradient(white, #D3D8E8);
	font-family: sans-serif;
	color: #fff;
	margin:0px;
}
/*navbar*/
.nav{
	width: 100%;
	height: 82px;
	background:#0f71f1; ;
}
.inner{
	width: 80%;
	height: 100%;
	min-width: 900px;
	max-width: 1200px;
	background: purple;
}
.logo{
	float: left;
	height: 100%;
    font-size: 50px;
}
.inner img{
	width: auto;
	height: 80%;
	position: relative;
	top: 10px;	
}
.table{
	float: right;
	height: 100%;
	padding:10px 10px 0px 10px;
	min-width: 320px;
}
.table tr td{
	font-size: 12px;
}
/* table tr td a:hover{text-decoration: underline;}
a{text-decoration: none; color:#9cb4d8;} */

#lg{
	padding: 3px;
	border:1px solid black;
	width: 95%;
}
[value]{
	background: #4267b2;
	border: 1px solid #29487d;
	color:white;
	padding:10px 30px;
	cursor: pointer;
}
[value]:hover{
	background: #365899;
}
/*main page inner*/
.main{
	color:#000;
	min-width: 900px;
	max-width: 1200px;
	height: 100%;
 	color:#000;
 	width: 80%;
 	position: relative;
	padding:20px;
}
.left{
	width: 48%;
	float: left;
	padding: 10px;
}
#cimg{
	width: 100%;
}
.right{
	width: 48%;
	float: right;
	padding: 10px;
}
[placeholder]{
	width: 100%;
	font-size: 18px;
	margin-bottom: 10px;
	padding: 10px;
	border-radius: 5px;
	background: #fff;
	border:1px solid #0000003d;
}
.strong{
	color:#022;
	padding: 5px 10px 5px 1px;
	border-radius: 0px 10px 10px 0px;
	clear: both;
	margin:0px auto;
	transition: 1s;
}
/* .strong:hover{background: #00005526;}
aj{color:#265aab;}
[placeholder*="st"]{
	width: 100%;
} */
[placeholder="last name"]{
	float: right;
}
.birth *{color:#000;}
.wdth{width: 225px;}
.info_birth{font-size: 14px;}
.pd_birth{padding: 8px 10px;}

.info_birth .wid2 {
	float: left;
	margin-left: 5px;
	width: 100%;
	position: relative;
	top:-15px;
}
#w_a{ width: 75%; cursor: pointer; color:#365899;}
.a_box{position: absolute; }
.a_cont{
	background: #fff;
	background-image: url(https://i.imgur.com/PNiw6aK.png);
	position: relative;
	left: -300px;
	top:-60px;
	width: 300px;	
	height: 140px;
	padding: 1px 15px;
	border-radius: 5px;
	font-size: 12px;
	display: none;
}
hr{background: #00000026; height: 1px;}
.b_ok{
	background: #4267b2;
	border: 1px solid #29487d;
	color:white;
	cursor: pointer;
	padding: 5px 10px;
	border-radius: 2px;
	margin: 2px;
	float: right;
}
/* .b_ok:hover{background: #365899;}
.a_box:hover .a_cont{display: block;}
.wid2:hover{width: 60%;} */
#male{margin-left: 20px;}
.fs_14{font-size: 12px;}
.fs_14 a{color:green;}
[value="Sign Up"]{
	background: linear-gradient(#ae559f, #884343);
    background-color: #69a74e;
    box-shadow: inset 0 1px 1px #a4e388;
    border-color: #3b6e22 #3b6e22 #2c5115;
    padding: 10px 20px;
    width: 150px;
    font-size: 16px;
    border-radius: 10px;
}
#cp{color:green;}
    </style>
</head>
<body>
	<!-- navbar -->
	<div class="nav">
		<div class="inner mg" style="background:#0f71f1;">
			<!-- logo area -->
			<div class="logo">
				Chatbook
			</div>
			<!-- login area -->
			<table class="table">
			
				<tr>
					<td></td>
					<td></td>
					<td><a href="{{url('login')}}" style="background-color:#06b909;padding:10px 30px;width:50%;color:white;text-decoration:none;">Login</a></td>
				</tr>
				<tr>
					<td></td>
					<td><a href="reset.html">Forgotten account?</a></td>
					<td></td>
				</tr>
			</table>
		</div>
	</div> <!-- end navigation -->
	<!-- main page area -->

    @if(session('success'))
<div class="alert alert-success" role="alert">
{{ session('success') }}
</div>
@endif

	<div class="main mg">
		<div class="left">
			<h3 style="color:#0f71f1;">Chatbook helps you connect and share with the people in your life.</h3>
			<img id="cimg" src="https://media.kasperskydaily.com/wp-content/uploads/sites/36/2013/01/05100810/FB_Graph_Search.jpg">
		</div>
		<!-- signup form -->
		<div class="right">
			<h1>Sign Up</h1>
            <form action="{{route('signup')}}" method="post">
                @csrf
                <input  name="first_name" value="" type="text" id="text" placeholder="First name"> <br><br>
                @if ($errors->has('first_name'))
                <small class="text-danger">{{ $errors->first('first_name') }}</small><br>
                @endif
                
                <input  name="last_name"  value=""   type="text" id="text" placeholder="Last name"> <br><br>
                @if ($errors->has('last_name'))
                <small class="text-danger" style="font-size:14px;">{{ $errors->first('last_name') }}</small><br>
                @endif
                <span style="font-weight: normal;margin-right:240px;">Gender:</span> <br>
                <select id="text" name="gender" style="width: 100%;height: 40px;
                background: white;">
                <option value=""></option>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
                </select><br><br>
                @if ($errors->has('gender'))
                <small class="text-danger" style="font-size:14px;">{{ $errors->first('gender') }}</small><br>
                @endif
                <input type="text" id="text" placeholder="Email" name="email" value=""> <br><br>
                @if ($errors->has('email'))
                <small class="text-danger" style="font-size:14px;">{{ $errors->first('email') }}</small><br>
                @endif
                <input type="password" id="text" placeholder="Password" name="password"> <br><br>
                @if ($errors->has('password'))
                <small class="text-danger" style="font-size:14px;">{{ $errors->first('password') }}</small><br>
                @endif
                <input name="password2" type="password" id="text" placeholder="Retype Password"> <br><br>
                @if ($errors->has('password2'))
                <small class="text-danger" style="font-size:14px;">{{ $errors->first('password2') }}</small><br>
                @endif
                <p>By clicking Sign Up, you agree to our Terms, Data Policy and Cookies Policy. You may receive SMS Notifications from us and can opt out any time

                </p>
                <input type="submit" id="button" value="Sign up" style="background:#0f71f1; ">
                </form>
                
                
                
		</div>
	</div>
</body>
</html>