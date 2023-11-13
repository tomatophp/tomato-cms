<?php

namespace TomatoPHP\TomatoCms\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\View\View;
use ProtoneMedia\Splade\Facades\Toast;
use TomatoPHP\TomatoAdmin\Facade\Tomato;
use TomatoPHP\TomatoCms\Models\PageHasSections;
use TomatoPHP\TomatoCms\Models\Section;
use TomatoPHP\TomatoCms\Transformers\PagesResource;

class PageController extends Controller
{
    public string $model;

    public function __construct()
    {
        $this->model = \TomatoPHP\TomatoCms\Models\Page::class;
    }

    /**
     * List All Pages
     *
     * get all pages on the system
     *
     * @param Request $request
     * @return View|JsonResponse
     */
    public function index(Request $request): View|JsonResponse
    {
        return Tomato::index(
            request: $request,
            model: $this->model,
            view: 'tomato-cms::pages.index',
            table: \TomatoPHP\TomatoCms\Tables\PageTable::class,
            resource: config('tomato-cms.resources.pages.index')
        );
    }

    public function builder(Request $request, \TomatoPHP\TomatoCms\Models\Page $model): View|JsonResponse
    {
        $sections = Section::where('activated', 1)->get()->groupBy('type');
        return view('tomato-cms::pages.builder', compact('model', 'sections'));
    }

    public function meta(Request $request,\TomatoPHP\TomatoCms\Models\Page $model){
        $request->validate([
            "section" => "required|exists:page_has_sections,id"
        ]);


        $section = PageHasSections::find($request->get('section'))->section;
        $sectionID = $request->get('section');

        if($section->form){
            $model->with('pageMeta');
            return view('tomato-cms::pages.meta', compact('model', 'section', 'sectionID'));
        }
        else {
            Toast::danger(__('Sorry This Section Do Not Have Options'))->autoDismiss(2);
            return redirect()->back();
        }

    }

    public function metaStore(Request $request, \TomatoPHP\TomatoCms\Models\Page $model){
        $request->validate([
            "section" => "required|exists:page_has_sections,id"
        ]);

        $data = $request->all();

        if(isset($data['image'])){
            $image = $data['image']->storeAs('public/sections', time() . '.' . $request->file('image')->extension());
            $data['image'] =  url(Str::replace('public', 'storage', $image));
        }

        if(isset($data['images']) && is_array($data['images'])){
            $images = [];
            foreach ($data['images'] as $image){
                $image = $image->storeAs('public/sections', time() . '.' . $image->extension());
                $images[] = url(Str::replace('public', 'storage', $image));
            }

            $data['images'] = $images;
        }

        $model->meta($request->get('section'), $data);

        Toast::success(__('Section updated successfully'))->autoDismiss(2);
        return redirect()->back();
    }

    public function remove(Request $request, \TomatoPHP\TomatoCms\Models\Page $model){
        $request->validate([
            "section" => "required|exists:page_has_sections,id"
        ]);

        PageHasSections::find($request->get('section'))->delete();

        Toast::success(__('Section removed successfully'))->autoDismiss(2);
        return redirect()->back();
    }

    public function sections(Request $request, \TomatoPHP\TomatoCms\Models\Page $model){
        $request->validate([
            "section" => "required|exists:sections,id"
        ]);

        $model->sections()->attach($request->get('section'), ['order' => $model->sections()->count() + 1]);

        Toast::success(__('Section added successfully'))->autoDismiss(2);
        return redirect()->back();
    }

    public function clear(\TomatoPHP\TomatoCms\Models\Page $model){
        $model->sections()->sync([]);

        Toast::success(__('Sections cleared successfully'))->autoDismiss(2);
        return redirect()->back();
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function api(Request $request): JsonResponse
    {
        return Tomato::json(
            request: $request,
            model: \TomatoPHP\TomatoCms\Models\Page::class,
        );
    }

    /**
     * @return View
     */
    public function create(): View
    {
        return Tomato::create(
            view: 'tomato-cms::pages.create',
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
            model: \TomatoPHP\TomatoCms\Models\Page::class,
            validation: [
                'color' => 'nullable|max:255',
                'title' => 'required|array',
                'title*' => 'required|string|max:255',
                'short_description' => 'nullable|array',
                'slug' => 'required|max:255|string',
                'body' => 'nullable|array',
                'is_active' => 'nullable',
                'has_view' => 'nullable',
                'view' => 'nullable|max:255|string'
            ],
            message: __('Page updated successfully'),
            redirect: 'admin.pages.index',
            hasMedia: true,
            collection: [
                "cover" => false,
                "gallery" => true,
            ]
        );

        if($response instanceof JsonResponse){
            return $response;
        }

        return $response->redirect;
    }

    /**
     * Get Page Content By Slug
     *
     * you can select a page by slug to view it's content
     *
     * @param \TomatoPHP\TomatoCms\Models\Page $model
     * @return View|JsonResponse
     */
    public function show($model): View|JsonResponse
    {
        $model = \TomatoPHP\TomatoCms\Models\Page::where('slug', $model)->orWhere('id', $model)->firstOrFail();
        if($model){
            return Tomato::get(
                model: $model,
                view: 'tomato-cms::pages.show',
                hasMedia: true,
                collection: [
                    "cover" => false,
                    "gallery" => true,
                ],
                resource: config('tomato-cms.resources.pages.show')
            );
        }
        else {
            abort(404);
        }

    }

    /**
     * @param \TomatoPHP\TomatoCms\Models\Page $model
     * @return View
     */
    public function edit(\TomatoPHP\TomatoCms\Models\Page $model): View
    {
        return Tomato::get(
            model: $model,
            view: 'tomato-cms::pages.edit',
            hasMedia: true,
            collection: [
                "cover" => false,
                "gallery" => true,
            ]
        );
    }

    /**
     * @param Request $request
     * @param \TomatoPHP\TomatoCms\Models\Page $model
     * @return RedirectResponse|JsonResponse
     */
    public function update(Request $request, \TomatoPHP\TomatoCms\Models\Page $model): RedirectResponse|JsonResponse
    {
        $response = Tomato::update(
            request: $request,
            model: $model,
            validation: [
                'color' => 'nullable|max:255',
                'title' => 'sometimes|array',
                'title*' => 'sometimes|string|max:255',
                'short_description' => 'nullable|array',
                'slug' => 'sometimes|max:255|string',
                'body' => 'nullable|array',
                'is_active' => 'nullable',
                'has_view' => 'nullable',
                'view' => 'nullable|max:255|string'
            ],
            message: __('Page updated successfully'),
            redirect: 'admin.pages.index',
            hasMedia: true,
            collection: [
                "cover" => false,
                "gallery" => true,
            ]
        );

         if($response instanceof JsonResponse){
             return $response;
         }

         return $response->redirect;
    }

    /**
     * @param \TomatoPHP\TomatoCms\Models\Page $model
     * @return RedirectResponse|JsonResponse
     */
    public function destroy(\TomatoPHP\TomatoCms\Models\Page $model): RedirectResponse|JsonResponse
    {
        if($model->lock){
            Toast::danger(__('Locked Page Can Not Be Deleted'))->autoDismiss(2);
            return back();
        }

        $response = Tomato::destroy(
            model: $model,
            message: __('Page deleted successfully'),
            redirect: 'admin.pages.index',
        );

        if($response instanceof JsonResponse){
            return $response;
        }

        return $response->redirect;
    }
}
