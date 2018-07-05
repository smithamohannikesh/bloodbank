<?php

class Fv_model extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->helper(array('date', 'url'));
    }

    public function profile_update_val() {
        $consdf = array(
            array(
                'field' => 'full_name',
                'label' => 'Name',
                'rules' => 'required|trim'
            ),
            array(
                'field' => 'compny',
                'label' => 'Company',
                'rules' => 'required|trim'
            ),
            array(
                'field' => 'email_id',
                'label' => 'Email Id',
                'rules' => 'required|valid_email|trim'
            ),
            array(
                'field' => 'phone',
                'label' => 'Phone',
                'rules' => 'required|trim'
            ),
            array(
                'field' => 'address',
                'label' => 'Address',
                'rules' => 'required|trim'
            ),
            array(
                'field' => 'pincode',
                'label' => 'Pin Code',
                'rules' => 'required|trim'
            ),
        );
        $this->form_validation->set_rules($consdf);
    }

    public function register_now_val() {
        $consdf = array(
            array(
                'field' => 'password',
                'label' => 'Password ',
                'rules' => 'required|trim'
            ),
            array(
                'field' => 'captcha',
                'label' => 'captcha ',
                'rules' => 'required|trim'
            ),
            array(
                'field' => 'password_c',
                'label' => 'Confirm Password',
                'rules' => 'required|trim|matches[password]'
            ),
            array(
                'field' => 'email_id',
                'label' => 'Email Id',
                'rules' => 'required|valid_email|trim|is_unique[tbl_users.email_id]'
            ),
            array(
                'field' => 'first_nmae',
                'label' => 'First Name',
                'rules' => 'required|trim'
            ),
            array(
                'field' => 'last_name',
                'label' => 'Last name',
                'rules' => 'required|trim'
            ),
            array(
                'field' => 'phone',
                'label' => 'Phone',
                'rules' => 'required|trim'
            ),
            array(
                'field' => 'address',
                'label' => 'Address',
                'rules' => 'required|trim'
            ),
            array(
                'field' => 'pincode',
                'label' => 'Pin Code',
                'rules' => 'required|trim'
            ),
        );
        $this->form_validation->set_rules($consdf);
    }

    public function change_password_val() {
        $consdf = array(
            array(
                'field' => 'current_pass',
                'label' => 'Current Password',
                'rules' => 'required|trim'
            ),
            array(
                'field' => 'new_pass',
                'label' => 'New Password',
                'rules' => 'required|trim'
            ),
            array(
                'field' => 'confirm_pass',
                'label' => 'Confirm Password',
                'rules' => 'required|trim|matches[new_pass]'
            ),
        );
        $this->form_validation->set_rules($consdf);
    }

    public function service_request_val() {
        $consdf = array(
            array(
                'field' => 'request_type',
                'label' => 'Request type',
                'rules' => 'required|trim'
            ),
            array(
                'field' => 'service_name',
                'label' => 'Product Details',
                'rules' => 'required|trim'
            ),
            array(
                'field' => 'message',
                'label' => 'Message',
                'rules' => 'required|trim'
            ),
        );
        $this->form_validation->set_rules($consdf);
    }
public function faq_val() {
        $consdf = array(
            array(
                'field' => 'faq_question',
                'label' => 'Questions',
                'rules' => 'required|trim'
            ),
            array(
                'field' => 'faq_ans',
                'label' => 'Answer',
                'rules' => 'required|trim'
            ),
            
        );
        $this->form_validation->set_rules($consdf);
    }

    public function admin_profile_val() {
        $consdf = array(
            array(
                'field' => 'username',
                'label' => 'Username',
                'rules' => 'required|trim'
            ),
            array(
                'field' => 'name',
                'label' => 'Name',
                'rules' => 'required|trim'
            ),
            array(
                'field' => 'email_id',
                'label' => 'Mail id',
                'rules' => 'required|trim|valid_email'
            ),
            array(
                'field' => 'phone',
                'label' => 'Phone',
                'rules' => 'required|trim'
            ),
        );
        $this->form_validation->set_rules($consdf);
    }

    public function services_val() {
        $consdf = array(
            array(
                'field' => 'service_name',
                'label' => 'Service Name',
                'rules' => 'required|trim'
            ),
            array(
                'field' => 'service_text',
                'label' => 'Description',
                'rules' => 'required|trim'
            ),
        );
        $this->form_validation->set_rules($consdf);
    }

    public function register_details_val() {

        $consdf = array(
            array(
                'field' => 'name',
                'label' => 'name',
                'rules' => 'required|trim'
            ),
            
            array(
                'field' => 'dob',
                'label' => 'dob',
                'rules' => 'required|trim'
            ),
            array(
                'field' => 'gender',
                'label' => 'gender',
                'rules' => 'required|trim'
            ),
			array(
                'field' => 'address',
                'label' => 'address',
                'rules' => 'required|trim'
            ),
			array(
                'field' => 'phone',
                'label' => 'gender',
                'rules' => 'required|trim'
            ),
			array(
                'field' => 'blood_grp',
                'label' => 'blood_grp',
                'rules' => 'required|trim'
            ),
			array(
                'field' => 'interested',
                'label' => 'interested',
                'rules' => 'required|trim'
            ),
			array(
                'field' => 'donate',
                'label' => 'donate',
                'rules' => 'required|trim'
            ),
			/*array(
                'field' => 'previous_date',
                'label' => 'previous_date',
                'rules' => 'required|trim'
            ),*/
        );
        $this->form_validation->set_rules($consdf);
    }

    public function activate_val() {
        $consdf = array(
            array(
                'field' => 'password',
                'label' => 'Password',
                'rules' => 'required|trim'
            ),
            array(
                'field' => 'c_password',
                'label' => 'Confirm Password',
                'rules' => 'required|trim|matches[password]'
            ),
        );
        $this->form_validation->set_rules($consdf);
    }

    public function career_val() {
        $consdf = array(
            array(
                'field' => 'first_name',
                'label' => 'First Name',
                'rules' => 'required|trim'
            ),
            array(
                'field' => 'phone',
                'label' => 'Phone',
                'rules' => 'required|trim'
            ),
            array(
                'field' => 'date_of_birth',
                'label' => 'Date of birth',
                'rules' => 'required|trim'
            ),
            array(
                'field' => 'last_name',
                'label' => 'Last Name',
                'rules' => 'required|trim'
            ),
            array(
                'field' => 'email',
                'label' => 'Email',
                'rules' => 'required|trim|valid_email'
            ),
            array(
                'field' => 'address',
                'label' => 'Address',
                'rules' => 'required|trim'
            ),
            array(
                'field' => 'job_title',
                'label' => 'Job Title',
                'rules' => 'required|trim'
            ),
            array(
                'field' => 'qualification',
                'label' => 'Qualification',
                'rules' => 'required|trim'
            ),
            array(
                'field' => 'experiance',
                'label' => 'Experiance',
                'rules' => 'required|trim'
            ),
        );
        $this->form_validation->set_rules($consdf);
    }

    public function contact_us_val() {
        $consdf = array(
            array(
                'field' => 'name',
                'label' => 'Name',
                'rules' => 'required|trim'
            ),
            array(
                'field' => 'email',
                'label' => 'Email',
                'rules' => 'required|valid_email|trim'
            ),
            array(
                'field' => 'phone',
                'label' => 'Phone',
                'rules' => 'required|trim'
            ),
            array(
                'field' => 'services',
                'label' => 'Services',
                'rules' => 'required|trim'
            ),
            array(
                'field' => 'comments',
                'label' => 'Comments',
                'rules' => 'required|trim'
            ),
            
        );
        $this->form_validation->set_rules($consdf);
    }

    public function banner_val() {


        $consdf = array(
            array(
                'field' => 'slider_title',
                'label' => 'Banner Title',
                'rules' => 'required|trim'
            ),
            array(
                'field' => 'slider_text',
                'label' => 'Description',
                'rules' => 'required|trim'
            ),
        );
        $this->form_validation->set_rules($consdf);
    }

    public function testimonials_val() {
        $consdf = array(
            array(
                'field' => 'testimonial_text',
                'label' => 'Testimonial',
                'rules' => 'required|trim'
            ),
            array(
                'field' => 'name_test',
                'label' => 'Name ',
                'rules' => 'required|trim'
            ),
            array(
                'field' => 'designation_test',
                'label' => 'Designation ',
                'rules' => 'required|trim'
            ),
            array(
                'field' => 'company_test',
                'label' => 'Company ',
                'rules' => 'required|trim'
            ),
        );
        $this->form_validation->set_rules($consdf);
    }

}
