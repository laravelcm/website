<?php

namespace TypiCMS\Modules\Forums\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\QueryBuilder\Filter;
use Spatie\QueryBuilder\QueryBuilder;
use TypiCMS\Modules\Core\Filters\FilterOr;
use TypiCMS\Modules\Core\Http\Controllers\BaseApiController;
use TypiCMS\Modules\Files\Models\File;
use TypiCMS\Modules\Forums\Models\Forum;
use TypiCMS\Modules\Forums\Repositories\EloquentForum;

class ApiController extends BaseApiController
{
    public function __construct(EloquentForum $forum)
    {
        parent::__construct($forum);
    }

    public function index(Request $request)
    {
        $data = QueryBuilder::for(Forum::class)
            ->allowedFilters([
                Filter::custom('name', FilterOr::class),
            ])
            ->paginate($request->input('per_page'));

        return $data;
    }

    protected function updatePartial(Forum $forum, Request $request)
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
            $forum->$key = $value;
        }
        $saved = $forum->save();

        $this->repository->forgetCache();
    }

    public function destroy(Forum $forum)
    {
        $deleted = $this->repository->delete($forum);

        return response()->json([
            'error' => !$deleted,
        ]);
    }

    public function files(Forum $forum)
    {
        return $forum->files;
    }

    public function attachFiles(Forum $forum, Request $request)
    {
        return $this->repository->attachFiles($forum, $request);
    }

    public function detachFile(Forum $forum, File $file)
    {
        return $this->repository->detachFile($forum, $file);
    }
}
