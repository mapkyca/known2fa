<?php

    namespace IdnoPlugins\TwoFactorAuth\Pages {

        class Settings extends \Idno\Common\Page
        {

            function getContent()
            {
                $this->gatekeeper(); // Logged-in users only
                $t = \Idno\Core\site()->template();
                $body = $t->__(['login_url' => $login_url])->draw('twofactorauth/settings');
                $t->__(['title' => 'Enable 2FA', 'body' => $body])->drawPage();
            }

            function postContent() {
                $this->gatekeeper(); // Logged-in users only
                
                $session = \Idno\Core\site()->session(); 
                $user = $session->currentUser(); 
                
                switch ($this->getInput('action')) {
		    
		    case 'enable' : 
			$user->twofactorauth_seed = \IdnoPlugins\TwoFactorAuth\Google2FA::generate_secret_key();
			$user->twofactorauth_enabled = true;
			break;
		    case 'disable' :
			$user->twofactorauth_enabled = false;
			break;
		}
		
		$user->save();
		
                $this->forward('/account/twofactorauth/');
            }

        }

    }