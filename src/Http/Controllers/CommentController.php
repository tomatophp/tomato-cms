<?php

namespace TomatoPHP\TomatoCms\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use TomatoPHP\TomatoAdmin\Facade\Tomato;

class CommentController extends Controller
{
    /**
     * @param Request $request
     * @return View
     */
    public function index(Request $request): View
    {
        return Tomato::index(
            request: $request,
            model: \TomatoPHP\TomatoCms\Models\Comment::class,
            view: 'tomato-cms::comments.index',
            table: \TomatoPHP\TomatoCms\Tables\CommentTable::class,
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
            model: \TomatoPHP\TomatoCms\Models\Comment::class,
        );
    }

    /**
     * @return View
     */
    public function create(): View
    {
        return Tomato::create(
            view: 'tomato-cms::comments.create',
        );
    }

    /**
     * @param \TomatoPHP\TomatoCms\Http\Requests\Comment\CommentStoreRequest $request
     * @return RedirectResponse
     */
    public function store(\TomatoPHP\TomatoCms\Http\Requests\Comment\CommentStoreRequest $request): RedirectResponse
    {
        $response = Tomato::store(
            request: $request,
            model: \TomatoPHP\TomatoCms\Models\Comment::class,
            message: __('Comment created successfully'),
            redirect: 'admin.comments.index',
        );

        return redirect()->back();
    }

    /**
     * @param \TomatoPHP\TomatoCms\Models\Comment $model
     * @return View
     */
    public function show(\TomatoPHP\TomatoCms\Models\Comment $model): View
    {
        return Tomato::get(
            model: $model,
            view: 'tomato-cms::comments.show',
        );
    }

    /**
     * @param \TomatoPHP\TomatoCms\Models\Comment $model
     * @return View
     */
    public function edit(\TomatoPHP\TomatoCms\Models\Comment $model): View
    {
        return Tomato::get(
            model: $model,
            view: 'tomato-cms::comments.edit',
        );
    }

    /**
     * @param \TomatoPHP\TomatoCms\Http\Requests\Comment\CommentUpdateRequest $request
     * @param \TomatoPHP\TomatoCms\Models\Comment $user
     * @return RedirectResponse
     */
    public function update(\TomatoPHP\TomatoCms\Http\Requests\Comment\CommentUpdateRequest $request, \TomatoPHP\TomatoCms\Models\Comment $model): RedirectResponse
    {
        $response = Tomato::update(
            request: $request,
            model: $model,
            message: __('Comment updated successfully'),
            redirect: 'admin.comments.index',
        );

        return redirect()->back();
    }

    /**
     * @param \TomatoPHP\TomatoCms\Models\Comment $model
     * @return RedirectResponse
     */
    public function destroy(\TomatoPHP\TomatoCms\Models\Comment $model): RedirectResponse
    {
        $response = Tomato::destroy(
            model: $model,
            message: __('Comment deleted successfully'),
            redirect: 'admin.comments.index',
        );

        return $response->redirect;

    }
}
