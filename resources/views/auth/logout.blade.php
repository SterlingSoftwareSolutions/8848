@extends('layouts.app')
@section('content')
<form action="/logout" method="post">
    @csrf
    <button>Logout</button>
</form>
@endsection