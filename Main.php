<?php

namespace IdnoPlugins\TwoFactorAuth {

    class Main extends \Idno\Common\Plugin {

        function registerTranslations()
        {
            \Idno\Core\Idno::site()->language()->register(
               new \Idno\Core\GetTextTranslation(
                   'twofactorauth', dirname(__FILE__) . '/languages/'
               )
            );
        } // , FILE_APPEND

	function registerPages() {

	    // Register an account menu
	    \Idno\Core\Idno::site()->template()->extendTemplate('account/menu/items', 'twofactorauth/menu');


	    // Register the callback URL
	    \Idno\Core\Idno::site()->routes()->addRoute('account/twofactorauth', '\IdnoPlugins\TwoFactorAuth\Pages\Settings');

	    // Replace login
	    \Idno\Core\Idno::site()->routes()->addRoute('/session/login', '\IdnoPlugins\TwoFactorAuth\Pages\Login', true);

	    // QR Code
	    \Idno\Core\Idno::site()->routes()->addRoute('/twofactorauth/qr\.png', '\IdnoPlugins\TwoFactorAuth\Pages\QR', true);
	}

    }

}
