@extends('layouts.master')

@section('content')
<div class="content">
	<div class="title">Laravel 5</div>
	<div class="quote">{{ Inspiring::quote() }}</div>
	<a href="faculty">Faculty</a>
</div>
@stop