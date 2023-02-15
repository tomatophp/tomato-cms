<?php

namespace TomatoPHP\TomatoCms\Tables;

use Illuminate\Http\Request;
use ProtoneMedia\Splade\AbstractTable;
use ProtoneMedia\Splade\Facades\Toast;
use ProtoneMedia\Splade\SpladeTable;
use TomatoPHP\TomatoCategory\Models\Type;

class ContentTable extends AbstractTable
{
    /**
     * Create a new instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the user is authorized to perform bulk actions and exports.
     *
     * @return bool
     */
    public function authorize(Request $request)
    {
        return true;
    }

    /**
     * The resource or query builder.
     *
     * @return mixed
     */
    public function for()
    {
        return \TomatoPHP\TomatoCms\Models\Content::query();
    }

    /**
     * Configure the given SpladeTable.
     *
     * @param \ProtoneMedia\Splade\SpladeTable $table
     * @return void
     */
    public function configure(SpladeTable $table)
    {
        $table
            ->withGlobalSearch(label: trans('tomato-admin::global.search'),columns: ['id','type.name','category.name','slug',])
            ->bulkAction(
                label: trans('tomato-admin::global.crud.delete'),
                each: fn (\TomatoPHP\TomatoCms\Models\Content $model) => $model->delete(),
                after: fn () => Toast::danger(__('Content Has Been Deleted'))->autoDismiss(2),
                confirm: true
            )
            ->selectFilter('type_id',
                options:Type::where('for', 'content')->get()->pluck('name', 'id')->toArray(),
                label: __('Type'))
            ->export()
            ->defaultSort('id')
            ->column(
                key: 'title',
                label: __('Title'),
                sortable: true)
            ->column(
                key: 'short_description',
                label: __('Description'),
                sortable: true)
            ->column(
                key: 'published',
                label: __('Published'),
                sortable: true)
            ->column(
                key: 'featured',
                label: __('Featured'),
                sortable: true)
            ->column(key: 'actions',label: trans('tomato-admin::global.crud.actions'))
            ->paginate(15);
    }
}
