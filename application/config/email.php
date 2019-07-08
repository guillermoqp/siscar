<?php defined('BASEPATH') OR exit('No direct script access allowed.');
$config=array(
	"useragent"=>"PHPMailer",
	"protocol"=>"smtp",
	"mailpath"=>"C:\xampp\mailtodisk\mailtodisk.exe",
	"smtp_host"=>"smtp.gmail.com",
	"smtp_user"=>"everis.car.trujillo@gmail.com",
	"smtp_pass"=>"Everis2017$$",
	"smtp_port"=>587,
	"smtp_timeout"=>30,
	"smtp_crypto"=>"tls",
	"smtp_debug"=>0,
	"smtp_auto_tls"=>false,
	"smtp_conn_options"=>array(
					"ssl"=>array(
					"verify_peer"=>false,
					"verify_peer_name"=>false,
					"allow_self_signed"=> true
				)),
	"wordwrap"=>true,
	"wrapchars"=>76,
	"mailtype"=>"html",
	"charset"=>"UTF-8",
	"validate"=>true,
	"priority"=>3,
	"crlf"=>"\n",
	"newline"=>"\r\n",
	"bcc_batch_mode"=>false,
	"bcc_batch_size"=>200,
	"encoding"=>"8bit",
	"dkim_domain"=>"",
	"dkim_private"=>"",
	"dkim_selector"=>"",
	"dkim_passphrase"=>"",
	"dkim_identity"=>""
);
/* 
useragent // Mail engine switcher: 'CodeIgniter' or 'PHPMailer'
protocol   // 'mail', 'sendmail', or 'smtp'
smtp_timeout 	 // (in seconds)
smtp_debug // PHPMailer's SMTP debug info level: 0 = off, 1 = commands, 2 = commands and data, 3 = as 2 plus connection status, 4 = low level data output.
smtp_auto_tls  // Whether to enable TLS encryption automatically if a server supports it, even if `smtp_crypto` is not set to 'tls'.
smtp_conn_options  // SMTP connection options, an array passed to the function stream_context_create() when connecting via SMTP.
mailtype  // 'text' or 'html'
charset // 'UTF-8', 'ISO-8859-15', ...; NULL (preferable) means config_item('charset'), i.e. the character set of the site.
priority   // 1, 2, 3, 4, 5; on PHPMailer useragent NULL is a possible option, it means that X-priority header is not set at all, see https://github.com/PHPMailer/PHPMailer/issues/449
crlf  // "\r\n" or "\n" or "\r"
newline // "\r\n" or "\n" or "\r"
encoding // The body encoding. For CodeIgniter: '8bit' or '7bit'. For PHPMailer: '8bit', '7bit', 'binary', 'base64', or 'quoted-printable'
dkim_domain // DKIM signing domain name, for exmple 'example.com'.
dkim_private   // DKIM private key file path.
dkim_selector 	// DKIM selector.
dkim_passphrase   // DKIM passphrase, used if your key is encrypted.
dkim_identity // DKIM Identity, usually the email address used as the source of the email.
*/