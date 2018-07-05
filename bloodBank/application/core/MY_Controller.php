<?php

class MY_Controller extends CI_Controller {

    function __construct() {

        parent::__construct();
//        echo "dsadf";
    }

    public function loadtemplate($page = null, $template = null, $rdata = null) {
        if ($this->session->userdata('logged_in')) {
            $data['header'] = $this->parser->parse('slices/header', $rdata, TRUE);
            $data['topnavbar'] = $this->parser->parse('slices/navbar', $rdata, TRUE);
            $data['menu'] = $this->parser->parse('slices/menu', $rdata, TRUE);
            $data['footer'] = $this->parser->parse('slices/footer', $rdata, TRUE);
            $data['jscript'] = $this->parser->parse('slices/jscript', $rdata, TRUE);
            $data['contents'] = $this->parser->parse($page, $rdata, TRUE);
            $this->parser->parse($template, $data);
        } else {
            $los = array(
                'url' => $this->uri->segment(1) . "/" . $this->uri->segment(2),
            );
            $this->session->set_flashdata($los);
            redirect('settings/login');
        }
    }

}

?>