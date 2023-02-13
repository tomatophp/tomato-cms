<?php

namespace TomatoPHP\TomatoCms\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use TomatoPHP\TomatoPHP\Services\Tomato;

class SeoController extends Controller
{
    /**
     * @param Request $request
     * @return View
     */
    public function index(Request $request): View
    {
        return Tomato::index(
            request: $request,
            view: 'tomato-cms::seos.index',
            table: \TomatoPHP\TomatoCms\Tables\SeoTable::class,
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
            model: \TomatoPHP\TomatoCms\Models\Seo::class,
        );
    }

    /**
     * @return View
     */
    public function create(): View
    {
        return Tomato::create(
            view: 'tomato-cms::seos.create',
        );
    }

    /**
     * @param \TomatoPHP\TomatoCms\Http\Requests\Seo\SeoStoreRequest $request
     * @return RedirectResponse
     */
    public function store(\TomatoPHP\TomatoCms\Http\Requests\Seo\SeoStoreRequest $request): RedirectResponse
    {
        $response = Tomato::store(
            request: $request,
            model: \TomatoPHP\TomatoCms\Models\Seo::class,
            message: __('Seo created successfully'),
            redirect: 'admin.seos.index',
        );

        return $response['redirect'];
    }

    /**
     * @param \TomatoPHP\TomatoCms\Models\Seo $model
     * @return View
     */
    public function show(\TomatoPHP\TomatoCms\Models\Seo $model): View
    {
        return Tomato::get(
            model: $model,
            view: 'tomato-cms::seos.show',
        );
    }

    /**
     * @param \TomatoPHP\TomatoCms\Models\Seo $model
     * @return View
     */
    public function edit(\TomatoPHP\TomatoCms\Models\Seo $model): View
    {
        return Tomato::get(
            model: $model,
            view: 'tomato-cms::seos.edit',
        );
    }

    /**
     * @param \TomatoPHP\TomatoCms\Http\Requests\Seo\SeoUpdateRequest $request
     * @param \TomatoPHP\TomatoCms\Models\Seo $user
     * @return RedirectResponse
     */
    public function update(\TomatoPHP\TomatoCms\Http\Requests\Seo\SeoUpdateRequest $request, \TomatoPHP\TomatoCms\Models\Seo $model): RedirectResponse
    {
        $response = Tomato::update(
            request: $request,
            model: $model,
            message: __('Seo updated successfully'),
            redirect: 'admin.seos.index',
        );

        return $response['redirect'];
    }

    /**
     * @param \TomatoPHP\TomatoCms\Models\Seo $model
     * @return RedirectResponse
     */
    public function destroy(\TomatoPHP\TomatoCms\Models\Seo $model): RedirectResponse
    {
        return Tomato::destroy(
            model: $model,
            message: __('Seo deleted successfully'),
            redirect: 'admin.seos.index',
        );
    }
}
