@extends('layouts.master')

@section('content')

    @if ($facultyMember)
        <h1>{{ $facultyMember->name }}</h1>

        <!-- Editing code -->
        @if ($editing == TRUE)
            <p>These skills will be editable in the future.</p>
            <ul>
                @foreach ($facultyMember->skills as $skill)
                    <li>{{ $skill->name }}</li>
                @endforeach
            </ul>
        <!-- End Editing code-->
        <!-- View code -->
        @else
            <a href="{{ $facultyMember->id }}/edit">Edit</a>

            @if(count($facultyMember->skills) > 0)
                <ul>
                    @foreach ($facultyMember->skills as $skill)
                        <li>{{ $skill->name }}</li>
                    @endforeach
                </ul>
            @else
                <p>There are no skills associated with this user.</p>
            @endif
        <!-- End View code -->
        @endif
    @else
        <p>No faculty member with id {{ $id }} found.</p>
    @endif

@stop