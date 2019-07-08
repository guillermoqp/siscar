<?php if ( ! defined("BASEPATH")) exit("No direct script access allowed"); 
Class Emailnotificaciones_cls {
    private $emailSISCAR="";
    private $usuarioEmailSISCAR="";
    public function  __construct() {
        $this->CI=&get_instance();
        $this->CI->load->library("email");
        $this->emailSISCAR=$this->CI->config->item("emailSISCAR");
        $this->usuarioEmailSISCAR=$this->CI->config->item("usuarioEmailSISCAR");
    }
    public function enviar_mail_reestablecer_password($destinatarios,$asunto,$cuerpo){
        $body=$this->CI->load->view("template/email/email1",$cuerpo,TRUE);
        $body=preg_replace('/\\\\/',"",$body);
        $result=$this->CI->email
                    ->from($this->emailSISCAR,$this->usuarioEmailSISCAR)
                    ->reply_to($this->emailSISCAR)
                    ->to($destinatarios)
                    ->subject($asunto)
                    ->message($body)
                    ->send();
        if ($result) {
            return true;
        } else {
            return false;
        }
    }
    public function enviar_mail_demanda_prevision($destinatarios,$asunto,$cuerpo) {
        $body=$this->CI->load->view("template/email/email2",$cuerpo,TRUE);
        $body=preg_replace('/\\\\/',"",$body);
        $result=$this->CI->email
                    ->from($this->emailSISCAR,$this->usuarioEmailSISCAR)
                    ->reply_to($this->emailSISCAR)
                    ->to($destinatarios)
                    ->subject($asunto)
                    ->message($body)
                    ->send();
        if ($result) {
            return true;
        } else {
            return false;
        }
    }
}