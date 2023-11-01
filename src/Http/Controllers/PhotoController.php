<?php

namespace TomatoPHP\TomatoCms\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use TomatoPHP\TomatoAdmin\Facade\Tomato;

class PhotoController extends Controller
{
    public string $model;

    public function __construct()
    {
        $this->model = \TomatoPHP\TomatoCms\Models\Photo::class;
    }

    /**
     * @param Request $request
     * @return View|JsonResponse
     */
    public function index(Request $request): View|JsonResponse
    {
        return Tomato::index(
            request: $request,
            model: $this->model,
            view: 'tomato-cms::photos.index',
            table: \TomatoPHP\TomatoCms\Tables\PhotoTable::class
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
            model: \TomatoPHP\TomatoCms\Models\Photo::class,
        );
    }

    /**
     * @return View
     */
    public function create(): View
    {
        return Tomato::create(
            view: 'tomato-cms::photos.create',
        );
    }

    /**
     * @param Request $request
     * @return RedirectResponse|JsonResponse
     */
    public function store(Request $request): RedirectResponse|JsonResponse
    {
        $response = Tomato::store(
            request: $request,
            model: \TomatoPHP\TomatoCms\Models\Photo::class,
            validation: [
                'photo' => 'required|file|mimes:jpg,jpeg,png,gif,svg|max:2048',
                'name' => 'required|max:255|string',
                'alt' => 'nullable|max:255|string',
                'url' => 'nullable|max:255|string',
                'description' => 'nullable|max:255|string',
                'by' => 'nullable|max:255|string',
                'activated' => 'required'
            ],
            message: __('Photo updated successfully'),
            redirect: 'admin.photos.index',
            hasMedia: true,
            collection: [
                'photo' => false
            ]
        );

        if($response instanceof JsonResponse){
            return $response;
        }

        return $response->redirect;
    }

    /**
     * @param \TomatoPHP\TomatoCms\Models\Photo $model
     * @return View|JsonResponse
     */
    public function show(\TomatoPHP\TomatoCms\Models\Photo $model): View|JsonResponse
    {
        return Tomato::get(
            model: $model,
            view: 'tomato-cms::photos.show',
            hasMedia: true,
            collection: [
                'photo' => false
            ]
        );
    }

    /**
     * @param \TomatoPHP\TomatoCms\Models\Photo $model
     * @return View
     */
    public function edit(\TomatoPHP\TomatoCms\Models\Photo $model): View
    {
        return Tomato::get(
            model: $model,
            view: 'tomato-cms::photos.edit',
            hasMedia: true,
            collection: [
                'photo' => false
            ]
        );
    }

    /**
     * @param Request $request
     * @param \TomatoPHP\TomatoCms\Models\Photo $model
     * @return RedirectResponse|JsonResponse
     */
    public function update(Request $request, \TomatoPHP\TomatoCms\Models\Photo $model): RedirectResponse|JsonResponse
    {
        $response = Tomato::update(
            request: $request,
            model: $model,
            validation: [
                'photo' => 'sometimes|file|mimes:jpg,jpeg,png,gif,svg|max:2048',
                'name' => 'sometimes|max:255|string',
                'alt' => 'nullable|max:255|string',
                'url' => 'nullable|max:255|string',
                'description' => 'nullable|max:255|string',
                'by' => 'nullable|max:255|string',
                'activated' => 'sometimes'
            ],
            message: __('Photo updated successfully'),
            redirect: 'admin.photos.index',
            hasMedia: true,
            collection: [
                'photo' => false
            ]
        );

         if($response instanceof JsonResponse){
             return $response;
         }

         return $response->redirect;
    }

    /**
     * @param \TomatoPHP\TomatoCms\Models\Photo $model
     * @return RedirectResponse|JsonResponse
     */
    public function destroy(\TomatoPHP\TomatoCms\Models\Photo $model): RedirectResponse|JsonResponse
    {
        $response = Tomato::destroy(
            model: $model,
            message: __('Photo deleted successfully'),
            redirect: 'admin.photos.index',
            hasMedia: true,
            collection: [
                'photo' => false
            ]
        );

        if($response instanceof JsonResponse){
            return $response;
        }

        return $response->redirect;
    }
}
