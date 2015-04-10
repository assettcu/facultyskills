@extends('layouts.master')

@section('content')

<h1>Faculty Members</h1>
@if(count($faculty) > 0)
    <ul>
        @foreach($faculty as $facultyMember)
            <li><a href='faculty/{{ $facultyMember->id }}'>{{ $facultyMember->name }}</a></li>
        @endforeach
    </ul>
@else
    An error occured. Please try again later.
@endif


@stop