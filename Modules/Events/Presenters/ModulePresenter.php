<?php

namespace TypiCMS\Modules\Events\Presenters;

use TypiCMS\Modules\Core\Presenters\Presenter;

class ModulePresenter extends Presenter
{
    private $dateFormat = 'd.m.Y';
    private $timeFormat = 'H:i';

    /**
     * Return formatted start_date.
     *
     * @return string
     */
    public function startDate()
    {
        return $this->entity->start_date->format($this->dateFormat);
    }

    /**
     * Return formatted end_date.
     *
     * @return string
     */
    public function endDate()
    {
        return $this->entity->end_date->format($this->dateFormat);
    }

    /**
     * Return time formatted start_date.
     *
     * @return string
     */
    public function startTime()
    {
        if (!$this->entity->start_date) {
            return '';
        }

        return $this->entity->start_date->format($this->timeFormat);
    }

    /**
     * Return time formatted end_date.
     *
     * @return string
     */
    public function endTime()
    {
        if (!$this->entity->end_date) {
            return '';
        }

        return $this->entity->end_date->format($this->timeFormat);
    }

    /**
     * Format start + end date without repeating
     * month and year if they are the same.
     *
     * @return string html data
     */
    public function dateFromTo()
    {
        $sDate = $this->entity->start_date;
        $eDate = $this->entity->end_date;
        $dateFormat = '%e %B %Y';
        $sDateFormat = $dateFormat;
        if ($sDate->format('Ymd') == $eDate->format('Ymd')) {
            return ucfirst(__('on')).' '.
                '<time datetime="'.$sDate->toIso8601String().'">'.
                $sDate->formatLocalized($dateFormat).
                '</time>';
        }
        if ($sDate->format('Y') == $eDate->format('Y')) {
            $sDateFormat = '%e %B';
            if ($sDate->format('m') == $eDate->format('m')) {
                $sDateFormat = '%e';
            }
        }

        $dateFromTo = ucfirst(__('from')).' ';
        $dateFromTo .= '<time datetime="'.$sDate->toIso8601String().'">';
        $dateFromTo .= $sDate->formatLocalized($sDateFormat);
        $dateFromTo .= '</time>';
        $dateFromTo .= ' '.__('to').' ';
        $dateFromTo .= '<time datetime="'.$eDate->toIso8601String().'">';
        $dateFromTo .= $eDate->formatLocalized($dateFormat);
        $dateFromTo .= '</time>';

        return $dateFromTo;
    }

    /**
     * Format start and end time.
     *
     * @param $separator string
     *
     * @return string
     */
    public function timeFromTo($separator = ' - ')
    {
        $startTime = $this->entity->start_date->format($this->timeFormat);
        $endTime = $this->entity->end_date->format($this->timeFormat);

        return $startTime.$separator.$endTime;
    }
}
