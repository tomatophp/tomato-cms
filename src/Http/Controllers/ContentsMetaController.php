<?php

namespace TomatoPHP\TomatoCms\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use TomatoPHP\TomatoPHP\Services\Tomato;

class ContentsMetaController extends Controller
{
    /**
     * @param Request $request
     * @return View
     */
    public function index(Request $request): View
    {
        return Tomato::index(
            request: $request,
            view: 'tomato-cms::contents-metas.index',
            table: \TomatoPHP\TomatoCms\Tables\ContentsMetaTable::class,
        );
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function api(Request $request): JsonResponse
    {
        return Tomato::json(
            request: $request,
            model: \TomatoPHP\TomatoCms\Models\ContentsMeta::class,
        );
    }

    /**
     * @return View
     */
    public function create(): View
    {
        return Tomato::create(
            view: 'tomato-cms::contents-metas.create',
        );
    }

    /**
     * @param \TomatoPHP\TomatoCms\Http\Requests\ContentsMeta\ContentsMetaStoreRequest $request
     * @return RedirectResponse
     */
    public function store(\TomatoPHP\TomatoCms\Http\Requests\ContentsMeta\ContentsMetaStoreRequest $request): RedirectResponse
    {
        $response = Tomato::store(
            request: $request,
            model: \TomatoPHP\TomatoCms\Models\ContentsMeta::class,
            message: __('ContentsMeta created successfully'),
            redirect: 'admin.contents-metas.index',
        );

        return $response['redirect'];
    }

    /**
     * @param \TomatoPHP\TomatoCms\Models\ContentsMeta $model
     * @return View
     */
    public function show(\TomatoPHP\TomatoCms\Models\ContentsMeta $model): View
    {
        return Tomato::get(
            model: $model,
            view: 'tomato-cms::contents-metas.show',
        );
    }

    /**
     * @param \TomatoPHP\TomatoCms\Models\ContentsMeta $model
     * @return View
     */
    public function edit(\TomatoPHP\TomatoCms\Models\ContentsMeta $model): View
    {
        return Tomato::get(
            model: $model,
            view: 'tomato-cms::contents-metas.edit',
        );
    }

    /**
     * @param \TomatoPHP\TomatoCms\Http\Requests\ContentsMeta\ContentsMetaUpdateRequest $request
     * @param \TomatoPHP\TomatoCms\Models\ContentsMeta $user
     * @return RedirectResponse
     */
    public function update(\TomatoPHP\TomatoCms\Http\Requests\ContentsMeta\ContentsMetaUpdateRequest $request, \TomatoPHP\TomatoCms\Models\ContentsMeta $model): RedirectResponse
    {
        $response = Tomato::update(
            request: $request,
            model: $model,
            message: __('ContentsMeta updated successfully'),
            redirect: 'admin.contents-metas.index',
        );

        return $response['redirect'];
    }

    /**
     * @param \TomatoPHP\TomatoCms\Models\ContentsMeta $model
     * @return RedirectResponse
     */
    public function destroy(\TomatoPHP\TomatoCms\Models\ContentsMeta $model): RedirectResponse
    {
        return Tomato::destroy(
            model: $model,
            message: __('ContentsMeta deleted successfully'),
            redirect: 'admin.contents-metas.index',
        );
    }
}
