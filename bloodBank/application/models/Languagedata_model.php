<?php

class Languagedata_model extends CI_Model {

    var $data;

//--------------------------------------------------------------------
    public function getLanguageData($array) {
        foreach ($array as $value) {
            $this->data[$value] = $this->lang->line($value);
        }
        return $this->data;
    }

    public function getOneLang($value) {
        $value = $this->lang->line($value);
        return $value;
    }

}

?>
