<?php
	use Acme\HelloBundle\Mailer

	$mailer = new Mailer('sendmail');
	$mailer->send('ryan@foobar.net', ...);