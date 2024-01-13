<x-tomato-admin-container label="{{trans('tomato-admin::global.crud.view')}} {{ __('Portfolio') }} #{{$model->id}}">
    <div class="grid grid-cols-2 gap-4">
        <x-tomato-admin-row type="text" :label="__('Service')" :value="$model->service->name" />
        <x-tomato-admin-row type="text" :label="__('Title')" :value="$model->title" />
        <x-tomato-admin-row type="text" :label="__('Short description')" :value="$model->short_description" />
        <x-tomato-admin-row type="text" :label="__('Keywords')" :value="$model->keywords" />
        <x-tomato-admin-row type="text" :label="__('Company')" :value="$model->company" />
        <x-tomato-admin-row type="bool" :label="__('Activated')" :value="$model->activated" />
        <x-tomato-admin-row type="text" :label="__('Views')" :value="$model->views" />
    </div>

    <div class="flex justify-start gap-2 pt-3">
        <x-tomato-admin-button warning label="{{__('Edit')}}" :href="route('admin.portfolios.edit', $model->id)" modal/>
        <x-tomato-admin-button danger :href="route('admin.portfolios.destroy', $model->id)"
                                confirm="{{trans('tomato-admin::global.crud.delete-confirm')}}"
                                confirm-text="{{trans('tomato-admin::global.crud.delete-confirm-text')}}"
                                confirm-button="{{trans('tomato-admin::global.crud.delete-confirm-button')}}"
                                cancel-button="{{trans('tomato-admin::global.crud.delete-confirm-cancel-button')}}"
                                method="delete"  label="{{__('Delete')}}" />
        <x-tomato-admin-button secondary :href="route('admin.portfolios.index')" label="{{__('Cancel')}}"/>
    </div>
</x-tomato-admin-container>
