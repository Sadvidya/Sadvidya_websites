<?php
defined('BASEPATH') or exit('No direct script access allowed');

require_once APPPATH . 'third_party/omnipay/vendor/autoload.php';
class Zoom_lib {
    public $CI;
    private $zoom_api_key = "";
    private $zoom_api_secret = "";

    public function __construct($api_keys = array()) {
        $this->CI = &get_instance();
        if (!empty($api_keys)) {
            $this->zoom_api_key = $api_keys['zoom_api_key'];
            $this->zoom_api_secret = $api_keys['zoom_api_secret'];
        }
    }

    function get_access_token($code)
    {
        try {
            $redirect_uri = base_url('live_class/zoom_OAuth');
            $key = $this->zoom_api_key;
            $secret = $this->zoom_api_secret;

            $client   = new GuzzleHttp\Client(['verify' => false, 'base_uri' => 'https://zoom.us']);
            $response = $client->request('POST', '/oauth/token', [
                "headers"     => [
                    "Authorization" => "Basic " . base64_encode($key . ':' . $secret),
                ],
                'form_params' => [
                    "grant_type"   => "authorization_code",
                    "code"         => $code,
                    "redirect_uri" => $redirect_uri,
                ],
            ]);
            $token = json_decode($response->getBody()->getContents(), true);
            return $token;
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function createMeeting($data = array(), $access_token = '')
    {
        $post_time = $data['date'] . ' ' . $data['start_time'];
        $start_time = gmdate("Y-m-d\TH:i:s", strtotime($post_time));
        $createAMeetingArray = array();
        $createAMeetingArray['topic'] = $data['title'];
        $createAMeetingArray['agenda'] = "";
        $createAMeetingArray['type'] = 2; //Scheduled
        $createAMeetingArray['start_time'] = $start_time;
        $createAMeetingArray['timezone'] = $data['setting']['timezone'];
        $createAMeetingArray['password'] = !empty($data['setting']['password']) ? $data['setting']['password'] : "";
        $createAMeetingArray['duration'] = !empty($data['duration']) ? $data['duration'] : 60;
        $createAMeetingArray['settings'] = array(
            'join_before_host' => !empty($data['setting']['join_before_host']) ? true : false,
            'host_video' => !empty($data['setting']['host_video']) ? true : false,
            'participant_video' => !empty($data['setting']['participant_video']) ? true : false,
            'mute_upon_entry' => !empty($data['setting']['option_mute_participants']) ? true : false,
            'enforce_login' => false,
            'auto_recording' =>  "none",
            'alternative_hosts' => "",
            'audio' => "both",
        );

        $request_url = 'https://api.zoom.us/v2/users/me/meetings';
        $headers = array(
            'authorization: Bearer ' . $access_token,
            'content-type: application/json',
        );
        $postFields = json_encode($createAMeetingArray);
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_URL, $request_url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $postFields);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $response = curl_exec($ch);
        $http_status = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        $err = curl_error($ch);
        curl_close($ch);
    
        return json_decode($response);
    }

    public function deleteMeeting($meeting_id, $access_token = '')
    {
        $request_url = 'https://api.zoom.us/v2/meetings/' . $meeting_id;
        $headers = array(
            'authorization: Bearer ' . $access_token,
            'content-type: application/json',
        );
        $get_param = array('meetingId' => $meeting_id);
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_URL, $request_url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'DELETE');
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $response = curl_exec($ch);
        $http_status = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        $err = curl_error($ch);
        curl_close($ch);
        if (!$response) {
            return false;
        }
        return json_decode($response);
    }
}