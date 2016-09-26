@extends('welcome')
@section('content')
	<form method="post" action="{{ url('imageProcess') }}" enctype="multipart/form-data">
		{{ csrf_field() }}
		 Your image<br>
		 <input type="file" name="image">
		 <br>
		 
		 <p>
		 	<input type="submit" class="w3-btn w3-white w3-border w3-round" value="submit"> 
		 </p>
	</form>
@endsection