<?php

namespace TomatoPHP\TomatoCms\Tables;

use Illuminate\Http\Request;
use ProtoneMedia\Splade\AbstractTable;
use ProtoneMedia\Splade\Facades\Toast;
use ProtoneMedia\Splade\SpladeTable;

class CommentTable extends AbstractTable
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
        return \TomatoPHP\TomatoCms\Models\Comment::query();
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
            ->withGlobalSearch(label: trans('tomato-admin::global.search'),columns: ['id','account.name','parent.id',])
            ->bulkAction(
                label: trans('tomato-admin::global.crud.delete'),
                each: fn (\TomatoPHP\TomatoCms\Models\Comment $model) => $model->delete(),
                after: fn () => Toast::danger(__('Comment Has Been Deleted'))->autoDismiss(2),
                confirm: true
            )
            ->export()
            ->defaultSort('id')
            ->column(
                key: 'id',
                label: __('Id'),
                sortable: true)
            ->column(
                key: 'account.name',
                label: __('Account'),
                sortable: true,
                searchable: true)
            ->column(
                key: 'parent.id',
                label: __('Parent'),
                sortable: true,
                searchable: true)
            ->column(
                key: 'model_id',
                label: __('Model id'),
                sortable: true)
            ->column(
                key: 'model_type',
                label: __('Model type'),
                sortable: true)
            ->column(
                key: 'comment',
                label: __('Comment'),
                sortable: true)
            ->column(
                key: 'active',
                label: __('Active'),
                sortable: true)
            ->column(key: 'actions',label: trans('tomato-admin::global.crud.actions'))
            ->paginate(15);
    }
}
