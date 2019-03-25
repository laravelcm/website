<?php

namespace TypiCMS\Modules\Events\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\QueryBuilder\Filter;
use Spatie\QueryBuilder\QueryBuilder;
use TypiCMS\Modules\Core\Filters\FilterOr;
use TypiCMS\Modules\Core\Http\Controllers\BaseApiController;
use TypiCMS\Modules\Events\Models\Event;
use TypiCMS\Modules\Events\Repositories\EloquentEvent;
use TypiCMS\Modules\Files\Models\File;

class ApiController extends BaseApiController
{
    public function __construct(EloquentEvent $event)
    {
        parent::__construct($event);
    }

    public function index(Request $request)
    {
        $data = QueryBuilder::for(Event::class)
            ->allowedFilters([
                Filter::custom('start_date,end_date,title', FilterOr::class),
            ])
            ->allowedIncludes('files', 'images')
            ->translated($request->input('translatable_fields'))
            ->paginate($request->input('per_page'));

        return $data;
    }

    protected function updatePartial(Event $event, Request $request)
    {
        $data = [];
        foreach ($request->all() as $column => $content) {
            if (is_array($content)) {
                foreach ($content as $key => $value) {
                    $data[$column.'->'.$key] = $value;
                }
            } else {
                $data[$column] = $content;
            }
        }

        foreach ($data as $key => $value) {
            $event->$key = $value;
        }
        $saved = $event->save();

        $this->repository->forgetCache();

        return response()->json([
            'error' => !$saved,
        ]);
    }

    public function destroy(Event $event)
    {
        $deleted = $this->repository->delete($event);

        return response()->json([
            'error' => !$deleted,
        ]);
    }

    public function files(Event $event)
    {
        return $event->files;
    }

    public function attachFiles(Event $event, Request $request)
    {
        return $this->repository->attachFiles($event, $request);
    }

    public function detachFile(Event $event, File $file)
    {
        return $this->repository->detachFile($event, $file);
    }
}
