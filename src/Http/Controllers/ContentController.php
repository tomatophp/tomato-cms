<?php

namespace TomatoPHP\TomatoCms\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use TomatoPHP\TomatoPHP\Services\Tomato;

class ContentController extends Controller
{
    /**
     * @param Request $request
     * @return View
     */
    public function index(Request $request): View
    {
        return Tomato::index(
            request: $request,
            view: 'tomato-cms::contents.index',
            table: \TomatoPHP\TomatoCms\Tables\ContentTable::class,
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
            model: \TomatoPHP\TomatoCms\Models\Content::class,
        );
    }

    /**
     * @return View
     */
    public function create(): View
    {
        return Tomato::create(
            view: 'tomato-cms::contents.create',
        );
    }

    /**
     * @param \TomatoPHP\TomatoCms\Http\Requests\Content\ContentStoreRequest $request
     * @return RedirectResponse
     */
    public function store(\TomatoPHP\TomatoCms\Http\Requests\Content\ContentStoreRequest $request): RedirectResponse
    {
        $response = Tomato::store(
            request: $request,
            model: \TomatoPHP\TomatoCms\Models\Content::class,
            message: __('Content created successfully'),
            redirect: 'admin.contents.index',
        );

        return $response['redirect'];
    }

    /**
     * @param \TomatoPHP\TomatoCms\Models\Content $model
     * @return View
     */
    public function show(\TomatoPHP\TomatoCms\Models\Content $model): View
    {
        return Tomato::get(
            model: $model,
            view: 'tomato-cms::contents.show',
        );
    }

    /**
     * @param \TomatoPHP\TomatoCms\Models\Content $model
     * @return View
     */
    public function edit(\TomatoPHP\TomatoCms\Models\Content $model): View
    {
        return Tomato::get(
            model: $model,
            view: 'tomato-cms::contents.edit',
        );
    }

    /**
     * @param \TomatoPHP\TomatoCms\Http\Requests\Content\ContentUpdateRequest $request
     * @param \TomatoPHP\TomatoCms\Models\Content $user
     * @return RedirectResponse
     */
    public function update(\TomatoPHP\TomatoCms\Http\Requests\Content\ContentUpdateRequest $request, \TomatoPHP\TomatoCms\Models\Content $model): RedirectResponse
    {
        $response = Tomato::update(
            request: $request,
            model: $model,
            message: __('Content updated successfully'),
            redirect: 'admin.contents.index',
        );

        return $response['redirect'];
    }

    /**
     * @param \TomatoPHP\TomatoCms\Models\Content $model
     * @return RedirectResponse
     */
    public function destroy(\TomatoPHP\TomatoCms\Models\Content $model): RedirectResponse
    {
        return Tomato::destroy(
            model: $model,
            message: __('Content deleted successfully'),
            redirect: 'admin.contents.index',
        );
    }
}
