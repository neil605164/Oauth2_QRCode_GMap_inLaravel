<!DOCTYPE html>
<html>
<title>Laravel</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
<link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
<style>
body, html {
    height: 100%;
    color: #777;
    line-height: 1.8;
}
/* Create a Parallax Effect */
.bgimg-1{
    opacity: 0.7;
    background-attachment: fixed;
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
}
/* First image (Logo. Full height) */
.bgimg-1 {
    min-height: 87%;
}
</style>
<body>

<!-- Navbar (sit on top) -->
<div class="w3-top">
    <ul class="w3-navbar" id="myNavbar">
        @if (Auth::guest())
            <li><a href="{{ url('/login') }}" class="w3-padding-large" >登入</a></li>
            <li><a href="{{ url('/register') }}" class="w3-padding-large" >註冊</a></li>
        @else
            <li><a href="{{ url('/index') }}" class="w3-padding-large">HOME</a></li>
             <li><a href="{{ url('/indexgoogle') }}" class="w3-padding-large">google</a></li>
            <li><li><a href="{{ url('/logout') }}" class="w3-padding-large ">Logout</a></li></li>
        @endif
    </ul>
</div>


<!-- First Parallax Image with Logo Text -->
<div class="bgimg-1 w3-opacity w3-display-container w3-padding-32">
    @if(session('error'))
        <div class="w3-round w3-pale-green">
            <span onclick="this.parentElement.style.display='none'" class="w3-closebtn"><i class="fa fa-close"></i></span>
            <h3><i class="fa fa-check-square-o"></i>{{ session('error') }}</h3>
        </div>
    @endif

    <div class="w3-display-middle" style="white-space:nowrap;">
        <!--可以用yield去呼叫很多個子頁面出來-->
        @yield('content')
    </div>
</div>

<!-- Footer -->
<footer class="w3-center w3-dark-grey w3-padding-48 w3-hover-black">
    <p>Neil Hsieh<a href="http://www.w3schools.com/w3css/default.asp" title="W3.CSS" target="_blank" class="w3-hover-opacity"></a></p>
</footer>

</body>
</html>