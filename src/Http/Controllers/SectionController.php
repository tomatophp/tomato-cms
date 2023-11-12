<?php

namespace TomatoPHP\TomatoCms\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use TomatoPHP\TomatoAdmin\Facade\Tomato;

class SectionController extends Controller
{
    public string $model;

    public function __construct()
    {
        $this->model = \TomatoPHP\TomatoCms\Models\Section::class;
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
            view: 'tomato-cms::sections.index',
            table: \TomatoPHP\TomatoCms\Tables\SectionTable::class
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
            model: \TomatoPHP\TomatoCms\Models\Section::class,
        );
    }

    /**
     * @return View
     */
    public function create(): View
    {
        return Tomato::create(
            view: 'tomato-cms::sections.create',
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
            model: \TomatoPHP\TomatoCms\Models\Section::class,
            validation: [
                'type' => 'required|max:255|string',
                'view' => ['required', 'max:255','string', function($value, $attribute, $fail) use ($request){
                    if(!view()->exists($request->get('view'))){
                        $fail(__('View does not exist'));
                    }
                }],
                'key' => 'required|max:255|string|unique:sections,key',
                'form_id' => 'nullable|exists:forms,id',
                'activated' => 'nullable',
                'icon' => 'nullable|max:255',
                'color' => 'nullable|max:255'
            ],
            message: __('Section updated successfully'),
            redirect: 'admin.sections.index',
        );

        if($response instanceof JsonResponse){
            return $response;
        }

        return $response->redirect;
    }

    /**
     * @param \TomatoPHP\TomatoCms\Models\Section $model
     * @return View|JsonResponse
     */
    public function show(\TomatoPHP\TomatoCms\Models\Section $model): View|JsonResponse
    {
        return Tomato::get(
            model: $model,
            view: 'tomato-cms::sections.show',
        );
    }

    /**
     * @param \TomatoPHP\TomatoCms\Models\Section $model
     * @return View
     */
    public function edit(\TomatoPHP\TomatoCms\Models\Section $model): View
    {
        return Tomato::get(
            model: $model,
            view: 'tomato-cms::sections.edit',
        );
    }

    /**
     * @param Request $request
     * @param \TomatoPHP\TomatoCms\Models\Section $model
     * @return RedirectResponse|JsonResponse
     */
    public function update(Request $request, \TomatoPHP\TomatoCms\Models\Section $model): RedirectResponse|JsonResponse
    {
        $response = Tomato::update(
            request: $request,
            model: $model,
            validation: [
                'type' => 'sometimes|max:255|string',
                'view' => ['sometimes', 'max:255','string', function($value, $attribute, $fail) use ($request){
                    if(!view()->exists($request->get('view'))){
                        $fail(__('View does not exist'));
                    }
                }],
                'key' => 'sometimes|max:255|string|unique:sections,key,' . $model->id,
                'form_id' => 'nullable|exists:forms,id',
                'activated' => 'nullable',
                'icon' => 'nullable|max:255',
                'color' => 'nullable|max:255'
            ],
            message: __('Section updated successfully'),
            redirect: 'admin.sections.index',
        );

         if($response instanceof JsonResponse){
             return $response;
         }

         return $response->redirect;
    }

    /**
     * @param \TomatoPHP\TomatoCms\Models\Section $model
     * @return RedirectResponse|JsonResponse
     */
    public function destroy(\TomatoPHP\TomatoCms\Models\Section $model): RedirectResponse|JsonResponse
    {
        $response = Tomato::destroy(
            model: $model,
            message: __('Section deleted successfully'),
            redirect: 'admin.sections.index',
        );

        if($response instanceof JsonResponse){
            return $response;
        }

        return $response->redirect;
    }
}
