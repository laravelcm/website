<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Http\Request;

class SlackInvitationController extends Controller
{
    /**
     * @var \GuzzleHttp\Client
     */
    protected $client;

    /**
     * Slack Team name
     *
     * @var string
     */
    protected $team;

    /**
     * SlackInvitationController constructor.
     */
    public function __construct()
    {
        $this->client = new Client();
        $this->team   = env('SLACK_TEAM_NAME', 'Laravel Cameroon');
    }

    /**
     * Slack Invitation
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function sendInvitation(Request $request)
    {
        $rules = ['email' => 'required|string|email'];
        $validator = validator($request->all(), $rules);
        $email = $request->input('email');

        if ($validator->fails()) {
            return redirect(route('slack.result'))->with('error', 'You must enter your email to proceed.');
        } else {
            try {
                $this->client->request('POST',
                    env('SLACK_TEAM_URL').'/api/users.admin.invite?t='
                    .time().'&email='.$email.'&token='.env('SLACK_API_TOKEN')
                    .'&set_active=true&_attempts=1');
                return redirect(route('slack.result'))->with('success', "An invitation to your mail to join {$this->team} workspace.");
            } catch (GuzzleException $e) {
                return redirect(route('slack.result'))->with('error', 'An error occured while sending invitation, please try again.');
            }
        }
    }
}
