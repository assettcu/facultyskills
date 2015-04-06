@extends('layouts.master')

@section('content')
<?php if (isset($faculty)): ?>
<h1>Faculty Members</h1>
    <ul>
    <?php foreach($faculty as $facultyMember): ?>
        <li><a href='faculty/<?php echo $facultyMember->id; ?>'><?php echo $facultyMember->name ?></a></li>
    <?php endforeach; ?>
    </ul>
<?php else: ?>
    An error occured. Please try again later.
<?php endif; ?>


@stop