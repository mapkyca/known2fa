<?php
$session = \Idno\Core\site()->session();
$user = $session->currentUser();
?>
<div class="row">

    <div class="span10 offset1">
        <h1>Post via Email</h1>
	<?= $this->draw('account/menu') ?>
    </div>

</div>
<div class="row">
    <div class="span10 offset1">
        <form action="/account/twofactorauth/" class="form-horizontal" method="post">

            <div class="control-group">
                <div class="controls">

		    <?php if (!$user->twofactorauth_enabled) { ?>
                        <p>
    			<input type="hidden" name="action" value="enable" />
                            <input type="submit" class="btn btn-large btn-success" value="Enable Two Factor Authentication (recommended)" />
                        </p>
		    <?php } else { ?>
    		    <div class="explanation">
    			<p>
    			    Please use the following seed value <strong><?= $user->twofactorauth_seed; ?></strong>, or point your authenticator (e.g. Google Authenticator) at the following QR code.
    			</p>
    			<p>
			    <img src="https://chart.googleapis.com/chart?chs=200x200&chld=M|0&cht=qr&chl=<?= urlencode('otpauth://totp/' . $user->email . "?secret=" . $user->twofactorauth_seed . '&issuer=' . urlencode(\Idno\Core\site()->config()->title)); ?>" />
    			</p>
    		    </div>
    		    <p>
    			<input type="hidden" name="action" value="disable" />
                            <input type="submit" class="btn btn-large btn-danger" value="Disable Two Factor Authentication" />
                        </p>
		    <?php } ?>
                </div>
            </div>


	    <?= \Idno\Core\site()->actions()->signForm('/account/twofactorauth/') ?>
        </form>
    </div>
</div>