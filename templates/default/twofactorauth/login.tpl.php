<div class="row">
    <div class="col-md-6 col-md-offset-3 well text-center">

		<h2 class="text-center welcome"><?php echo \Idno\Core\Idno::site()->language()->_('Welcome back!'); ?></h2>

        <h3 class="text-center">
            <?php echo \Idno\Core\Idno::site()->language()->_('Sign in'); ?>
        </h3>

        <form action="<?= \Idno\Core\site()->config()->url ?>session/login" method="post">
	    <input type="hidden" name="email" value="<?= $vars['email']; ?>" />
	    <input type="hidden" name="password" value="<?= $vars['password']; ?>" />
	    <input type="hidden" name="fwd" value="<?= $vars['fwd']; ?>" />
	    

	    
            <div class="control-group">
                <div class="controls">
                   
		    <p><?php echo \Idno\Core\Idno::site()->language()->_('This account requires Two Factor Authentication, please use a tool such as Google Authenticator to generate your access code:'); ?></p>
		    <input type="number" id="input2FA" name="2fa" placeholder="<?php echo \Idno\Core\Idno::site()->language()->_('2fa Code'); ?>" autofocus>
		    
                </div>
            </div>
            
            <div class="control-group">
                <div class="controls">
                    <button type="submit" class="btn btn-signin"><?php echo \Idno\Core\Idno::site()->language()->_('Continue...'); ?></button>
                </div>
            </div>
            
            <?= \Idno\Core\site()->actions()->signForm('/session/login') ?>
        </form>

    </div>
</div>
