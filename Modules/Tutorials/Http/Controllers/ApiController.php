<?php

namespace TypiCMS\Modules\Tutorials\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\QueryBuilder\Filter;
use Spatie\QueryBuilder\QueryBuilder;
use TypiCMS\Modules\Core\Filters\FilterOr;
use TypiCMS\Modules\Core\Http\Controllers\BaseApiController;
use TypiCMS\Modules\Files\Models\File;
use TypiCMS\Modules\Tutorials\Models\Tutorial;
use TypiCMS\Modules\Tutorials\Repositories\EloquentTutorial;

class ApiController extends BaseApiController
{
    public function __construct(EloquentTutorial $tutorial)
    {
        parent::__construct($tutorial);
    }

    public function index(Request $request)
    {
        $data = QueryBuilder::for(Tutorial::class)
            ->allowedFilters([
                Filter::custom('date,title', FilterOr::class),
            ])
            ->allowedIncludes('files', 'images')
            ->translated($request->input('translatable_fields'))
            ->paginate($request->input('per_page'));

        return $data;
    }

    protected function updatePartial(Tutorial $tutorial, Request $request)
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
            $tutorial->$key = $value;
        }
        $saved = $tutorial->save();

        $this->repository->forgetCache();
    }

    public function destroy(Tutorial $tutorial)
    {
        $deleted = $this->repository->delete($tutorial);

        return response()->json([
            'error' => !$deleted,
        ]);
    }

    public function files(Tutorial $tutorial)
    {
        return $tutorial->files;
    }

    public function attachFiles(Tutorial $tutorial, Request $request)
    {
        return $this->repository->attachFiles($tutorial, $request);
    }

    public function detachFile(Tutorial $tutorial, File $file)
    {
        return $this->repository->detachFile($tutorial, $file);
    }
}
