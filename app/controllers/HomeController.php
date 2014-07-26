<?php

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	protected $layout = 'layouts.main';
	protected $chikkaClientId = '';
	protected $chikkaSecretKey = '';
	protected $chikkaUrl = 'https://post.chikka.com/smsapi/request';

	public function showWelcome()
	{
		return View::make('hello');
	}

	public function index()
	{
		return View::make('landing_page');
	}

	public function dashboard()
	{
		return View::make('dashboard');
	}

	public function sms()
	{
		return View::make('sms');
	}

	public function smsSubmit()
	{
		$contactNumber = Input::get('contact_number');
		$contactName = Input::get('contact_name');

		$smsRecipients = new SmsRecipients;
		$smsRecipients->name = $contactName;
		$smsRecipients->mobile_number = $contactNumber;
		$smsRecipients->user_id = 1;
		$smsRecipients->updated_at     = time();

		if ($smsRecipients->save()) {
			return Redirect::to('/sms')
                ->with('message', '<strong>Success! </strong> You have sucessfully configured your SMS recipients.')
                ->with('type', 'success');
		} else {
			return Redirect::to('/sms')
                ->with('message', '<strong>Ooops! </strong> Something went wrong. Please try again.')
                ->with('type', 'danger');
		}

	}

	public function chikkaReceiver()
	{
		try {
			$messageType = Input::get("message_type");
		} catch (Exception $e) {
			echo "Error";
			exit;
		}

		if ($messageType == 'incoming') {
			try {
				$message = $_POST["message"];
		        $mobileNumber = $_POST["mobile_number"];
		        $shortCode = $_POST["shortcode"];
		        $requestId = $_POST["request_id"];
		        $timestamp = $_POST["timestamp"];

		        $smsTracker = new SmsTracker;
		        $smsTracker->message_type = $messageType;
		        $smsTracker->mobile_number = $mobileNumber;
		        $smsTracker->shortcode = $shortCode;
		        $smsTracker->request_id = $requestId;
		        $smsTracker->message = $message;
		        $smsTracker->timestamp = $timestamp;

		        if ($smsTracker->save()) {
		        	echo "Accepted";
		        	exit;
		        } else {
		        	echo "Error";
		        	exit;
		        }

		        exit;
			} catch (PDOException $e) {
				echo "Error";

				exit;
			}
		} else {
			echo "Error";
			exit;
		}
	}
}
