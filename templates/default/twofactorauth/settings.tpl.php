<?php
$session = \Idno\Core\site()->session();
$user = $session->currentUser();
?>
<div class="row">

    <div class="col-md-10 col-md-offset-1">
        <h1><?php echo \Idno\Core\Idno::site()->language()->_('Two Factor Authentication'); ?></h1>
	<?= $this->draw('account/menu') ?>
    </div>

</div>
<div class="row">
    <div class="col-md-10 col-md-offset-1">
        <form action="/account/twofactorauth/" class="form-horizontal" method="post">

            <div class="control-group">
                <div class="controls">

		    <?php if (!$user->twofactorauth_enabled) { ?>
			<p>
    			    <?php echo \Idno\Core\Idno::site()->language()->_('Two factor authentication is a way of adding extra security to your account. Before you can use it you\'ll need a authentication tool such as Google Authenticator for your phone.'); ?>
    			</p>
                        <p>
    			<input type="hidden" name="action" value="enable" />
                            <input type="submit" class="btn btn-success" value="<?php echo \Idno\Core\Idno::site()->language()->_('Enable Two Factor Authentication (recommended)'); ?>" />
                        </p>
		    <?php } else { ?>
    		    <div class="explanation">
    			<p>
    			    <?php echo \Idno\Core\Idno::site()->language()->_('Please use the following seed value <strong>%s</strong>, or point your authenticator (e.g. Google Authenticator) at the following QR code.', [$user->twofactorauth_seed]); ?>
    			</p>
    			<p>
			    <?php if (\Idno\Core\site()->currentPage()->isSSL()) { ?>
				<img src="<?=\Idno\Core\site()->config()->getDisplayURL()?>twofactorauth/qr.png?size=200&d=<?= urlencode('otpauth://totp/' . $user->email . "?secret=" . $user->twofactorauth_seed . '&issuer=' . urlencode(\Idno\Core\site()->config()->title)); ?>" />
			    <?php } else { ?>
				<img src="https://chart.googleapis.com/chart?chs=200x200&chld=M|0&cht=qr&chl=<?= urlencode('otpauth://totp/' . $user->email . "?secret=" . $user->twofactorauth_seed . '&issuer=' . urlencode(\Idno\Core\site()->config()->title)); ?>" />
			    <?php } ?>
    			</p>
    		    </div>
    		    <p>
    			<input type="hidden" name="action" value="disable" />
                            <input type="submit" class="btn btn-danger" value="<?php echo \Idno\Core\Idno::site()->language()->_('Disable Two Factor Authentication'); ?>" />
                        </p>
		    <?php } ?>
                </div>
            </div>


	    <?= \Idno\Core\site()->actions()->signForm('/account/twofactorauth/') ?>
        </form>
    </div>
</div>
