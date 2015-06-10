@extends('layouts.master')

@section('content')
<h1>Search the Database</h1>
    <div class="well">
        Search for "{{ $search_text }}" results yielded {{ $search_count }} matches.
    </div>
    <ul class="nav nav-tabs">
        <li class="active"><a href="#faculty" data-toggle="tab" aria-expanded="true">Faculty <span class="badge">{{ count($faculty["results"]) }}</span></a></li>
        <li><a href="#skills" data-toggle="tab" aria-expanded="false">Skills <span class="badge">{{ count($skills["results"]) }}</span></a></li>
        <li><a href="#technologies" data-toggle="tab" aria-expanded="false">Technologies <span class="badge">{{ count($technologies["results"]) }}</span></a></li>
    </ul>
    <div id="myTabContent" class="tab-content">
        <div class="tab-pane fade active in" id="faculty">
            <p>
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>User</th>
                            <th>Email</th>
                            <th>Department</th>
                        </tr>
                    </thead>
                    <tbody>
                    @if(count($faculty["results"])>0)
                        @foreach($faculty["results"] as $index => $result)
                        <a href="#">
                            <tr>
                                <td><a href="{{ action('FacultyController@show', [$result->username]) }}">{{ $result->first_name." ".$result->last_name }}</a></td>
                                <td>{{ $result->username }}</td>
                                <td><a href="mailto:{{ $result->email }}">{{ $result->email }}</a></td>
                                <td>{{ $result->department }}</td>
                            </tr>
                        </a>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="4" class="text-center" style="padding:15px;">
                                There are no results for this search for faculty.
                            </td>
                        </tr>
                    @endif
                    </tbody>
                </table>
            </p>
        </div>
        <div class="tab-pane fade" id="skills">
            <p>
            <table class="table table-striped table-hover">
                <thead>
                <tr>
                    <th>Name</th>
                    <th>User</th>
                    <th>Email</th>
                    <th>Skills</th>
                </tr>
                </thead>
                <tbody>
                @if(count($skills["results"])>0)
                    @foreach($skills["results"] as $index => $result)
                        <a href="#">
                            <tr>
                                <td><a href="{{ action('FacultyController@show', [$result->username]) }}">{{ $result->first_name." ".$result->last_name }}</a></td>
                                <td>{{ $result->username }}</td>
                                <td><a href="mailto:{{ $result->email }}">{{ $result->email }}</a></td>
                                <td><?php $skills = []; foreach($result->skills as $skill) { $skills[] = $skill->name; } echo implode(", ",$skills); ?></td>
                            </tr>
                        </a>
                    @endforeach
                @else
                    <tr>
                       <td colspan="4" class="text-center" style="padding:15px;">
                           There are no results for this search for skills.
                       </td>
                    </tr>
                @endif
                </tbody>
            </table>
            </p>
        </div>
        <div class="tab-pane fade" id="technologies">
            <p>
            <table class="table table-striped table-hover">
                <thead>
                <tr>
                    <th>Name</th>
                    <th>User</th>
                    <th>Email</th>
                    <th>Department</th>
                </tr>
                </thead>
                <tbody>
                @foreach($technologies["results"] as $index => $result)
                    <a href="#">
                        <tr>
                            <td><a href="{{ action('FacultyController@show', [$result->username]) }}">{{ $result->first_name." ".$result->last_name }}</a></td>
                            <td>{{ $result->username }}</td>
                            <td><a href="mailto:{{ $result->email }}">{{ $result->email }}</a></td>
                            <td><?php $techs = []; foreach($result->technologies as $tech) { $techs[] = $tech->name; } echo implode(", ",$techs); ?></td>
                        </tr>
                    </a>
                @endforeach
                </tbody>
            </table>
            </p>
        </div>
    </div>
@stop