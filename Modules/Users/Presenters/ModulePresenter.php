<?php

namespace TypiCMS\Modules\Users\Presenters;

use TypiCMS\Modules\Core\Presenters\Presenter;

class ModulePresenter extends Presenter
{
    /**
     * Get title by concatenating first_name and last_name.
     *
     * @return string
     */
    public function title()
    {
        return $this->entity->first_name.' '.$this->entity->last_name;
    }
}
