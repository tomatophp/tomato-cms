<x-tomato-admin-container label="{{trans('tomato-admin::global.crud.view')}} {{ __('Service') }} #{{$model->id}}">
    <div class="grid grid-cols-2 gap-4">
        <x-tomato-admin-row type="text" :label="__('Service')" :value="$model->service->name" />
        <x-tomato-admin-row type="text" :label="__('Name')" :value="$model->name" />
        <x-tomato-admin-row type="text" :label="__('Position')" :value="$model->position" />
        <x-tomato-admin-row type="text" :label="__('Company')" :value="$model->company" />
        <div class="col-span-2">
            <x-tomato-admin-row type="text" :label="__('Comment')" :value="$model->comment" />
        </div>
        <x-tomato-admin-row type="text" :label="__('Rate')" :value="$model->rate" />
    </div>

    <div class="flex justify-start gap-2 pt-3">
        <x-tomato-admin-button warning label="{{__('Edit')}}" :href="route('admin.testimonials.edit', $model->id)" modal/>
        <x-tomato-admin-button danger :href="route('admin.testimonials.destroy', $model->id)"
                                confirm="{{trans('tomato-admin::global.crud.delete-confirm')}}"
                                confirm-text="{{trans('tomato-admin::global.crud.delete-confirm-text')}}"
                                confirm-button="{{trans('tomato-admin::global.crud.delete-confirm-button')}}"
                                cancel-button="{{trans('tomato-admin::global.crud.delete-confirm-cancel-button')}}"
                                method="delete"  label="{{__('Delete')}}" />
        <x-tomato-admin-button secondary :href="route('admin.testimonials.index')" label="{{__('Cancel')}}"/>
    </div>
</x-tomato-admin-container>
