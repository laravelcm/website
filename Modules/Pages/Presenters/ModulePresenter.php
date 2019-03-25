<?php

namespace TypiCMS\Modules\Pages\Presenters;

use TypiCMS\Modules\Core\Presenters\Presenter;

class ModulePresenter extends Presenter
{
    /**
     * Get Uri without last segment.
     *
     * @param string $locale
     *
     * @return string URI without last segment
     */
    public function parentUri($locale)
    {
        $parentUri = $this->entity->translate('uri', $locale) ?: '/';
        $parentUri = explode('/', $parentUri);
        array_pop($parentUri);
        $parentUri = implode('/', $parentUri).'/';

        return $parentUri;
    }
}
