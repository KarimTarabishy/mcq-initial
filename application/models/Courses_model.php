<?php
/**
 * Created by PhpStorm.
 * User: Karim
 * Date: 7/15/14
 * Time: 7:31 AM
 */

class Courses_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
        $this->load->database();

    }

    public function get_student_courses($id)
    {
        $query = "select course_offering.quiz_count, course.name, course.code, course.id
                    from course_offering join takes on course_offering.id=takes.course_offering_id
                            join course on course_offering.course_id = course.id
                            where takes.student_id = ?";
        $res = $this->db->query($query, array($id));
        if($res->num_rows() > 0)
        {
            return $res->result();
        }
        else
            return null;

    }

    public function get_instructor_courses($id)
    {
        $query = "select course_offering.quiz_count, course.name, course.code, course.id from course_offering
                              join course on course_offering.course_id = course.id
                              where instructor_id = ?";
        $res = $this->db->query($query, array($id));
        if($res->num_rows() > 0)
        {
            return $res->result();
        }
        else
            return null;
    }

    public function get_quizzes($course_id)
    {
        $query = "select * from mcq join course_offering where mcq.course_offering_id = ?";
        $res = $this->db->query($query, array($course_id));

        if($res->num_rows() > 0)
        {


            return $res->result();
        }
        else
            return null;
    }

    function get_course($course_id)
    {
        $query = "select course.name, course.code, course.id from
                            course join course_offering on course.id = course_offering.course_id
                            where course_offering.id = ?";
        $res = $this->db->query($query, array($course_id));
        return $res->row();
    }

} 