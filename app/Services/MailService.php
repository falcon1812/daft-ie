<?php

namespace App\Services;


class MailService {

	public function sentNotification($url) {
		$from = new \SendGrid\Email("cool app you created", "test@geniac.com");
		$subject = "New flat! madafaka";
		$to = new \SendGrid\Email("Christian", "thefalcon1812@hotmail.com");
		$content = new \SendGrid\Content("text/html", "<a href='{$url}'>link</a>");
		$mail = new \SendGrid\Mail($from, $subject, $to, $content);

		$apiKey = env('SENDGRID_API_KEY');
		$sg = new \SendGrid($apiKey);

		return $sg->client->mail()->send()->post($mail);
	}
}