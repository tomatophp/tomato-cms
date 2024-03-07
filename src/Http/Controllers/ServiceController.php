<?php

namespace TomatoPHP\TomatoCms\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use TomatoPHP\TomatoAdmin\Facade\Tomato;

class ServiceController extends Controller
{
    public string $model;

    public function __construct()
    {
        $this->model = \TomatoPHP\TomatoCms\Models\Service::class;
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
            view: 'tomato-cms::services.index',
            table: \TomatoPHP\TomatoCms\Tables\ServiceTable::class
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
            model: \TomatoPHP\TomatoCms\Models\Service::class,
        );
    }

    /**
     * @return View
     */
    public function create(): View
    {
        return Tomato::create(
            view: 'tomato-cms::services.create',
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
            model: \TomatoPHP\TomatoCms\Models\Service::class,
            validation: [
                'icon' => 'nullable|file|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'name' => 'required|array',
                'name*' => 'required|max:255|string',
                'slug' => 'required|max:255|string|unique:services,slug',
                'sku' => 'nullable|max:255|string|unique:services,slug',
                'rate' => 'required',
                'short_description' => 'array',
                'short_description*' => 'string',
                'keywords' => 'array',
                'keywords*' => 'string',
                'features' => 'nullable',
                'process' => 'nullable',
                'body' => 'array',
                'body*' => 'string',
                'activated' => 'required',
                'trend' => 'required',
            ],
            message: __('Service created successfully'),
            redirect: 'admin.services.index',
            hasMedia: true,
            collection: [
                'icon' => false
            ]
        );

        if($response instanceof JsonResponse){
            return $response;
        }

        return $response->redirect;
    }

    /**
     * @param \TomatoPHP\TomatoCms\Models\Service $model
     * @return View|JsonResponse
     */
    public function show(\TomatoPHP\TomatoCms\Models\Service $model): View|JsonResponse
    {
        return Tomato::get(
            model: $model,
            view: 'tomato-cms::services.show',
            hasMedia: true,
            collection: [
                'icon' => false
            ]
        );
    }

    /**
     * @param \TomatoPHP\TomatoCms\Models\Service $model
     * @return View
     */
    public function edit(\TomatoPHP\TomatoCms\Models\Service $model): View
    {
        return Tomato::get(
            model: $model,
            view: 'tomato-cms::services.edit',
            hasMedia: true,
            collection: [
                'icon' => false
            ]
        );
    }

    /**
     * @param Request $request
     * @param \TomatoPHP\TomatoCms\Models\Service $model
     * @return RedirectResponse|JsonResponse
     */
    public function update(Request $request, \TomatoPHP\TomatoCms\Models\Service $model): RedirectResponse|JsonResponse
    {
        $response = Tomato::update(
            request: $request,
            model: $model,
            validation: [
                'icon' => 'nullable|file|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'name' => 'sometimes|array',
                'name*' => 'sometimes|max:255|string',
                'slug' => 'sometimes|max:255|string',
                'sku' => 'nullable|max:255|string',
                'rate' => 'sometimes',
                'short_description' => 'nullable|max:65535',
                'keywords' => 'nullable',
                'features' => 'nullable',
                'process' => 'nullable',
                'body' => 'nullable',
                'activated' => 'sometimes',
                'trend' => 'sometimes',
            ],
            message: __('Service updated successfully'),
            redirect: 'admin.services.index',
            hasMedia: true,
            collection: [
                'icon' => false
            ]
        );

         if($response instanceof JsonResponse){
             return $response;
         }

         return $response->redirect;
    }

    /**
     * @param \TomatoPHP\TomatoCms\Models\Service $model
     * @return RedirectResponse|JsonResponse
     */
    public function destroy(\TomatoPHP\TomatoCms\Models\Service $model): RedirectResponse|JsonResponse
    {
        $response = Tomato::destroy(
            model: $model,
            message: __('Service deleted successfully'),
            redirect: 'admin.services.index',
            hasMedia: true,
            collection: [
                'icon' => false
            ]
        );

        if($response instanceof JsonResponse){
            return $response;
        }

        return $response->redirect;
    }
}
