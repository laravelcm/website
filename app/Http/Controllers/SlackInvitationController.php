<?php

namespace App\Http\Controllers;

use App\Repositories\PostRepository;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Http\Request;

class SlackInvitationController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function invite()
    {
        $result = $this->request_invitation('test@test.com');


    }

    function request_invitation($email)
    {
        // users.admin.invite is undocumented API, keep in mind.
        $api_response = $this->call_api('/api/users.admin.invite?t=' . time(), [
            'email' => $email,
            'set_active' => 'true',
            '_attempts' => '1',
        ]);
        dd($api_response);
        if ($api_response->ok !== true) {
            throw new \RuntimeException('Slack API response not ok, error:' . $api_response->error); // TODO more nice Exception
        }
    }
    function call_api($path, $params = [])
    {
        $client = new \GuzzleHttp\Client([
            'base_uri' => "https://slack.com/"
        ]);
        var_dump(env('SLACK_API'));
        var_dump(env('SLACK_TOKEN'));

        try {
            $api_response_raw = $client->request('post', $path, [
                'form_params' => array_merge(['token' => env('SLACK_API')], $params)
            ]);
        } catch (GuzzleException $e) {
        }
        $api_response = json_decode($api_response_raw->getBody());
        if ($api_response === null) {
            throw new \RuntimeException('Slack API response an invalid json'); // TODO more nice Exception
        }
        return $api_response;
    }
}
