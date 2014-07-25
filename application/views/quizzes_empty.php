<ol class="breadcrumb">
    <li>
        <a href="courses">
            <i class="fa fa-mortar-board"></i>
            Course List
        </a>
    </li>
    <li class="active">
        <i class="fa fa-university"></i>
        <?= $course ?>

    </li>
</ol>

<?php if($inst): ?>
    <a class="add-quiz-but" href="courses/create/<?= $course_id ?>">
        <i class="fa fa-plus"></i>
        Create Quiz
    </a>
<?php endif;  ?>

<div id="main">


    <p style="color:#2D3C3D;text-align:center;margin-top: 10%;">This course has no quizzes</p>


</div>