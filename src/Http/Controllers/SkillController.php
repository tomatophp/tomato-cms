<?php

namespace TomatoPHP\TomatoCms\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use TomatoPHP\TomatoAdmin\Facade\Tomato;

class SkillController extends Controller
{
    public string $model;

    public function __construct()
    {
        $this->model = \TomatoPHP\TomatoCms\Models\Skill::class;
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
            view: 'tomato-cms::skills.index',
            table: \TomatoPHP\TomatoCms\Tables\SkillTable::class
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
            model: \TomatoPHP\TomatoCms\Models\Skill::class,
        );
    }

    /**
     * @return View
     */
    public function create(): View
    {
        return Tomato::create(
            view: 'tomato-cms::skills.create',
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
            model: \TomatoPHP\TomatoCms\Models\Skill::class,
            validation: [
                'name' => 'required|max:255|string',
                'description' => 'nullable|max:255|string',
                'exp' => 'required',
                'icon' => 'nullable|max:65535',
                'url' => 'nullable|max:65535'
            ],
            message: __('Skill updated successfully'),
            redirect: 'admin.skills.index',
            hasMedia: true,
            collection: [
                "image" => false
            ]
        );

        if($response instanceof JsonResponse){
            return $response;
        }

        return $response->redirect;
    }

    /**
     * @param \TomatoPHP\TomatoCms\Models\Skill $model
     * @return View|JsonResponse
     */
    public function show(\TomatoPHP\TomatoCms\Models\Skill $model): View|JsonResponse
    {
        return Tomato::get(
            model: $model,
            view: 'tomato-cms::skills.show',
            hasMedia: true,
            collection: [
                "image" => false
            ]
        );
    }

    /**
     * @param \TomatoPHP\TomatoCms\Models\Skill $model
     * @return View
     */
    public function edit(\TomatoPHP\TomatoCms\Models\Skill $model): View
    {
        return Tomato::get(
            model: $model,
            view: 'tomato-cms::skills.edit',
            hasMedia: true,
            collection: [
                "image" => false
            ]
        );
    }

    /**
     * @param Request $request
     * @param \TomatoPHP\TomatoCms\Models\Skill $model
     * @return RedirectResponse|JsonResponse
     */
    public function update(Request $request, \TomatoPHP\TomatoCms\Models\Skill $model): RedirectResponse|JsonResponse
    {
        $response = Tomato::update(
            request: $request,
            model: $model,
            validation: [
                'name' => 'sometimes|max:255|string',
                'description' => 'nullable|max:255|string',
                'exp' => 'sometimes',
                'icon' => 'nullable|max:65535',
                'url' => 'nullable|max:65535'
            ],
            message: __('Skill updated successfully'),
            redirect: 'admin.skills.index',
            hasMedia: true,
            collection: [
                "image" => false
            ]
        );

         if($response instanceof JsonResponse){
             return $response;
         }

         return $response->redirect;
    }

    /**
     * @param \TomatoPHP\TomatoCms\Models\Skill $model
     * @return RedirectResponse|JsonResponse
     */
    public function destroy(\TomatoPHP\TomatoCms\Models\Skill $model): RedirectResponse|JsonResponse
    {
        $response = Tomato::destroy(
            model: $model,
            message: __('Skill deleted successfully'),
            redirect: 'admin.skills.index',
            hasMedia: true,
            collection: [
                "image" => false
            ]
        );

        if($response instanceof JsonResponse){
            return $response;
        }

        return $response->redirect;
    }
}
