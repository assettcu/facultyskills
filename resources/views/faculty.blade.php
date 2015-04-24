@extends('layouts.master')

@section('content')

    <ol class="breadcrumb">
        <li><a href="{{ action('FacultyController@index') }}">Home</a></li>
        <li class="active">Faculty</li>
    </ol>
<h1>Faculty Members</h1>
@if(count($faculty) > 0)
    <ul class="list-group">
        @foreach($faculty as $facultyMember)
                <a href='{{ action('FacultyController@show', [$facultyMember->username]) }}' class="list-group-item">
                    {{ $facultyMember->first_name." ".$facultyMember->last_name }}
                    <span class="badge pull-right"><small>Skills {{ count($facultyMember->skills) }}</small></span>
                    <span class="badge pull-right"><small>Tech {{ count($facultyMember->technologies) }}</small></span>
                </a>
        @endforeach
    </ul>
@else
    An error occured. Please try again later.
@endif


@stop