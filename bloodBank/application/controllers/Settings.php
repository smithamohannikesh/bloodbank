<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Settings extends MY_Controller {

    function __construct() {
        parent::__construct();

        $this->load->library('form_validation');
        $this->load->library(array('parser', 'session'));
        $this->load->model(array('Db_model'));
        $this->load->model(array('Fv_model'));
        $this->load->model(array('Mail_model'));

        $this->load->helper(array('form', 'url'));
        $this->load->helper('array');

        $this->form_validation->set_rules($this->config);
        
    }

    public function index() {
        redirect('settings/admin_profile');

//        
    }

    public function login() {
 if ($this->session->userdata('logged_in')) {
              redirect('settings/admin-profile');
        } else {
        $this->session->keep_flashdata('url');
        $url = $this->session->flashdata('url');

        if ($this->input->post()) {
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            $this->form_validation->set_rules('username', 'Username', 'required');
            $this->form_validation->set_rules('password', 'Password', 'required');
            if ($this->form_validation->run() == FALSE) {
                $this->load->view('pages/login');
            } else {
                $st2 = array(
                    'username' => $username,
                );
                $data = $this->Db_model->get_details('count(admin_user_id) as ct', 'tab_admin', $st2);
                if ($data[0]['ct'] == 0) {
                    $data['err'] = "This username is not signed up before and you need to sign up before login !";
                    $this->load->view('pages/login', $data);
                } else {
                    $st = array(
                        'username' => $username,
                        'password' => md5($password),
                        'status' => "1",
                    );
                    $data = $this->Db_model->get_details('count(admin_user_id) as ct,name, email_id,status, phone, photo, username', 'tab_admin', $st);
                    if ($data[0]['ct'] == 1) {

                        $sess = array(
                            'logged_in' => TRUE,
                            'username' => $data[0]['username'],
                            'phone' => $data[0]['phone'],
                            'photo' => $data[0]['photo'],
                            'name' => $data[0]['name'],
                            'email_id' => $data[0]['email_id'],
                        );

                        $this->session->set_userdata($sess);
                        if (isset($url)) {
                            redirect($url);
                        } else {
                            redirect('settings/admin-profile');
                        }
                    } else {
                        $data['err'] = "Invalid Username or password !";
                        $this->load->view('pages/login', $data);
                    }
                }
            }
        } else {
            $this->load->view('pages/login');
        }
}
    }

    public function forgot_password() {
        $this->session->keep_flashdata('url');
        $url = $this->session->flashdata('url');

        if ($this->input->post()) {
            $email = $this->input->post('email');
            $this->form_validation->set_rules('email', 'e- mail', 'required');
            if ($this->form_validation->run() == FALSE) {
                $this->load->view('pages/forgot_password');
            } else {
                $st2 = array(
                    'email_id' => $email,
                );
                $data = $this->Db_model->get_details('count(admin_user_id) as ct,name,username', 'tab_admin', $st2);
                if ($data[0]['ct'] == 0) {
                    $data['err'] = "This e-mail is not signed up before. !";
                    $this->load->view('pages/forgot_password', $data);
                } else {

                    $token = sha1(uniqid($email, true));
                    $arr = array(
                        'username' => $data[0]['username'],
                        'email_id' => $email,
                        'token' => $token,
                    );
                    $wrr = array(
                        'username' => $data[0]['username'],
                        'email_id' => $email,
                    );

                    $this->Db_model->delete('tbl_pending_users', $wrr);
                    $this->Db_model->insert('tbl_pending_users', $arr);

                    $url = base_url() . 'index.php/settings/activate/' . $token;
                      $msg = "<table width='72%' cellpadding='0' cellspacing='0' style='max-width:100%;border:1px solid #b3b3b3' align='center'>";
                        $msg.="<tbody><tr><td colspan='2' bgcolor='#00A9EE' style='padding:15px'>";
                        $msg.="<img src='" . base_url() . "page_assets/images/logo.jpg' width='120' height='50'>";
                        $msg.="</td></tr><tr>";
                    $msg.="<td style='padding:32px 27px 27px 27px' valign='top'>";
                    $msg.="<table style='font-size:15px;width:400px'>";
                    $msg.="<tbody><tr><td style='padding-bottom:15px'>Dear " . $data[0]['name'] . ",</td></tr><tr><td style='padding-bottom:15px'>You have requested that your password be reset. Click the link below. You will be taken to an bluebell
 web page where you can change your password.</td>";
                    $msg.= " </tr>";
                    $msg.="<tr>";
                    $msg.="<td style='font-size:22px;font-weight:bold;padding-bottom:15px;color:#1f4f82'> <a href='" . $url . "' target='_blank'> Reset Password</a></td>";
                    $msg.="</tr>";
                    $msg.="<tr>";
                    $msg.="<td>The link will expire in 1 day and can be used only once.</td>";
                    $msg.="</tr>";
                    $msg.="<tr>";
                    $msg.="<td colspan='2' style='padding:20px 27px 10px 0'>Thank you,</td>";
                    $msg.="</tr>";
                    $msg.="<tr>";
                    $msg.="<td colspan='2' style='padding:0px 27px 30px 0'>The bluebell Team</td>";
                    $msg.="</tr>";
                    $msg.=" </tbody></table></td></tr><tr>";
                    $msg.= "<td colspan='2' style='border-top:1px solid #b3b3b3'>";
                    $msg.= " <span class='HOEnZb'><font color='#888888'>";
                    $msg.="</font></span><span class='HOEnZb'><font color='#888888'>";
                    $msg.= "</font></span><table width='100%' cellpadding='0' cellspacing='0' style='padding:32px 5px 27px 5px;font-size:10px' align='center'>";
                    $msg.= "<tbody><tr>";
                    $msg.= " <td align = 'left' style = 'width:35%'>";
                    $msg.= "<table cellpadding = '0' cellspacing = '0' style = 'font-size:10px'>";
                    $msg.= "<tbody><tr><td>";
                    $msg.= "Copyright @ 2014, bluebell. <br> All rights reserved.";
                    $msg.= "</td></tr>";
                    $msg.= "</tbody></table>";
                    $msg.= "</td>";
                    $msg.= "<td align = 'right' style = 'width:65%'>";
                    $msg.= "<span class = 'HOEnZb'><font color = '#888888'>";
                    $msg.= "</font></span><span class = 'HOEnZb'><font color = '#888888'>";
                    $msg.= "</font></span><table cellpadding = '0' cellspacing = '0' style = 'font-size:10px'>";
                    $msg.= "<tbody><tr><td>";
                    $msg.= "</font></span></td></tr></tbody></table><span class = 'HOEnZb'><font color = '#888888'>";
                    $msg.= "</font></span></td></tr></tbody></table><span class = 'HOEnZb'><font color = '#888888' >";
                    $msg.= "</font></span></td></tr></tbody></table > ";



                    $flg = $this->Mail_model->sendMail('sentmailtodemo@gmail.com', 'Bluebell', $email, '', '', 'Reset Your Bluebell Admin Password', $msg);


                    $this->session->set_flashdata('activate', "An email has been sent. Please check your mail.");
                    redirect('settings/login');
                }
            }
        } else {
            $this->load->view('pages/forgot_password');
        }
    }

    public function logout() {

        $this->session->sess_destroy();
        redirect('settings/login');
    }

    public function activate() {
        $token = $this->uri->segment(3);
        if (isset($token) && preg_match('/^[0-9A-F]{40}$/i', $token)) {
            $st2 = array(
                'token' => $token,
            );
            $xx = $this->Db_model->get_details('pending_id, username, email_id, token, tstamp', 'tbl_pending_users', $st2);
            if ($xx) {
                $date1 = new DateTime(date('Y-m-d', strtotime(date('Y-m-d'))));
                $date2 = new DateTime(date('Y-m-d', strtotime($xx[0]['tstamp'])));
                $differ = $date1->diff($date2)->days;
                $this->Fv_model->activate_val();
                if ($differ >= 1) {
                    $this->session->set_flashdata('activate', "Token has expired. Request For password Reset..");
                    redirect(base_url());
//                    //  echo "Token has expired. Request For password Reset";
                } else {
                    if ($this->input->post()) {
                        if ($this->form_validation->run() == FALSE) {
                            $this->load->view('pages/activate');
                        } else {
                            $datass = array('password' => md5($this->input->post('password')));
                            $flag = $this->Db_model->update('tab_admin', $datass, array('username' => $xx[0]['username']));
                            if ($flag) {
                                $this->Db_model->delete('tbl_pending_users', array('token' => $token));
                                $this->session->set_flashdata('activate', "Your Account is Reset Please Login Again..");
                            } else {
                                $this->session->set_flashdata('activate', "Your Account is Reset Please Login Again..");
                            }
                            redirect('settings/login');
                        }
                    } else {
                        $this->load->view('pages/activate');
                    }
                }
            } else {
                $this->session->set_flashdata('activate', "Token has expired. Request For password Reset..");
                redirect('settings/login');
            }
        } else {
            $this->session->set_flashdata('activate', "Token has expired. Request For password Reset..");
            redirect('settings/login');
        }
    }







    public function admin_profile() {
        $rdata['title'] = "Admin Profile";
        $rdata['breadcrumb1'] = "Admin";
        $rdata['breadcrumb2'] = "Admin Profile";
        $rdata['head'] = "Edit Profile";
        $rdata['active_open'] = "1";
        $rdata['active'] = "100";
        $st2 = array(
            'username' => $this->session->userdata('username'),
        );
        $rdata['edit_data'] = $this->Db_model->get_details('admin_user_id, username, password, photo, name, email_id, phone, designstion, created_date, status', 'tab_admin', $st2);
        $this->Fv_model->admin_profile_val();
        if ($this->input->post()) {
            if ($this->form_validation->run() == FALSE) {
                $this->loadtemplate('pages/admin_profile', 'template/template', $rdata);
            } else {

                $ins_data = $this->input->post();

                $config['upload_path'] = './uploads/userpics/';
                $config['allowed_types'] = 'gif|jpg|png|GIF|JPG|PNG';
                $config['max_size'] = '1000';
                $config['max_width'] = '10000';
                $config['max_height'] = '10240';
                $config['file_name'] = date('YmdHis', time()) . md5($ins_data['name']);
                $this->load->library('upload', $config);
                $this->upload->initialize($config);

                $field_name = "photo";
                $this->upload->do_upload($field_name);
                $img_data = $this->upload->data();
//                $new_imgname = 'new_file_name' . $img_data['file_ext'];
                $ins_data['photo'] = date('YmdHis', time()) . md5($ins_data['name']) . $img_data['file_ext'];
                $error = array('error' => $this->upload->display_errors());
//                print_r($error);

                if ($error['error'] == "") {
                    $st2 = array(
                        'username' => $this->session->userdata('username'),
                    );
                    $flag = $this->Db_model->update('tab_admin', $ins_data, $st2);
                    if ($flag) {
                        $this->session->set_userdata('photo', $ins_data['photo']);
                        $this->session->set_userdata('username', $ins_data['username']);
                        $this->session->set_userdata('name', $ins_data['name']);
                        $this->session->set_userdata('email_id', $ins_data['email_id']);
                        $this->session->set_userdata('phone', $ins_data['phone']);

                        $this->session->set_flashdata('successmsg', "Your Profile is successfully updated. ");
                    } else {
                        $this->session->set_flashdata('errormsg', "Something went wrong..");
                    }
                } else {
                    $this->session->set_flashdata('errormsg', "Something went wrong..");
                }
                redirect('settings/admin_profile');
            }
        } else {

            $this->loadtemplate('pages/admin_profile', 'template/template', $rdata);
        }
    }

    public function change_password() {
        $rdata['title'] = "Manage Password";
        $rdata['breadcrumb1'] = "Admin";
        $rdata['breadcrumb2'] = "Manage Password";
        $rdata['head'] = "Change Password";
        $rdata['active_open'] = "1";
        $rdata['active'] = "101";
        $this->Fv_model->change_password_val();
        if ($this->input->post()) {
            if ($this->form_validation->run() == FALSE) {
                $this->loadtemplate('pages/change_password', 'template/template', $rdata);
            } else {
                $ins_data = $this->input->post();
                $username = $this->session->userdata('username');
                $st2 = array(
                    'username' => $username,
                    'password' => md5($ins_data['current_pass']),
                );
                $data = $this->Db_model->get_details('count(admin_user_id) as ct', 'tab_admin', $st2);
                if ($data[0]['ct'] == 0) {
                    $rdata['err'] = "Current Password is not correct !";
                    $this->loadtemplate('pages/change_password', 'template/template', $rdata);
                } else {

                    $ins['password'] = md5($ins_data['new_pass']);
                    $flag = $this->Db_model->update('tab_admin', $ins, $st2);
                    if ($flag) {
                        redirect('settings/logout');
                    } else {
                        $this->session->set_flashdata('errormsg', "Something went wrong..");
                        redirect('settings/change_password');
                    }
                }
            }
        } else {
            $this->loadtemplate('pages/change_password', 'template/template', $rdata);
        }
    }



    public function registration_details() {
        $rdata['title'] = "Application Form";
        $rdata['breadcrumb1'] = " Details";
        $rdata['breadcrumb2'] = "Add Details";
        $rdata['head'] = "Register Details";
        $rdata['active_open'] = "3";
        $rdata['active'] = "104";
        $st2 = array(
            '1' => '1',
        );
        $flag="";
        $error="";
        $rdata['lists'] = $this->Db_model->get_details2('`reg_id`, `name`, `age`, `dob`, `gender`, `address`, `phone`, `blood_grp`, `interested`, `donate`, `previous_date`, `status`', 'ragistration');
        if ($this->uri->segment(3)) {
            $st2 = array(
                'status' => '1',
                'reg_id' => $this->uri->segment(3),
            );
            $rdata['edit_data'] = $this->Db_model->get_details(' `reg_id`, `name`, `age`, `dob`, `gender`, `address`, `phone`, `blood_grp`, `interested`, `donate`, `previous_date`, `status`,`area`', 'ragistration', $st2);

            if (isset($rdata['edit_data'][0]))
                $rdata['edit_data'] = $rdata['edit_data'][0];
            
        }
        $this->Fv_model->register_details_val();
        if ($this->input->post()) {
            if ($this->form_validation->run() == FALSE) {
                $this->loadtemplate('pages/register_details', 'template/template', $rdata);
            } else {

                $ins_data = $this->input->post();

              $ins_data['previous_date']= str_replace("/","-",$ins_data['previous_date']);
                $ins_data['previous_date'] = date('Y-m-d', strtotime($ins_data['previous_date']));
                 if($ins_data['donate']=='no')
                {
                    $ins_data['previous_date'] ="";
                }
                   $ins_data['dob']= str_replace("/","-",$ins_data['dob']);
			   $ins_data['dob'] = date('Y-m-d', strtotime($ins_data['dob']));
			   $from= new DateTime($ins_data['dob']);
			   $to=new DateTime('today');
			   $ins_data['age']=$from ->diff($to)->y;
                          if(($ins_data['age']<17) or ($ins_data['age']>70))
                           {
                             $error=  "not eligible age should be in between 17 and 70";
                          $this->session->set_flashdata('errormsg', $error);
                          $error="Your age should be between 17 and 70,try again with another Date of birth ! ";
                           }
                          else{
                if (isset($rdata['edit_data'])) {
                    $whr = array(
                        'reg_id' => $this->uri->segment(3),
                    );
                    $flag = $this->Db_model->update('ragistration', $ins_data, $whr);
                    $msg = "Your data is Updated succesfully";
                } else {
                   
                    $flag = $this->Db_model->insert('ragistration', $ins_data);
                    $msg = "Your data is saved succesfully";
                          }
                }
 
                if ($flag) {
                    $this->session->set_flashdata('successmsg', $msg);
                } else {

                    $this->session->set_flashdata('errormsg', "Something went wrong..".$error);
                }
                         // }
             redirect('settings/registration_details');
          
            }
        } else {
            $this->loadtemplate('pages/register_details', 'template/template', $rdata);
        }
    }

    public function delete_register() {
        if ($this->session->userdata('logged_in')) {
            $whr = array(
                'reg_id' => $this->input->post('id'),
            );
            $flag = $this->Db_model->delete('ragistration', $whr);
            if ($flag) {
                $data['st'] = 1;
                $msg = "Deleted Successfully";
            } else {
                $data['st'] = 0;
                $msg = "Something went wrong..";
            }

            $data['msg'] = $msg;
            $this->load->view('slices/errormsg', $data);
        }
    }

    public function deactivate_register() {
        if ($this->session->userdata('logged_in')) {
            $whr = array(
                'reg_id' => $this->input->post('id'),
            );
            $ins = array(
                'status' => '0',
            );
            $flag = $this->Db_model->update('ragistration', $ins, $whr);
            if (isset($flag)) {
                $data['st'] = 1;
                $msg = "Status changed Successfully";
            } else {
                $data['st'] = 0;
                $msg = "Something went wrong..";
            }

            $data['msg'] = $msg;
            $this->load->view('slices/errormsg', $data);
        }
    }

    public function activate_register() {
        if ($this->session->userdata('logged_in')) {
            $whr = array(
                'reg_id' => $this->input->post('id'),
            );
            $ins = array(
                'status' => '1',
            );
            $flag = $this->Db_model->update('ragistration', $ins, $whr);
            if (isset($flag)) {
                $data['st'] = 1;
                $msg = "Status changed Successfully";
            } else {
                $data['st'] = 0;
                $msg = "Something went wrong..";
            }

            $data['msg'] = $msg;
            $this->load->view('slices/errormsg', $data);
        }
    }
    public function selectreport(){
        $rdata['title'] = "Report";
        $rdata['breadcrumb1'] = "Register";
        $rdata['breadcrumb2'] = "Report";
        $rdata['head'] = "Report";
        $rdata['active_open'] = "3";
        $rdata['active'] = "105";
        
        $flag="";
        $error="";
       
         if ($this->input->post()) {

          $ins_data = $this->input->post();
          $area=$ins_data['area'];
          if(($ins_data['blood_grp'])=='select'){
            $st2 = array(
                'status' => '1',
              
            );

          }else{
          $st2 = array(
                'status' => '1',
                 
                'blood_grp' => $ins_data['blood_grp'] ,
            );
            }// get_details_search($arr, $table, $where, $query = null) 
          $rdata['report'] = $this->Db_model-> get_details_search(' `reg_id`, `name`, `age`, `dob`, `gender`, `address`, `phone`, `blood_grp`, `interested`, `donate`, `previous_date`, `status`,`area`', 'ragistration',$st2,$area);
          $_SESSION['report']=$rdata['report'];

          
        }
          $this->loadtemplate('pages/selectreports', 'template/template',$rdata);
       // $this->Fv_model->selectreports_val();

    }
    public function export(){
                        //load our new PHPExcel library
                $this->load->library('excel');
                //activate worksheet number 1
                $this->excel->setActiveSheetIndex(0);
                //name the worksheet
                $this->excel->getActiveSheet()->setTitle('test worksheet');
                //set cell A1 content with some text
                $this->excel->getActiveSheet()->setCellValue('A1', '#');
                $this->excel->getActiveSheet()->setCellValue('B1', 'Name');
                $this->excel->getActiveSheet()->setCellValue('D1', 'Age');
                $this->excel->getActiveSheet()->setCellValue('E1', 'Gender');
                $this->excel->getActiveSheet()->setCellValue('F1', 'DOB');
                $this->excel->getActiveSheet()->setCellValue('H1', 'Phone');
                $this->excel->getActiveSheet()->setCellValue('J1', 'Blood Group');
                $this->excel->getActiveSheet()->setCellValue('L1', 'Address');
                
                $this->excel->getActiveSheet()->setCellValue('O1', 'Area');
                $this->excel->getActiveSheet()->setCellValue('Q1', 'Interested');
                $this->excel->getActiveSheet()->setCellValue('R1', 'Donted Before');
                $this->excel->getActiveSheet()->setCellValue('T1', 'Previous Donated Date');
                //change the font size
                $this->excel->getActiveSheet()->getStyle('A1:U1')->getFont()->setSize(12);
                //make the font become bold
                $this->excel->getActiveSheet()->getStyle('A1:U1')->getFont()->setBold(true);
               // $this->excel->getActiveSheet()->getStyle('A1:Q1')->getFont()->cellColor('A1:Q1', 'F28A8C');
               $this->excel->getActiveSheet()->getStyle('A1:U1')->getFill()
->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
->getStartColor()->setARGB('FFF7CECE');
              // $this->excel->getActiveSheet()->getStyle('A2')->getFill()->getStartColor()->setRGB('FF0000');
               //$this->excel->getActiveSheet()->getStyle('A2')->getFill()->getStartColor()->getRGB();
                $this->excel->getActiveSheet()->mergeCells('B1:C1');
                $this->excel->getActiveSheet()->mergeCells('F1:G1');
                $this->excel->getActiveSheet()->mergeCells('H1:I1');
                $this->excel->getActiveSheet()->mergeCells('J1:K1');
                $this->excel->getActiveSheet()->mergeCells('L1:N1');
                $this->excel->getActiveSheet()->mergeCells('O1:P1');
                $this->excel->getActiveSheet()->mergeCells('R1:S1');
                $this->excel->getActiveSheet()->mergeCells('T1:U1');
                $this->excel->getActiveSheet()->mergeCells('A2:U2');

                //set aligment to center for that merged cell (A1 to D1)
                $this->excel->getActiveSheet()->getStyle('A1','B1','D1','E1','F1','H1','J1','L1','O1','R1','T1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                 // get all users in array formate
                /*if ($this->uri->segment(3)) {
                    $st2 = array(
                'status' => '1',
                'reg_id' => $this->uri->segment(3),
                );*/
                
               // $rdata['lists'] = $this->Db_model->get_details2(' `name`, `age`, `dob`, `gender`, `address`, `phone`, `blood_grp`, `interested`, `donate`, `previous_date`, `status`,`area`', 'ragistration');
                //$users = $this->userModel->get_users();
                if(isset($_SESSION['report'])){
                $rdata['report']=$_SESSION['report'];
                $c=2;$id=0;
                foreach($rdata['report'] as $d){
                   $c++;$id++;
                $this->excel->getActiveSheet()->setCellValue("A$c", $id);
                $this->excel->getActiveSheet()->setCellValue("B$c", $d['name']);
                $this->excel->getActiveSheet()->setCellValue("D$c", $d['age']);
                $this->excel->getActiveSheet()->setCellValue("E$c", $d['gender']);
                $this->excel->getActiveSheet()->setCellValue("F$c", $d['dob']);
                $this->excel->getActiveSheet()->setCellValue("H$c", $d['phone']);
                $this->excel->getActiveSheet()->setCellValue("J$c", $d['blood_grp']);
                $this->excel->getActiveSheet()->setCellValue("L$c", $d['address']);
                $this->excel->getActiveSheet()->setCellValue("O$c", $d['area']);
                $this->excel->getActiveSheet()->setCellValue("Q$c", $d['interested']);
                $this->excel->getActiveSheet()->setCellValue("R$c", $d['donate']);
                $this->excel->getActiveSheet()->setCellValue("T$c", $d['previous_date']);

                $this->excel->getActiveSheet()->mergeCells("B$c:C$c");
                $this->excel->getActiveSheet()->mergeCells("F$c:G$c");
                $this->excel->getActiveSheet()->mergeCells("H$c:I$c");
                $this->excel->getActiveSheet()->mergeCells("J$c:K$c");
                $this->excel->getActiveSheet()->mergeCells("L$c:N$c");
                $this->excel->getActiveSheet()->mergeCells("O$c:P$c");
                $this->excel->getActiveSheet()->mergeCells("R$c:S$c");
                $this->excel->getActiveSheet()->mergeCells("T$c:U$c");
                $this->excel->getActiveSheet()->getStyle("A$c:U$c")->getFill()
->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
->getStartColor()->setARGB('FFF7CECE');
$this->excel->getActiveSheet()->getStyle("A$c:U$c")->getFont()->setSize(10);

               // $this->excel->getActiveSheet()->getStyle("A$c:Q$c")->getFont()->setBold(true);

                //set aligment to center for that merged cell (A1 to D1)
                $this->excel->getActiveSheet()->getStyle("A$c","D$c","H$c")->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
               // }
            }
              
            }   

                $filename='bloodBank.xls'; //save our workbook as this file name
                header('Content-Type: application/vnd.ms-excel'); //mime type
                header('Content-Disposition: attachment;filename="'.$filename.'"'); //tell browser what's the file name
                header('Cache-Control: max-age=0'); //no cache
                            
                //save it to Excel5 format (excel 2003 .XLS file), change this to 'Excel2007' (and adjust the filename extension, also the header mime type)
                //if you want to save it as .XLSX Excel 2007 format
                $objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5');  
                //force user to download the Excel file without writing it to server's HD
                $objWriter->save('php://output');
                unset($_SESSION['report']);

    }

//    
   
   

   
   

    
    

    

   


   

   

}