
<div id="blue_bar">
 <div style="width:800px;margin:auto;font-size:30px;">
    <a href="{{ route('timeline') }}" style="color:white;text-decoration:none;">ChatBook</a>   
    &nbsp;&nbsp;&nbsp;&nbsp;<input type="text" id="searchbox" placeholder="Search for Profile">
    <a href="{{ route('profile') }}">
    <img src="photo/{{ session('user')['profile_image'] }}" alt="" width="40px;"  height="45px;" style="float:right;border-radius:50px;">
</a>
    <a href="{{ route('logout') }}">
        <span style="font-size: 12px; float: right; margin: 10px; color: red;">Logout</span>
    </a>
    
    </div>
    
    </div>


 @yield('content')