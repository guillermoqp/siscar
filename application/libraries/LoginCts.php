<?php Class LoginCts{
    public function  __construct() {
        log_message('debug', "LoginCts Class Initialized");
    }
    public function object_to_array($data) {
        if (is_array($data) || is_object($data)) {
            $result = array();
            foreach ($data as $key => $value) {
                $result[$key] = object_to_array($value);
            }
            return $result;
        }
        return $data;
    }
    private function login($login,$password) {
        try {
            $ch = curl_init();
            if (FALSE === $ch)
                throw new Exception('failed to initialize');
            $data=array('login'=>$login,'password'=>$password);                                                                    
            $data_string=json_encode($data);  
            $ch=curl_init();
            curl_setopt($ch,CURLOPT_URL,"https://cts.everis.int/rest/user/login");
            curl_setopt($ch,CURLOPT_POST,1);
            curl_setopt($ch,CURLOPT_POSTFIELDS,$data_string);
            curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
            curl_setopt($ch,CURLOPT_SSL_VERIFYHOST,FALSE);
            curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,FALSE);
            $headers = [
                'Accept:application/json, text/plain, */*',
                'Accept-Encoding:gzip, deflate, br',
                'Accept-Language:es-ES,es;q=0.8',
                'Connection:keep-alive',
                'Content-Length:45',
                'Content-Type:application/json',
                'Host:cts.everis.int',
                'Origin:https://cts.everis.int',
                'Referer:https://cts.everis.int/launcher/login', 
                'User-Agent:Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36'
            ];
            curl_setopt($ch,CURLOPT_HTTPHEADER,$headers);
            $info=curl_getinfo($ch);
            $content=curl_exec($ch);
            $response=object_to_array(json_decode($content));
            if (FALSE===$content)
                throw new Exception(curl_error($ch),curl_errno($ch));
        } catch(Exception $e) {
            trigger_error(sprintf("Curl failed with error #%d: %s",$e->getCode(),$e->getMessage()),E_USER_ERROR);
            log(sprintf("Curl failed with error #%d: %s",$e->getCode(),$e->getMessage()),E_USER_ERROR);
        }
    }
}