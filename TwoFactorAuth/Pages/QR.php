<?php
namespace IdnoPlugins\TwoFactorAuth\Pages {

        class QR extends \Idno\Common\Page
        {

            public function getContent() {
		
		require_once(dirname(dirname(__FILE__)) . '/Vendor/QR-Generator-PHP-master/php/qr.php');
		
	    }

        }

    }