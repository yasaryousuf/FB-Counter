@extends('errors.master')

@section('title')
	We've got some trouble | 401 - Unauthorized
@endsection

@section('body')
    <div class="cover"><h1>Unauthorized! <small>Error 401</small></h1><p class="lead">{{ $exception->getMessage() }}</p></div>
    <footer><p>Technical Contact: <a href="mailto:yousuf@opcodespace.com">admin@opcodespace.com</a></p></footer>
@endsection

