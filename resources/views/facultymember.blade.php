@extends('layouts.master')

@section('content')
<?php if (isset($facultyMember)): ?>
<h1><?php echo $facultyMember->name; ?></h1>
    <?php if($editing): ?>
        <!-- Editing code -->
        <p>These skills will be editable in the future.</p>
        <ul>
            <?php foreach($facultyMember->skills as $skill): ?>
                <li><?php echo $skill ?></li>
            <?php endforeach; ?>
        </ul>
        <!-- End Editing code-->

    <?php else: ?>
        <a href="<?php echo $facultyMember->id; ?>/edit">Edit</a>
        <!-- View code -->
        <ul>
        <?php foreach($facultyMember->skills as $skill): ?>
            <li><?php echo $skill ?></li>
        <?php endforeach; ?>
        </ul>
        <!-- End View code -->
    <?php endif; ?>
<?php else: ?>
    No faculty member with id <? echo $id ?> found.
<?php endif; ?>
@stop