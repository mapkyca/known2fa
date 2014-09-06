<?php

    
    namespace IdnoPlugins\TwoFactorAuth {
	
        class Main extends \Idno\Common\Plugin {
            function registerPages() {     

		// Register an account menu
                \Idno\Core\site()->template()->extendTemplate('account/menu/items','twofactorauth/menu');
                
                
                // Register the callback URL
                 \Idno\Core\site()->addPageHandler('account/twofactorauth','\IdnoPlugins\TwoFactorAuth\Pages\Settings');
		 
		 // Replace login
		 \Idno\Core\site()->addPageHandler('/session/login', '\IdnoPlugins\TwoFactorAuth\Pages\Login', true);
                 
            }
        }
    }
