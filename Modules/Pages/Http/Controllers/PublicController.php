<?php

namespace TypiCMS\Modules\Pages\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use TypiCMS;
use TypiCMS\Modules\Core\Http\Controllers\BasePublicController;
use TypiCMS\Modules\Pages\Repositories\EloquentPage;

class PublicController extends BasePublicController
{
    public function __construct(EloquentPage $page)
    {
        parent::__construct($page);
    }

    /**
     * Page uri : lang/slug.
     *
     * @return \Illuminate\Http\Response | \Illuminate\Http\RedirectResponse
     */
    public function uri($uri = null)
    {
        $page = $this->findPageByUri($uri);

        abort_if(!$page, '404');

        if ($page->private && !Auth::check()) {
            return redirect()->guest(route('login'));
        }

        if ($page->redirect && $page->subpages->count() > 0) {
            $childUri = $page->subpages->first()->uri();

            return redirect($childUri);
        }

        // get submenu
        $children = $this->repository->getSubMenu($page->uri);

        $templateDir = 'pages::'.config('typicms.template_dir', 'public').'.';
        $template = $page->template ?: 'default';

        if (!view()->exists($templateDir.$template)) {
            info('Template '.$template.' not found, switching to default template.');
            $template = 'default';
        }

        return response()->view($templateDir.$template, compact('children', 'page'));
    }

    /**
     * Find page by URI.
     *
     * @return TypiCMS\Modules\Pages\Models\Page
     */
    private function findPageByUri($uri)
    {
        $repository = $this->repository->with('images', 'documents', 'publishedSections');

        if ($uri === null) {
            return $repository->findBy('is_home', 1);
        }

        // Only locale in url
        if (
            in_array($uri, locales()) &&
            (
                config('app.fallback_locale') != $uri ||
                config('typicms.main_locale_in_url')
            )
        ) {
            return $repository->findBy('is_home', 1);
        }

        return $repository->getFirstByUri($uri);
    }

    /**
     * Get browser language or default locale and redirect to homepage.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function redirectToHomepage()
    {
        $homepage = $this->repository->findBy('is_home', 1);
        $locale = $this->getBrowserLanguageOrDefault();

        return redirect($homepage->uri($locale));
    }

    /**
     * Get browser language or app.locale.
     *
     * @return string
     */
    private function getBrowserLanguageOrDefault()
    {
        if ($browserLanguage = getenv('HTTP_ACCEPT_LANGUAGE')) {
            $browserLocale = substr($browserLanguage, 0, 2);
            if (in_array($browserLocale, TypiCMS::enabledLocales())) {
                return $browserLocale;
            }
        }

        return config('app.locale');
    }

    /**
     * Display the lang chooser.
     *
     * @return null
     */
    public function langChooser()
    {
        $homepage = $this->repository->findBy('is_home', 1);
        if (!$homepage) {
            app('log')->error('No homepage found.');
            abort(404);
        }
        $locales = TypiCMS::enabledLocales();

        return view('core::public.lang-chooser')
            ->with(compact('homepage', 'locales'));
    }
}
