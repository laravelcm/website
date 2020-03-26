<?php

namespace App\Providers;

use Carbon\Carbon;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\UrlWindow;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\ServiceProvider;
use Inertia\Inertia;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Date::use(Carbon::class);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->registerInertia();
        $this->registerLengthAwarePaginator();
    }

    /**
     * Register Inertia data.
     *
     * @return void
     */
    public function registerInertia()
    {
        Inertia::getVersion(function () {
            return md5_file(public_path('mix-manifest.json'));
        });

        Inertia::share([
            'auth' => function () {
                return [
                    'user' => auth()->user() ? [
                        'id' => auth()->user()->id,
                        'first_name' => auth()->user()->first_name,
                        'last_name' => auth()->user()->last_name,
                        'full_name' => auth()->user()->full_name,
                        'username' => auth()->user()->username,
                        'email' => auth()->user()->email,
                        'picture' => auth()->user()->picture,
                        'biography' => auth()->user()->profile('biography'),
                        'country' => auth()->user()->profile('country'),
                        'address' => auth()->user()->profile('address'),
                        'city' => auth()->user()->profile('city'),
                        'state' => auth()->user()->profile('state'),
                        'postal_code' => auth()->user()->profile('postal_code'),
                        'is_admin' => auth()->user()->isAdmin(),
                        'notifications' => auth()->user()->unreadNotifications()->get()
                    ] : null,
                ];
            },
            'flash' => function () {
                return [
                    'success' => Session::get('success'),
                    'error' => Session::get('error'),
                ];
            },
            'errors' => function () {
                return Session::get('errors')
                    ? Session::get('errors')->getBag('default')->getMessages()
                    : (object) [];
            },
        ]);
    }

    /**
     * Register Paginator.
     *
     * @return void
     */
    protected function registerLengthAwarePaginator()
    {
        if (request()->header('X-Inertia')) {
            $this->app->bind(LengthAwarePaginator::class, function ($app, $values) {
                return new class (...array_values($values)) extends LengthAwarePaginator
                {
                    public function only(...$attributes)
                    {
                        return $this->transform(function ($item) use ($attributes) {
                            return $item->only($attributes);
                        });
                    }

                    public function transform($callback)
                    {
                        $this->items->transform($callback);
                        return $this;
                    }

                    public function toArray()
                    {
                        return [
                            'data' => $this->items->toArray(),
                            'links' => $this->links(),
                        ];
                    }

                    public function links($view = null, $data = [])
                    {
                        $this->appends(Request::all());
                        $window = UrlWindow::make($this);
                        $elements = array_filter([
                            $window['first'],
                            is_array($window['slider']) ? '...' : null,
                            $window['slider'],
                            is_array($window['last']) ? '...' : null,
                            $window['last'],
                        ]);

                        return Collection::make($elements)->flatMap(function ($item) {
                            if (is_array($item)) {
                                return Collection::make($item)->map(function ($url, $page) {
                                    return [
                                        'url' => $url,
                                        'label' => $page,
                                        'active' => $this->currentPage() === $page,
                                    ];
                                });
                            } else {
                                return [
                                    [
                                        'url' => null,
                                        'label' => '...',
                                        'active' => false,
                                    ],
                                ];
                            }
                        })->prepend([
                            'url' => $this->previousPageUrl(),
                            'label' => 'Précédent',
                            'active' => false,
                        ])->push([
                            'url' => $this->nextPageUrl(),
                            'label' => 'Suivant',
                            'active' => false,
                        ]);
                    }
                };
            });
        }
    }
}
