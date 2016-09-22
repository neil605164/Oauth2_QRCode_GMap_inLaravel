@extends('welcome')
@section('content')
<div class="w3-center">
	<img src="{{ $google2fa }}">
</div>
<div class="w3-container">
	<a href="{{ $google2fa }}" class="w3-btn w3-white w3-border w3-round" download>download</a>
		<!--在controller去比對，然後直接去導向A頁面-->
	<a href="{{ url('/image') }}" class="w3-btn w3-white w3-border w3-round">圖片比對</a>
		<!--在controller去比對，然後直接去導向A頁面-->
	<a href="{{ url('/verify') }}" class="w3-btn w3-white w3-border w3-round">驗證碼比對</a>
</div>
@endsection