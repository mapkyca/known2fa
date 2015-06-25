<div class="row">
    <div class="col-md-6 col-md-offset-3 well text-center">

		<h2 class="text-center welcome">Welcome back!</h2>

        <h3 class="text-center">
            Sign in
        </h3>

        <form action="<?= \Idno\Core\site()->config()->url ?>session/login" method="post">
	    <input type="hidden" name="email" value="<?= $vars['email']; ?>" />
	    <input type="hidden" name="password" value="<?= $vars['password']; ?>" />
	    <input type="hidden" name="fwd" value="<?= $vars['fwd']; ?>" />
	    
	    
	    
            <div class="control-group">
                <div class="controls">
                   
		    <p>This account requires Two Factor Authentication, please use a tool such as Google Authenticator to generate your access code:
			<input type="text" id="input2FA" name="2fa" placeholder="2fa Code"
                           class="col-md-4">
		    </p>
		    
                </div>
            </div>
            
            <div class="control-group">
                <div class="controls">
                    <button type="submit" class="btn btn-signin">Continue...</button>
                </div>
            </div>
            
            <?= \Idno\Core\site()->actions()->signForm('/session/login') ?>
        </form>

    </div>
</div>