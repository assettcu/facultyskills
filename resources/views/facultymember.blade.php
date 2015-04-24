@extends('layouts.master')

@section('content')

    @if ($facultyMember)
        <ol class="breadcrumb">
            <li><a href="{{ action('FacultyController@index') }}">Home</a></li>
            <li><a href="{{ action('FacultyController@index') }}">Faculty</a></li>
            <li class="active">{{ $facultyMember->first_name." ".$facultyMember->last_name }}</li>
        </ol>

        <span class="faculty-name-header">{{ $facultyMember->first_name }} {{ $facultyMember->last_name }}</span>

        <!-- Editing code -->
        @if ($editing)
            <br><a href="{{ action('FacultyController@show', [$facultyMember->username]) }}"><i class="fa fa-angle-left"></i> Back to profile</a>


            <hr>
            <div class="faculty-general-info">
                {!! Form::open(['method' => 'PUT', 'action' => ['FacultyController@update', $facultyMember->username]]) !!}
                <div class="row">
                    <div class="col-md-4">
                        {!! Form::label('title','Title:') !!}
                        {!! Form::text('title', $facultyMember->title, ['class' => 'form-control']) !!}
                    </div>
                    <div class="col-md-4">
                        {!! Form::label('department','Department:') !!}
                        {!! Form::text('department', $facultyMember->department, ['class' => 'form-control']) !!}
                    </div>
                    <div class="col-md-4">
                        {!! Form::label('office','Office:') !!}
                        {!! Form::text('office', $facultyMember->office, ['class' => 'form-control']) !!}
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        {!! Form::label('campus_box','Campus Box:') !!}
                        {!! Form::text('campus_box', $facultyMember->campus_box, ['class' => 'form-control']) !!}
                    </div>
                    <div class="col-md-4">
                        {!! Form::label('email','Email:') !!}
                        {!! Form::text('email', $facultyMember->email, ['class' => 'form-control']) !!}
                    </div>
                    <div class="col-md-4">
                        {!! Form::label('url','URL:') !!}
                        {!! Form::text('url', $facultyMember->url, ['class' => 'form-control']) !!}
                    </div>
                </div>
                {!! Form::submit('Save', ['class' => 'btn btn-primary pull-right']) !!}
                {!! Form::close() !!}
            </div><hr>
            <div class="row">
                <div class="col-md-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Expertise</h3>
                        </div>
                        @if(count($facultyMember->skills))
                            <ul class="list-group">
                                @foreach($facultyMember->skills as $skill)
                                    <li class="list-group-item">
                                        {!! Form::open(['method' => 'DELETE', 'action' => ['SkillsController@destroy', $facultyMember->username, $skill->id]]) !!}
                                        {{ $skill->name }}
                                        <span class="pull-right">
                                        {!! Form::submit('Remove', ['class' => 'btn btn-xs btn-link']) !!}
                                    </span>
                                        {!! Form::close() !!}
                                    </li>
                                @endforeach
                            </ul>
                        @else
                            <div class="panel-body">
                                There are no expertise associated with this user.
                            </div>
                        @endif
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Add New Expertise</h3>
                        </div>
                        <div class="panel-body">
                            {!! Form::open(['method' => 'POST', 'action' => ['SkillsController@store', $facultyMember->username]]) !!}
                            <div class="form-group">
                                {!! Form::label('skillName','Expertise:') !!}
                                {!! Form::text('skillName', null, ['class' => 'form-control']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::submit('Add Expertise', ['class' => 'btn btn-primary form-control']) !!}
                            </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Technologies</h3>
                        </div>
                        @if(count($facultyMember->technologies))
                            <ul class="list-group">
                                @foreach($facultyMember->technologies as $technology)
                                    <li class="list-group-item">
                                        {!! Form::open(['method' => 'DELETE', 'action' => ['TechnologyController@destroy', $facultyMember->username, $technology->id]]) !!}
                                        {{ $technology->name }}
                                        <span class="pull-right">
                                        {!! Form::submit('Remove', ['class' => 'btn btn-xs btn-link']) !!}
                                    </span>
                                        {!! Form::close() !!}
                                    </li>
                                @endforeach
                            </ul>
                        @else
                            <div class="panel-body">
                                There are no technologies associated with this user.
                            </div>
                        @endif
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Add New Technologies</h3>
                        </div>
                        <div class="panel-body">
                            {!! Form::open(['method' => 'POST', 'action' => ['TechnologyController@store', $facultyMember->username]]) !!}
                            <div class="form-group">
                                {!! Form::label('technologyName','Technology:') !!}
                                {!! Form::text('technologyName', null, ['class' => 'form-control']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::submit('Add Technology', ['class' => 'btn btn-primary form-control']) !!}
                            </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        <!-- End Editing code-->

        <!-- View code -->
        @else
            <a class="pull-right" href="{{ action('FacultyController@edit', [$facultyMember->username]) }}"><i class="fa fa-pencil"></i> Edit</a>

            <div class="faculty-general-info">
                <div class="row">
                    <div class="col-md-4"><h4>Title</h4> {{ $facultyMember->title }}</div>
                    <div class="col-md-4"><h4>Department</h4> {{ $facultyMember->department }}</div>
                    <div class="col-md-4"><h4>Office</h4> {{ $facultyMember->office }}</div>
                </div>
                <div class="row">
                    <div class="col-md-4"><h4>Campus Box</h4> {{ $facultyMember->campus_box }}</div>
                    <div class="col-md-4"><h4>Email</h4><a href="mailto:{{ $facultyMember->email }}">{{ $facultyMember->email }}</a></div>
                    <div class="col-md-4"><h4>Website</h4> <a href="{{ $facultyMember->url }}">{{ $facultyMember->url }}</a></div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Expertise</h3>
                        </div>
                        @if(count($facultyMember->skills))
                            <ul class="list-group">
                                @foreach ($facultyMember->skills as $skill)
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

                        @if(count($facultyMember->technologies))
                            <ul class="list-group">
                                @foreach ($facultyMember->technologies as $technology)
                                    <li class="list-group-item">{{ $technology->name }}</li>
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