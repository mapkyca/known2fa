<?php
namespace IdnoPlugins\TwoFactorAuth\Pages {

        class Login extends \Idno\Pages\Session\Login
        {

            function postContent() {
		
		// Get user
		if ($user = \Idno\Entities\User::getByHandle($this->getInput('email'))) {
		} else if ($user = \Idno\Entities\User::getByEmail($this->getInput('email'))) {
		} else {
		    \Idno\Core\site()->triggerEvent('login/failure/nouser', ['method' => 'password', 'credentials' => ['email' => $this->getInput('email')]]);
		    $this->setResponse(401);
		}
		
		if (!$user->twofactorauth_enabled) {
		    // Two factor not enabled, so go through the usual stuff
		    return parent::postContent();
		}
		else 
		{
		    if ($this->getInput('email') && !$this->getInput('2fa')) {
			// Display 2fa
			if (\Idno\Core\site()->session()->isLoggedOn()) {
			    $this->forward();
			}

			$t        = \Idno\Core\site()->template();
			$t->body  = $t->__([
			    'email' => $this->getInput('email'),
			    'password' => $this->getInput('password'),
			    'fwd' => $this->getInput('fwd'),
			])->draw('twofactorauth/login');
			$t->title = 'Sign in: 2fa';
			$t->drawPage();

		    } else {

			// Validate login including 2fa
			$iv = $user->twofactorauth_seed;
			if (!$iv) {
			    \Idno\Core\site()->session()->addMessage("User has no seed value, this shouldn't happen.", 'alert-error');
			    $this->setResponse(500); 
			    exit();
			}

			// Get and validate code
			if (\IdnoPlugins\TwoFactorAuth\Google2FA::verify_key($iv, $this->getInput('2fa'))) {
			    return parent::postContent(); // 2fa ok, now bounce through the standard login
			} else {
			    \Idno\Core\site()->session()->addMessage("Oops! It looks like your validation code wasn't valid, please try again!");
			    \Idno\Core\site()->triggerEvent('login/failure', ['user' => $user]);
			    $this->forward($_SERVER['HTTP_REFERER']);
			}

		    }

		}
		
            }

        }

    }