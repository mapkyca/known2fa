<?php
namespace IdnoPlugins\TwoFactorAuth\Pages {

        class QR extends \Idno\Common\Page
        {

            public function getContent() {
		
		$this->setInput('t', 'png'); // We want the library to return PNG
		$this->setInput('e', 'M'); // Error correction
		
		require_once(dirname(dirname(__FILE__)) . '/Vendor/QR-Generator-PHP-master/php/qr.php');
		
	    }

        }

    }