<?php

namespace TypiCMS\Modules\Pages\Observers;

use TypiCMS\Modules\Pages\Models\Page;

class UriObserver
{
    /**
     * On create, update uri.
     *
     * @param Page $model
     *
     * @return null
     */
    public function creating(Page $model)
    {
        $slugs = $model->getTranslations('slug');
        foreach ($slugs as $locale => $slug) {
            $uri = $this->incrementWhileExists($model, $slug, $locale);
            $model->setTranslation('uri', $locale, $uri);
        }
    }

    /**
     * On update, change uri.
     *
     * @param Page $model
     *
     * @return null
     */
    public function updating(Page $model)
    {
        $slugs = $model->getTranslations('slug');
        $parentUris = $this->getParentUris($model);

        foreach ($slugs as $locale => $slug) {
            $parentUri = $parentUris[$locale] ?? '';
            if ($parentUri !== '') {
                $uri = $parentUri;
                if ($slug) {
                    $uri .= '/'.$slug;
                }
            } else {
                $uri = $slug;
            }
            $uri = $this->incrementWhileExists($model, $uri, $locale, $model->id);
            $model->setTranslation('uri', $locale, $uri);
        }
    }

    /**
     * Get the URIs of the parent page.
     *
     * @param Page $model
     *
     * @return array|null
     */
    private function getParentUris(Page $model)
    {
        if ($parentPage = $model->parent) {
            return $parentPage->getTranslations('uri');
        }
    }

    /**
     * Check if the uri exists.
     *
     * @param Page   $model
     * @param string $uri
     * @param int    $id
     *
     * @return bool
     */
    private function uriExists(Page $model, $uri, $locale, $id)
    {
        $query = $model->where('uri->'.$locale, $uri);
        if ($id) {
            $query->where('id', '!=', $id);
        }

        if ($query->first()) {
            return true;
        }

        return false;
    }

    /**
     * Add '-x' on uri if it exists in page_translations table.
     *
     * @param Page   $model
     * @param string $uri
     * @param int    $id
     *
     * @return string
     */
    private function incrementWhileExists(Page $model, $uri, $locale, $id = null)
    {
        if (!$uri) {
            return '';
        }

        $originalUri = $uri;

        $i = 0;
        // Check if uri is unique
        while ($this->uriExists($model, $uri, $locale, $id)) {
            $i++;
            // increment uri if it exists
            $uri = $originalUri.'-'.$i;
        }

        return $uri;
    }
}
