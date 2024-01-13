<x-tomato-admin-container label="{{trans('tomato-admin::global.crud.view')}} {{ __('Service') }} #{{$model->id}}">
    <div class="grid grid-cols-2 gap-4">
        <x-tomato-admin-row type="text" :label="__('Name')" :value="$model->name" />
        <x-tomato-admin-row type="text" :label="__('Description')" :value="$model->description" />
        <x-tomato-admin-row type="text" :label="__('Exp')" :value="$model->exp" />
        <x-tomato-admin-row type="icon" :label="__('Icon')" :value="$model->icon" />
    </div>

    <div class="flex justify-start gap-2 pt-3">
        <x-tomato-admin-button warning label="{{__('Edit')}}" :href="route('admin.skills.edit', $model->id)"/>
        <x-tomato-admin-button danger :href="route('admin.skills.destroy', $model->id)"
                                confirm="{{trans('tomato-admin::global.crud.delete-confirm')}}"
                                confirm-text="{{trans('tomato-admin::global.crud.delete-confirm-text')}}"
                                confirm-button="{{trans('tomato-admin::global.crud.delete-confirm-button')}}"
                                cancel-button="{{trans('tomato-admin::global.crud.delete-confirm-cancel-button')}}"
                                method="delete"  label="{{__('Delete')}}" />
        <x-tomato-admin-button secondary :href="route('admin.skills.index')" label="{{__('Cancel')}}"/>
    </div>
</x-tomato-admin-container>
