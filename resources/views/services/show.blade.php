<x-tomato-admin-container label="{{trans('tomato-admin::global.crud.view')}} {{ __('Service') }} #{{$model->id}}">
    <div class="grid grid-cols-2 gap-4">
        <x-tomato-admin-row type="text" :label="__('Name')" :value="$model->name" />
        <x-tomato-admin-row type="text" :label="__('Slug')" :value="$model->slug" />
        <x-tomato-admin-row type="text" :label="__('Sku')" :value="$model->sku" />
        <x-tomato-admin-row type="text" :label="__('Rate')" :value="$model->rate" />
        <div class="col-span-2">
            <x-tomato-admin-row type="text" :label="__('Body')" :value="$model->body" />
        </div>
        <div class="col-span-2">
            <x-tomato-admin-row type="text" :label="__('Short description')" :value="$model->short_description" />
        </div>
        <div class="col-span-2">
            <x-tomato-admin-row type="text" :label="__('Keywords')" :value="$model->keywords" />
        </div>
        <x-tomato-admin-row type="bool" :label="__('Activated')" :value="$model->activated" />
        <x-tomato-admin-row type="bool" :label="__('Trend')" :value="$model->trend" />
        <x-tomato-admin-row type="number" :label="__('Views')" :value="$model->views" />
    </div>

    <div class="flex justify-start gap-2 pt-3">
        <x-tomato-admin-button warning label="{{__('Edit')}}" :href="route('admin.services.edit', $model->id)"/>
        <x-tomato-admin-button danger :href="route('admin.services.destroy', $model->id)"
                                confirm="{{trans('tomato-admin::global.crud.delete-confirm')}}"
                                confirm-text="{{trans('tomato-admin::global.crud.delete-confirm-text')}}"
                                confirm-button="{{trans('tomato-admin::global.crud.delete-confirm-button')}}"
                                cancel-button="{{trans('tomato-admin::global.crud.delete-confirm-cancel-button')}}"
                                method="delete"  label="{{__('Delete')}}" />
        <x-tomato-admin-button secondary :href="route('admin.services.index')" label="{{__('Cancel')}}"/>
    </div>
</x-tomato-admin-container>
