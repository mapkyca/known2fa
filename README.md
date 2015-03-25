Two Factor Authentication
=========================

This plugin provides Two Factor Authentication (2fa) support for Known user logins.

Two factor authentication provides extra security to your known account by requiring you to provide an extra authentication code via 
a program on your phone (such as Google Authenticator). This means that even if someone guesses your password, they would also need to
have your phone in order to enter the pin.

Installation
------------

Install the plugin via the usual way.

The plugin must then be enabled on a user by user basis via each user's settings page. Activating two factor will generate a unique code and a QR code to scan.

Regeneration
------------

Deactivating and reactivating 2fa will regenerate the access code, so be sure to update your authenticator account if you do this!

Uses
----
 * The Google 2FA authenticator module written by Phil from idontplaydarts.com <http://www.idontplaydarts.com/2011/07/google-totp-two-factor-authentication-for-php/>
 * Local QR generation code by Terence Eden <https://github.com/edent/QR-Generator-PHP>

See
---
 * Author: Marcus Povey <http://www.marcus-povey.co.uk> 
