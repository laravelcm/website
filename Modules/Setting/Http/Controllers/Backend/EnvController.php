<?php

namespace Modules\Setting\Http\Controllers\Backend;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Artisan;

class EnvController extends Controller
{
    /**
     * Display Env Form
     *
     * @return Response
     */
    public function index()
    {
        return view('setting::env');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        if ($request->input('facebook_active')) {
            $request->merge(['facebook_active' => true]);
        } else {
            $request->merge(['facebook_active' => false]);
        }

        if ($request->input('twitter_active')) {
            $request->merge(['twitter_active' => true]);
        } else {
            $request->merge(['twitter_active' => false]);
        }

        if ($request->input('google_active')) {
            $request->merge(['google_active' => true]);
        } else {
            $request->merge(['google_active' => false]);
        }

        if ($request->input('linkedin_active')) {
            $request->merge(['linkedin_active' => true]);
        } else {
            $request->merge(['linkedin_active' => false]);
        }

        if ($request->input('github_active')) {
            $request->merge(['github_active' => true]);
        } else {
            $request->merge(['github_active' => false]);
        }

        if ($request->input('bitbucket_active')) {
            $request->merge(['bitbucket_active' => true]);
        } else {
            $request->merge(['bitbucket_active' => false]);
        }

        if ($request->input('contact_captcha_status')) {
            $request->merge(['contact_captcha_status' => true]);
        } else {
            $request->merge(['contact_captcha_status' => false]);
        }

        if ($request->input('registration_captcha_status')) {
            $request->merge(['registration_captcha_status' => true]);
        } else {
            $request->merge(['registration_captcha_status' => false]);
        }

        if ($request->input('invisible_captcha_badgehide')) {
            $request->merge(['invisible_captcha_badgehide' => true]);
        }

        if ($request->input('invisible_recaptcha_debug')) {
            $request->merge(['invisible_recaptcha_debug' => true]);
        } else {
            $request->merge(['invisible_recaptcha_debug' => false]);
        }

        setEnvironmentValue($request->except('_token'));

        notify()->success(__('setting::alerts.backend.env.success'));

        return back();
    }

    /**
     * @param Request $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request)
    {
        $action = $request->get('action', 'index');

        try {
            $this->$action();

            notify()->success(__('Operation completed successfully.'));
        } catch (\Exception $exception) {
            notify()->warning($exception->getMessage());
        }

        return back();
    }

    /**
     *  Flush the application cache.
     */
    protected function cache()
    {
        Artisan::call('cache:clear');
    }

    /**
     * Create a cache file for faster configuration loading.
     */
    protected function config()
    {
        if (app()->environment() !== 'local') {
            Artisan::call('config:clear');
            Artisan::call('config:cache');
        }
    }

    /**
     * Create a route cache file for faster route registration.
     */
    protected function route()
    {
        Artisan::call('route:cache');
    }

    /**
     * Clear all compiled view files.
     */
    protected function view()
    {
        Artisan::call('view:clear');
    }
}
