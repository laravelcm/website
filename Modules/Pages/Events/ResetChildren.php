<?php

namespace TypiCMS\Modules\Pages\Events;

use Illuminate\Events\Dispatcher;
use TypiCMS\Modules\Pages\Models\Page;

class ResetChildren
{
    /**
     * Recursive method for emptying subpages URI
     * UriObserver will rebuild URIs.
     *
     * @param Page $page
     *
     * @return null
     */
    public function resetChildrenUri(Page $page)
    {
        foreach ($page->subpages as $subpage) {
            $uris = $subpage->getTranslations('uri');
            foreach ($uris as $locale => $uri) {
                $subpage->forgetTranslation('uri', $locale);
            }
            $subpage->save();
            $this->resetChildrenUri($subpage);
        }
    }

    /**
     * Register the listeners for the subscriber.
     *
     * @param Dispatcher $events
     *
     * @return array
     */
    public function subscribe(Dispatcher $events)
    {
        $events->listen('page.resetChildrenUri', 'TypiCMS\Modules\Pages\Events\ResetChildren@resetChildrenUri');
    }
}
