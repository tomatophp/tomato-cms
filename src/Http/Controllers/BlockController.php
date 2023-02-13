<?php

namespace TomatoPHP\TomatoCms\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use TomatoPHP\TomatoPHP\Services\Tomato;

class BlockController extends Controller
{
    /**
     * @param Request $request
     * @return View
     */
    public function index(Request $request): View
    {
        return Tomato::index(
            request: $request,
            view: 'tomato-cms::blocks.index',
            table: \TomatoPHP\TomatoCms\Tables\BlockTable::class,
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
            model: \TomatoPHP\TomatoCms\Models\Block::class,
        );
    }

    /**
     * @return View
     */
    public function create(): View
    {
        return Tomato::create(
            view: 'tomato-cms::blocks.create',
        );
    }

    /**
     * @param \TomatoPHP\TomatoCms\Http\Requests\Block\BlockStoreRequest $request
     * @return RedirectResponse
     */
    public function store(\TomatoPHP\TomatoCms\Http\Requests\Block\BlockStoreRequest $request): RedirectResponse
    {
        $response = Tomato::store(
            request: $request,
            model: \TomatoPHP\TomatoCms\Models\Block::class,
            message: __('Block created successfully'),
            redirect: 'admin.blocks.index',
        );

        return $response['redirect'];
    }

    /**
     * @param \TomatoPHP\TomatoCms\Models\Block $model
     * @return View
     */
    public function show(\TomatoPHP\TomatoCms\Models\Block $model): View
    {
        return Tomato::get(
            model: $model,
            view: 'tomato-cms::blocks.show',
        );
    }

    /**
     * @param \TomatoPHP\TomatoCms\Models\Block $model
     * @return View
     */
    public function edit(\TomatoPHP\TomatoCms\Models\Block $model): View
    {
        return Tomato::get(
            model: $model,
            view: 'tomato-cms::blocks.edit',
        );
    }

    /**
     * @param \TomatoPHP\TomatoCms\Http\Requests\Block\BlockUpdateRequest $request
     * @param \TomatoPHP\TomatoCms\Models\Block $user
     * @return RedirectResponse
     */
    public function update(\TomatoPHP\TomatoCms\Http\Requests\Block\BlockUpdateRequest $request, \TomatoPHP\TomatoCms\Models\Block $model): RedirectResponse
    {
        $response = Tomato::update(
            request: $request,
            model: $model,
            message: __('Block updated successfully'),
            redirect: 'admin.blocks.index',
        );

        return $response['redirect'];
    }

    /**
     * @param \TomatoPHP\TomatoCms\Models\Block $model
     * @return RedirectResponse
     */
    public function destroy(\TomatoPHP\TomatoCms\Models\Block $model): RedirectResponse
    {
        return Tomato::destroy(
            model: $model,
            message: __('Block deleted successfully'),
            redirect: 'admin.blocks.index',
        );
    }
}
