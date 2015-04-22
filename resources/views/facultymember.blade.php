@extends('layouts.master')

@section('content')

    @if ($facultyMember)
        <ol class="breadcrumb">
            <li><a href="{{ action('WelcomeController@index') }}">Home</a></li>
            <li><a href="{{ action('FacultyController@index') }}">Faculty</a></li>
            <li class="active">{{ $facultyMember->firstname." ".$facultyMember->lastname }}</li>
        </ol>

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
                        @if(count($facultyMember->skills()))
                            <ul class="list-group">
                                @foreach($facultyMember->skills() as $skill)
                                    <li class="list-group-item">
                                        {!! Form::open(['method' => 'DELETE', 'action' => ['SkillsController@destroy', $facultyMember->id, $skill->id]]) !!}
                                        {{ $skill->skill }}
                                        <span class="pull-right">
                                        {!! Form::submit('Remove', ['class' => 'btn btn-xs btn-link']) !!}
                                    </span>
                                        {!! Form::close() !!}
                                    </li>
                                @endforeach
                            </ul>
                        @else
                            <div class="panel-body">
                                There are no skills associated with this user.
                            </div>
                        @endif
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Add New Expertise</h3>
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

            <a class="pull-right" href="{{ action('FacultyController@edit', [$facultyMember->id]) }}"><i class="fa fa-pencil"></i> Edit</a>
            <div class="row">
                <div class="col-md-6">
                    <div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Expertise</h3>
                        </div>

                        @if(count($facultyMember->expertise()))
                            <ul class="list-group">
                                @foreach ($facultyMember->expertise() as $skill)
                                    <li class="list-group-item">{{ $skill->name }}</li>
                                @endforeach
                            </ul>
                        @else
                            <div class="panel-body">
                                There are no skills associated with this user.
                            </div>
                        @endif
                    </div>
                </div>
                <div class="col-md-6">
                    <div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Technologies</h3>
                        </div>

                        @if(count($facultyMember->expertise()))
                            <ul class="list-group">
                                @foreach ($facultyMember->expertise() as $skill)
                                    <li class="list-group-item">{{ $skill->name }}</li>
                                @endforeach
                            </ul>
                        @else
                            <div class="panel-body">
                                There are no skills associated with this user.
                            </div>
                        @endif
                    </div>
                </div>
            </div>

        <!-- End View code -->
        @endif
    @else
        <p>No faculty member with id {{ $id }} found.</p>
    @endif

@stop