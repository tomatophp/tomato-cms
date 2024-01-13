<x-tomato-admin-container label="{{trans('tomato-admin::global.crud.view')}} {{ __('Photo') }} #{{$model->id}}">
    <div class="grid grid-cols-2 gap-4">
        <x-tomato-admin-row :label="__('Photo')" :value="$model->photo" type="image"/>
        <x-tomato-admin-row :label="__('Name')" :value="$model->name" type="text"/>
        <x-tomato-admin-row :label="__('Description')" :value="$model->description" type="text"/>
        <x-tomato-admin-row :label="__('Alt')" :value="$model->alt" type="text"/>
        <x-tomato-admin-row :label="__('By')" :value="$model->by" type="text"/>
        <x-tomato-admin-row :label="__('Url')" :value="$model->url" type="text"/>
        <x-tomato-admin-row :label="__('Views')" :value="$model->views" type="number"/>
        <x-tomato-admin-row :label="__('Activated')" :value="$model->activated" type="bool"/>
    </div>

    <div class="flex justify-start gap-2 pt-3">
        <x-tomato-admin-button warning label="{{__('Edit')}}" :href="route('admin.photos.edit', $model->id)" modal/>
        <x-tomato-admin-button danger :href="route('admin.photos.destroy', $model->id)"
                                confirm="{{trans('tomato-admin::global.crud.delete-confirm')}}"
                                confirm-text="{{trans('tomato-admin::global.crud.delete-confirm-text')}}"
                                confirm-button="{{trans('tomato-admin::global.crud.delete-confirm-button')}}"
                                cancel-button="{{trans('tomato-admin::global.crud.delete-confirm-cancel-button')}}"
                                method="delete"  label="{{__('Delete')}}" />
        <x-tomato-admin-button secondary :href="route('admin.photos.index')" label="{{__('Cancel')}}"/>
    </div>
</x-tomato-admin-container>
