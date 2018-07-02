<?php

namespace App\Models;

use CyrildeWit\EloquentViewable\Viewable;
use Illuminate\Database\Eloquent\Model;

class Post extends \TCG\Voyager\Models\Post
{
    use Viewable;
}
