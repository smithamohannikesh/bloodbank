<?php

class Pushnotification extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->helper(array('date', 'url'));
        $this->load->library('curl');
    }

//  notification code functions 
//  please call sendnotification with employee_id and message as the parameter to get push messages



    public function sendnotification($username, $msg) {
        $ins = $this->getdeviceinfo($username); // pass employee_id to get device details 
        //        ``, `fk_device`, `message`, `delivery`, `status`, `created`, `modified` 
        foreach ($ins as $value) {
            $device_id = $value['id'];
            if ($value['deviceos'] == "IOS") {

                if ($value['development'] == 'development') {
                    $msg = $msg;
                    $passphrase = "RBaddi123";  //specify passphrase here RBaddi123
                    $device_type = "0";
                } else if ($value['development'] == 'production') {
                    $msg = $msg;
                    $passphrase = "macintosh"; //specify passphrase here RBaddi123
                    $device_type = "1";
                }
//pass first variable device tocken
                $this->send_notification_iphone($device_id, $value['devicetoken'], $passphrase, $msg, $device_type);
            } else if ($value['deviceos'] == "android") {
                $gcm = array('414054823351'); // array of gcm id  
//pass first variabel as array of gcm reg id which neeed to add into the db 
                $this->send_notification_android($device_id, $gcm, $msg);
            }
        }
    }

    public function send_notification_iphone($device_id, $devicetoken, $passphrase, $msg, $device_type) {
        $deviceToken = $devicetoken;
//        $passphrase = $passphrase;
//        $device_id=$device_id;
        $message = $msg;
        $device_type = $device_type;
        $ctx = stream_context_create();
        if ($device_type == "1") { //production
            stream_context_set_option($ctx, 'ssl', 'local_cert', FCPATH . 'production/ck.pem');
        } else if ($device_type == "0") { //developer
            stream_context_set_option($ctx, 'ssl', 'local_cert', FCPATH . 'development/ck.pem');
        }
        stream_context_set_option($ctx, 'ssl', 'passphrase', $passphrase);
        stream_context_set_option($ctx, 'ssl', 'cafile', FCPATH . 'entrust_2048_ca.cer');
        $fp = stream_socket_client('ssl://gateway.push.apple.com:2195', $err, $errstr, 60, STREAM_CLIENT_CONNECT | STREAM_CLIENT_PERSISTENT, $ctx);
        if (!$fp) {
            exit("Failed to connect: $err $errstr" . PHP_EOL);
            echo 'Failed to connect' . PHP_EOL;
        } else {
            echo 'Connected to APNS' . PHP_EOL;
        }

        $body['aps'] = array(
            'alert' => array(
                'body' => $message,
                'action-loc-key' => 'Bango App',
            ),
            'badge' => 2,
            'sound' => 'default',
        );
        $payload = json_encode($body);

        $msg = chr(0) . pack('n', 32) . pack('H*', $deviceToken) . pack('n', strlen($payload)) . $payload;
        $result = fwrite($fp, $msg, strlen($msg));

        if (!$result) {
            $insert['status'] = 'queued';
            echo 'Message not delivered' . PHP_EOL;
        } else {

            $insert['status'] = 'delivered';
            echo 'Message successfully delivered' . PHP_EOL;
        }
        $insert['message'] = str_replace("\\", "", $message);

        $insert['fk_device'] = $device_id;
        $insert['delivery'] = date("Y-m-d h:i:s");
        $insert['created'] = date("Y-m-d h:i:s");
        $this->db->insert('pns_messages', $insert);
    }

    public function send_notification_android($device_id, $regids, $message) {
        // specify api key of your app
        define("GOOGLE_API_KEY", "AIzaSyDxcmwNrC76Q8D8WPoDAmkPlwsaZrZnd4U");
        $msg = $message;
        $message = array("price" => $message);
        $url = 'https://android.googleapis.com/gcm/send';
        $fields = array(
            'registration_ids' => $regids, //array('414054823351'),
            'data' => $message,
        );
        $headers = array(
            'Authorization: key=' . GOOGLE_API_KEY,
            'Content-Type: application/json'
        );
// Open connection 
        $ch = curl_init();
// Set the url, number of POST vars, POST data
        $this->curl->option($ch, CURLOPT_URL, $url);
        $this->curl->option($ch, CURLOPT_POST, true);
        $this->curl->option($ch, CURLOPT_HTTPHEADER, $headers);
        $this->curl->option($ch, CURLOPT_RETURNTRANSFER, true);
        $this->curl->option($ch, CURLOPT_SSL_VERIFYPEER, false);
        $this->curl->option($ch, CURLOPT_POSTFIELDS, json_encode($fields));
        $this->curl->execute();
//        curl_setopt($ch, CURLOPT_URL, $url);
////        $data = $this->curl->execute();
//        curl_setopt($ch, CURLOPT_POST, true);
//        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
//        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//// Disabling SSL Certificate support temporarly
//        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
//        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
//        echo json_encode($fields);
//// Execute post
//        $result = curl_exec($ch);
        if ($result === FALSE) {
            $insert['status'] = 'failed';
            die('Curl failed: ' . curl_error($ch));
        } else {
            $insert['status'] = 'delivered';
        }

        curl_close($ch);
        $insert['message'] = str_replace("\\", "", $msg);
        $insert['fk_device'] = $device_id;
        $insert['delivery'] = date("Y-m-d h:i:s");
        $insert['created'] = date("Y-m-d h:i:s");
        $this->db->insert('pns_messages', $insert);
        echo $result;
    }

    public function getdeviceinfo($username) {

        $this->db->select('tbl_device_details.id,user_id, appversion,development, deviceuid, devicetoken, devicemodel, deviceos, last_updated');
        $this->db->from('tbl_users');
        $this->db->join('tbl_device_details', 'device_details.user_id=tbl_users.user_id');
        $this->db->where('username', $username);
        $this->db->order_by('device_details.id', 'desc');
        $result = $this->db->get();
        $show = $result->result_array();
        return $show;
    }

}
