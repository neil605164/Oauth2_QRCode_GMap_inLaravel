@extends('welcome')
@section('content')

<form method="post" action="{{ url('verifyProcess') }}">
{{ csrf_field() }}
  Your verify code<br>
  <input type="text" name="code" required>
  <br>
  <p>
  <input type="submit" class="w3-btn w3-white w3-border w3-round" value="submit">
  </p>
</form>
@endsection