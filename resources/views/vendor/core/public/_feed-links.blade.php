@foreach (TypiCMS::feeds() as $feed)
    {!! app('feed')->link($feed['url'], 'atom', $feed['title'], $lang) !!}
@endforeach
