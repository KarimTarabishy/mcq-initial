<ol class="breadcrumb">
    <li class="active">

            <i class="fa fa-mortar-board"></i>
            Course List
    </li>
</ol>

<div id="main">

    <ul class="list-group">
        <?php foreach ($courses as $course): ?>
        <?php
            echo "<li class=\"list-group-item\" onclick=\"window.location='courses/quizzes/".$course->id."'\">"
        ?>
            <span class="badge"><?= $course->quiz_count ?> </span>
            <?= $course->code ?> - <?= $course->name ?>
        </li>
        <?php endforeach  ?>
    </ul>


</div>