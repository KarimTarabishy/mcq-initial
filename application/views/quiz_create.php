<ol class="breadcrumb">
    <li>
        <a href="courses">
            <i class="fa fa-mortar-board"></i>
            Course List
        </a>
    </li>
    <li>
        <a href="courses/quizzes/<?= $course->id ?>">
            <i class="fa fa-university"></i>
            <?= $course->name ?>
        </a>
    </li>

    <li class="active">
        <i class="fa fa-edit"></i>
        Create Quiz
    </li>
</ol>








<div id="main">
    <button class="add-quiz-but add-ques" type="button" onclick="add()">

    <span class="fa fa-plus plus"></span>
        Add Question
    </button>
    <form id = "form" action="quiz/create/<?= $course->id ?>" method="post">

        <div class="question-container" id="1">
            <div class="question-string">
                <p>
                   Question</p>

                <textarea class="form-control"  name="questions[1][ques_string]" placeholder="Question..." > </textarea><!--  question 1 string -->
            </div>

            <ul class="choices-list">

                <li class="choice">
                    <input type="radio"  name="questions[1][correct_ans]" value="1"
                        /><input type="text"  class="form-control"  name="questions[1][choices][1]" value="" placeholder="Choice"/><span class="edit-buttons delete-button hidden" onclick = "deleteButton(this)"><i class="fa fa-minus"></i></span>

                </li>

                <li class="choice">
                    <input type="radio"  name="questions[1][correct_ans]" value="2"
                        /><input type="text"  class="form-control"  name="questions[1][choices][2]" placeholder="Choice" /><span class="edit-buttons delete-button hidden" onclick = "deleteButton(this)"><i class="fa fa-minus"></i></span><span class="edit-buttons" id="add-choice-but" onclick = "addChoice(this)">
                        <i class="fa fa-plus"></i>
                    </span>


                </li>

            </ul>
        </div>



        <button type="submit" class="add-quiz-but question-submit" >
            <i class="fa fa-paper-plane-o"></i> Submit</button>

    </form>
</div>