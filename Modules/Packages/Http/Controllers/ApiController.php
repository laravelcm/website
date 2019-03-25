<?php

namespace TypiCMS\Modules\Packages\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\QueryBuilder\Filter;
use Spatie\QueryBuilder\QueryBuilder;
use TypiCMS\Modules\Core\Filters\FilterOr;
use TypiCMS\Modules\Core\Http\Controllers\BaseApiController;
use TypiCMS\Modules\Files\Models\File;
use TypiCMS\Modules\Packages\Models\Package;
use TypiCMS\Modules\Packages\Repositories\EloquentPackage;

class ApiController extends BaseApiController
{
    public function __construct(EloquentPackage $package)
    {
        parent::__construct($package);
    }

    public function index(Request $request)
    {
        $data = QueryBuilder::for(Package::class)
            ->allowedFilters([
                Filter::custom('date,title', FilterOr::class),
            ])
            ->allowedIncludes('files', 'images')
            ->translated($request->input('translatable_fields'))
            ->paginate($request->input('per_page'));

        return $data;
    }

    protected function updatePartial(Package $package, Request $request)
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
            $package->$key = $value;
        }
        $saved = $package->save();

        $this->repository->forgetCache();
    }

    public function destroy(Package $package)
    {
        $deleted = $this->repository->delete($package);

        return response()->json([
            'error' => !$deleted,
        ]);
    }

    public function files(Package $package)
    {
        return $package->files;
    }

    public function attachFiles(Package $package, Request $request)
    {
        return $this->repository->attachFiles($package, $request);
    }

    public function detachFile(Package $package, File $file)
    {
        return $this->repository->detachFile($package, $file);
    }
}
