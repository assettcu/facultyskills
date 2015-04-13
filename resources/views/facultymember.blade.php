@extends('layouts.master')

@section('content')

    @if ($facultyMember)
        <h1>{{ $facultyMember->name }}</h1>

        <!-- Editing code -->
        @if ($editing)
            <a href="{{ action('FacultyController@show', [$facultyMember->id]) }}"><i class="fa fa-angle-left"></i> Back to profile</a>
            <div class="row">
                <div class="col-md-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Skills</h3>
                        </div>
                        <ul class="list-group">
                            @foreach($facultyMember->skills as $skill)
                                <li class="list-group-item">
                                    {!! Form::open(['method' => 'DELETE', 'action' => ['SkillsController@destroy', $facultyMember->id, $skill->id]]) !!}
                                    {{ $skill->name }}
                                    <span class="pull-right">
                                        {!! Form::submit('Remove', ['class' => 'btn btn-xs btn-link']) !!}
                                    </span>
                                    {!! Form::close() !!}
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Add New Skill</h3>
                        </div>
                        <div class="panel-body">
                            {!! Form::open(['method' => 'POST', 'action' => ['SkillsController@store', $facultyMember->id]]) !!}
                            <div class="form-group">
                                {!! Form::label('skillName','Skill:') !!}
                                {!! Form::text('skillName', null, ['class' => 'form-control']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::submit('Add Skill', ['class' => 'btn btn-primary form-control']) !!}
                            </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>



        <!-- End Editing code-->
        <!-- View code -->
        @else
            <a href="{{ action('FacultyController@edit', [$facultyMember->id]) }}">Edit</a>

            @if(count($facultyMember->skills))
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