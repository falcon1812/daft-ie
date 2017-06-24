<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Flats;
use App\Services\MailService;

class ExampleController extends Controller
{
	/**
	 * @var MailService
	 */
	private $mail_service;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(MailService $mailService)
    {
    	$this->mail_service = $mailService;
    }

    public function sendNotification(Request $request)
    {
    	$everything = isset($request->all()['data']) ? $request->all()['data'] : [];
	    foreach ($everything as $url) {
		    $exist = Flats::where("url", $url)->first();
		    if (empty($exist) || is_null($exist)) {
			    $new = new Flats(["url" => $url]);
			    $this->mail_service->sentNotification($url);
			    $new->save();
		    }
	    }

    	return Flats::all();
    }
}
