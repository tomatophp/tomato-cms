<x-tomato-admin-container label="{{trans('tomato-admin::global.crud.edit')}} {{__('Photo')}} #{{$model->id}}">
    <x-splade-form class="flex flex-col gap-4" action="{{route('admin.photos.update', $model->id)}}" method="post" :default="$model">

        <x-splade-file filepond preview label="{{__('Photo')}}" name="photo" />
        <x-splade-input label="{{__('Name')}}" name="name" type="text"  placeholder="Name" />
        <x-splade-textarea label="{{__('Description')}}" name="description" type="text"  placeholder="Description" />
        <x-splade-input label="{{__('Alt')}}" name="alt" type="text"  placeholder="Alt" />
        <x-splade-input label="{{__('Url')}}" name="url" type="text"  placeholder="Url" />
        <x-splade-input label="{{__('By')}}" name="by" type="text"  placeholder="By" />
        <x-splade-checkbox label="{{__('Activated')}}" name="activated" label="Activated" />

        <div class="flex justify-start gap-2 pt-3">
            <x-tomato-admin-submit label="{{__('Save')}}" :spinner="true" />
            <x-tomato-admin-button danger :href="route('admin.photos.destroy', $model->id)"
                                   confirm="{{trans('tomato-admin::global.crud.delete-confirm')}}"
                                   confirm-text="{{trans('tomato-admin::global.crud.delete-confirm-text')}}"
                                   confirm-button="{{trans('tomato-admin::global.crud.delete-confirm-button')}}"
                                   cancel-button="{{trans('tomato-admin::global.crud.delete-confirm-cancel-button')}}"
                                   method="delete"  label="{{__('Delete')}}" />
            <x-tomato-admin-button secondary :href="route('admin.photos.index')" label="{{__('Cancel')}}"/>
        </div>
    </x-splade-form>
</x-tomato-admin-container>
