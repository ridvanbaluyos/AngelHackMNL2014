<?php

class HomeController extends BaseController
{
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

<<<<<<< HEAD
    protected $layout = 'layouts.main';

    // Chikka
    protected $chikkaClientId = '6ec9c69f01b3e4dceaef421c4165333c16379e0a7b63ab5a15cb405bb57316ff';
    protected $chikkaSecretKey = '16dc740ecb04243f40117cf6e7294977b6c3771c4563dfbaada625d42b3f5636';
    protected $chikkaUrl = 'https://post.chikka.com/smsapi/request';
    protected $chikkaShortCode = '2929088888';

    // Facebook
    protected $fbAppId = '661273323957204';
    protected $fbAppSecret = '7c8e2576289273b16f808b993e045196';
    protected $fbAccessToken = '';

    public function showWelcome()
    {
        return View::make('hello');
    }

    public function index()
    {
        return View::make('landing_page');
    }

    public function requestBetaPass()
    {
        $email = Input::get("email");

        return View::make('landing_page');
    }

    public function dashboard()
    {
        return View::make('dashboard');
    }

    public function sms()
    {
        $templateData['recipients'] = SmsRecipients::where('user_id', '=', '1')
                        ->get();

        return View::make('sms')->with('templateData', $templateData);
    }

    public function smsSubmit()
    {
        $contactNumber = e(Input::get('contact_number'));
        $contactName = e(Input::get('contact_name'));

        $smsRecipients = new SmsRecipients();
        $smsRecipients->name = $contactName;
        $smsRecipients->mobile_number = $contactNumber;
        $smsRecipients->user_id = 1;
        $smsRecipients->updated_at     = time();

        if ($smsRecipients->save()) {
            return Redirect::to('/sms')
=======
	protected $layout = 'layouts.main';

	// Chikka
	protected $chikkaClientId = '';
	protected $chikkaSecretKey = '';
	protected $chikkaUrl = 'https://post.chikka.com/smsapi/request';
	protected $chikkaShortCode = '2929088888';

	// Facebook
	protected $fbAppId = '';
	protected $fbAppSecret = '';
	protected $fbAccessToken = '';

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
		$templateData['recipients'] = SmsRecipients::where('user_id', '=', '1')
						->get();
		return View::make('sms')->with('templateData', $templateData);
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
>>>>>>> 75dffd668592c57e60e06614bf203cd6e05dd66e
                ->with('message', '<strong>Success! </strong> You have sucessfully configured your SMS recipients.')
                ->with('type', 'success');
        } else {
            return Redirect::to('/sms')
                ->with('message', '<strong>Ooops! </strong> Something went wrong. Please try again.')
                ->with('type', 'danger');
        }
    }

    public function email()
    {
        $templateData['recipients'] = EmailRecipients::where('user_id', '=', '1')
                                        ->get();

        // $email = 'ridvan@baluyos.net';
        // $data = array(
        //     'recipient' => $email,
        //     'plateNumber' => 'KVM213'
        // );

        // Mailgun::send('emails.message', $data, function($message) use ($email)
        // {
        //     $message->to($email)->subject('alert - Message from Angel');
        // });
        return View::make('email')->with('templateData', $templateData);
    }

    public function emailSubmit()
    {
        $email = e(Input::get('email'));
        $name = e(Input::get('name'));

        $emailRecipients = new EmailRecipients();
        $emailRecipients->email = $email;
        $emailRecipients->name = $name;
        $emailRecipients->user_id = 1;
        $emailRecipients->updated_at     = time();

        if ($emailRecipients->save()) {
            return Redirect::to('/email')
                ->with('message', '<strong>Success! </strong> You have sucessfully configured your Email recipients.')
                ->with('type', 'success');
        } else {
            return Redirect::to('/email')
                ->with('message', '<strong>Ooops! </strong> Something went wrong. Please try again.')
                ->with('type', 'danger');
        }
    }

    public function socialNetworks()
    {
        $templateData = array();

        $app = array(
            "appId" => $this->fbAppId,
            "secret" => $this->fbAppSecret
        );

        $permissions = 'publish_stream';
        $url_app = 'http://angelhack.local/social-networks';

        FacebookConnect::getFacebook($app);
        $user = FacebookConnect::getUser($permissions, $url_app);
        $isFbAuthorized = ($user['user_profile']['verified']) ? true : false;

// echo "<pre>";
// 		var_dump($user);
        return View::make('social_networks')->with('templateData', $templateData);
    }

    public function chikkaReceiver()
    {
        try {
            $messageType = e(Input::get("message_type");
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

                $smsTracker = new SmsTracker();
                $smsTracker->message_type = $messageType;
                $smsTracker->mobile_number = $mobileNumber;
                $smsTracker->shortcode = $shortCode;
                $smsTracker->request_id = $requestId;
                $smsTracker->message = $message;
                $smsTracker->timestamp = $timestamp;

                if ($smsTracker->save()) {
                    $this->propagate($message); // let the magic begin!
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

    private function propagate($message)
    {
        $recipients = SmsRecipients::where('user_id', '=', '1')
                        ->get();

        // Send SMS Recipients
        foreach ($recipients as $recipient) {
            $this->sendSMS($recipient->mobile_number, $message);
        }

        $recipients = array();
        $recipients = EmailRecipients::where('user_id', '=', '1')
                        ->get();

        // Send Mail Recipients
        foreach ($recipients as $recipient) {
            $this->sendEmail($recipient, $message);
        }

        // $this->postToFacebook($message);
    }

    public function postToFacebook($message)
    {
        $url = 'https://graph.facebook.com/oauth/access_token';
        $tokenParams = array(
            "type" => "client_cred",
            "client_id" => $this->fbAppId,
            "client_secret" => $this->fbAppSecret
        );

        $accessToken = str_replace('access_token=', '', $this->postUrl($url, $tokenParams));

        $attachment =  array(
            'access_token' => $accessToken,
            'message' => 'test',
            // 'actions' => json_encode(array('name' => $action_name,'link' => $action_link))
        );

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,'https://graph.facebook.com/me/feed');
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $attachment);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);  //to suppress the curl output
        $result = curl_exec($ch);
        var_dump($result);
        curl_close ($ch);
    }

    public function postUrl($url, $params)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($params, null, '&'));
        $ret = curl_exec($ch);
        curl_close($ch);

        return $ret;
    }

    public function sendSMS($recipient, $message)
    {
        $params = array(
            "message_type" => "SEND",
            "mobile_number" => $recipient,
            "shortcode" => $this->chikkaShortCode,
            "message_id" => str_pad(rand(), 32, '0', STR_PAD_LEFT),
            "message" => 'Angel is now on board a Taxi with Plate No.: ' . $message,
            "client_id" => $this->chikkaClientId,
            "secret_key" => $this->chikkaSecretKey
        );

        $query = '';
        foreach ($params as $key=>$param) {
            $query .= '&' . $key . '=' . $param;
        }

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $this->chikkaUrl);
        curl_setopt($ch, CURLOPT_POST, count($params));
        curl_setopt($ch, CURLOPT_POSTFIELDS, $query);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);

        curl_close($ch);
    }

    public function sendEmail($recipient, $text)
    {
        $plateNumber = $text;
        $email = $recipient->email;
        $data = array(
            'recipient' => $email,
            'plateNumber' => $plateNumber
        );

        Mailgun::send('emails.message', $data, function ($message) use ($email) {
            $message->to($email)->subject('alert - Message from Angel');
        });
    }
}
