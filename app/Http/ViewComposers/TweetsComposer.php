<?php
namespace App\Http\ViewComposers;

use Illuminate\View\View;
use Thujohn\Twitter\Facades\Twitter;

class TweetsComposer
{

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        try {
            $tweets = Twitter::getUserTimeline(['count' => 3, 'format' => 'array']);
        } catch (\Exception $e) {
            $tweets = [];
        }

        $view->with('tweets', $tweets);
    }

}
