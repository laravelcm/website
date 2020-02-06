<?php

namespace Modules\User\Http\Controllers\Api;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Routing\Controller;
use Modules\User\Repositories\UserRepository;
use Modules\User\Transformers\UsersResource;

class UserController extends Controller
{
    /**
     * @var UserRepository
     */
    protected $userRepository;

    /**
     * UserController constructor.
     *
     * @param UserRepository $userRepository
     */
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return UsersResource
     */
    public function index()
    {
        return new UsersResource($this->userRepository->all());
    }

    /**
     * Send a request to Google Recaptcha API to check if the token is valid
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function verifyRecaptchaToken(Request $request)
    {
        $token = $request->get('token');

        $data = [
            'response'  => $token,
            'secret'    => '6Le5TtYUAAAAAGZHiAeVaApa4pZh8Ioecrpwpg3m',
        ];

        $statusCode = 400;
        $content = null;

        try {
            $client = new Client();

            $response = $client->request('POST', 'https://www.google.com/recaptcha/api/siteverify', [
                'form_params' => $data
            ]);

            $statusCode = $response->getStatusCode();
            $content = $response->getBody()->getContents();
        } catch(ClientException $ex) {
            $response = $ex->getResponse();
            $content = !is_null($response) ? $response->getBody()->getContents() : null;

            Log::error($ex->getMessage());
        }

        return response()->json($content, $statusCode);
    }
}
