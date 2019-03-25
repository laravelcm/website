<?php

namespace TypiCMS\Modules\Menus\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\QueryBuilder\Filter;
use Spatie\QueryBuilder\QueryBuilder;
use TypiCMS\Modules\Core\Filters\FilterOr;
use TypiCMS\Modules\Core\Http\Controllers\BaseApiController;
use TypiCMS\Modules\Menus\Models\Menu;
use TypiCMS\Modules\Menus\Repositories\EloquentMenu;

class ApiController extends BaseApiController
{
    public function __construct(EloquentMenu $menu)
    {
        parent::__construct($menu);
    }

    public function index(Request $request)
    {
        $data = QueryBuilder::for(Menu::class)
            ->allowedFilters([
                Filter::custom('name', FilterOr::class),
            ])
            ->translated($request->input('translatable_fields'))
            ->paginate($request->input('per_page'));

        return $data;
    }

    protected function updatePartial(Menu $menu, Request $request)
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
            $menu->$key = $value;
        }
        $saved = $menu->save();

        $this->repository->forgetCache();

        return response()->json([
            'error' => !$saved,
        ]);
    }

    public function destroy(Menu $menu)
    {
        $deleted = $this->repository->delete($menu);

        return response()->json([
            'error' => !$deleted,
        ]);
    }
}
