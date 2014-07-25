<?php
/**
 * Created by PhpStorm.
 * User: Karim
 * Date: 7/15/14
 * Time: 6:34 AM
 */

class Courses extends My_Authentication_Controller{

    public function index()
    {

        $this->data["title"] = "Home";
        $this->data["bread_title"] = "Home";
        $this->data["bread_sub"] = "";

        $courses = $this->get_courses();
        if($courses)
        {


            $this->data["courses"] = $courses;
            $this->load->view("top_head", $this->data);
            $this->load->view("head", $this->data);
            $this->load->view("courses", $this->data);
        }
        else
        {
            $this->load->view("top_head", $this->data);
            $this->load->view("head", $this->data);
            $this->load->view("courses_empty", $this->data);
        }




    }

    public function quizzes($course_id)
    {

        $this->load->model("Courses_model","c_m");
        $quizzes = $this->c_m->get_quizzes($course_id);
        $course = $this->c_m->get_course($course_id);

        $this->data["title"] = "Course Quizzes";
        $this->data["bread_title"] = $course->code ." - " . $course->name ;
        $this->data["bread_sub"] = "Quizzes List";
        $this->data["course"] = $course->name;
        $this->data["course_id"] = $course->id;
        if($quizzes)
        {
            $this->data["quizzes"] = $quizzes;

            $this->load->view("top_head", $this->data);
            $this->load->view("head", $this->data);
            $this->load->view("quizzes", $this->data);
        }
        else
        {

            $this->load->view("top_head", $this->data);
            $this->load->view("head", $this->data);
            $this->load->view("quizzes_empty", $this->data);
        }
    }


    function create($course_id)
    {
        $this->load->model("Courses_model","cm");

        $course = $this->cm->get_course($course_id);
        $this->data["course"] = $course;;
        $this->data["title"] = "Create Quiz";
        $this->data["bread_title"] = $course->code ." - " . $course->name ;
        $this->data["bread_sub"] = "Quiz Form";


        $this->load->view("top_head", $this->data);
        $this->load->view("head", $this->data);
        $this->load->view("quiz_create", $this->data);
    }

    private function get_courses()
    {
        $this->load->model("Courses_model","c_m");
        $id = $this->session->userdata("id");
        if($this->instructor)
            return $this->c_m->get_instructor_courses($id);
        else
            return $this->c_m->get_student_courses($id);
    }
}