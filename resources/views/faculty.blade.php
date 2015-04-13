@extends('layouts.master')

@section('content')

    <ol class="breadcrumb">
        <li><a href="{{ action('WelcomeController@index') }}">Home</a></li>
        <li class="active">Faculty</li>
    </ol>
<h1>Faculty Members</h1>
@if(count($faculty) > 0)
    <ul class="list-group">
        @foreach($faculty as $facultyMember)
                <a href='{{ action('FacultyController@show', [$facultyMember->id]) }}' class="list-group-item">
                    {{ $facultyMember->name }}
                    <span class="badge pull-right"><small>{{ count($facultyMember->skills) }}</small></span>
                </a>
        @endforeach
    </ul>
@else
    An error occured. Please try again later.
@endif


@stop