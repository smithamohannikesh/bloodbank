<?php

class Mail_model extends CI_Model {

//--------------------------------------------------------------------
    public function sendMail($from, $name, $to, $cc, $bcc, $subject, $msg) {
        $config = Array(
            'protocol' => 'sendmail',
            'mailpath' => '/usr/sbin/sendmail',
            'charset' => 'iso-8859-1',
            'mailtype' => 'html',
            'wordwrap' => TRUE
        );
        $this->load->library('email');
        $this->email->initialize($config);

        $this->email->from($from, $name);
        $this->email->to($to);
        if ($cc != '')
            $this->email->cc($cc);
        if ($bcc != '')
            $this->email->bcc($bcc);

        $this->email->subject($subject);
        $this->email->message($msg);

        $this->email->send();
    }

    public function sendMail2($from, $name, $to, $cc, $bcc, $subject, $msg) {
        $config = Array(
            'protocol' => 'sendmail',
            'mailpath' => '/usr/sbin/sendmail',
            'charset' => 'iso-8859-1',
            'mailtype' => 'html',
            'wordwrap' => TRUE
        );
        $this->load->library('email');
        $this->email->initialize($config);
        $this->email->from($from, $name);
        $this->email->to($to);
        if ($cc != '')
            $this->email->cc($cc);
        if ($bcc != '')
            $this->email->bcc($bcc);
        $this->email->subject($subject);
        $this->email->message($msg);
        $this->email->send();
    }

    public function sendMailattachment($from, $name, $to, $cc, $bcc, $subject, $msg, $atchmnt) {
        $config = Array(
            'protocol' => 'sendmail',
            'mailpath' => '/usr/sbin/sendmail',
            'charset' => 'iso-8859-1',
            'mailtype' => 'html',
            'wordwrap' => TRUE
        );
        $this->load->library('email');
        $this->email->initialize($config);
        $this->email->from($from, $name);
        $this->email->to($to);
        if ($cc != '')
            $this->email->cc($cc);
        if ($bcc != '')
            $this->email->bcc($bcc);

        $this->email->subject($subject);
        $this->email->message($msg);
        for ($i = 0; $i < sizeof($atchmnt); $i++) {
            //echo $atchmnt[$i]; mailattachment

            $this->email->attach(APPPATH . 'mailattachment/' . $atchmnt[$i]);
//            echo APPPATH . 'mailattachment/' . $atchmnt[$i];
        }


        return $this->email->send();
    }

}

?>
