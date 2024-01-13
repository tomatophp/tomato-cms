<x-tomato-admin-container label="{{trans('tomato-admin::global.crud.edit')}} {{__('Skill')}} #{{$model->id}}">

    <x-splade-form class="flex flex-col space-y-4" action="{{route('admin.skills.update', $model->id)}}" method="post" :default="$model">
        <x-splade-file filepond preview label="{{__('Image')}}" name="image"  placeholder="Image" />

        <x-splade-input label="{{__('Name [EN]')}}" name="name[en]" type="text"  placeholder="{{__('Name [EN]')}}" />
        <x-splade-input label="{{__('Name [AR]')}}" name="name[ar]" type="text"  placeholder="{{__('Name [AR]')}}" />

        <x-splade-input label="{{__('Description [EN]')}}" name="description[en]" type="text"  placeholder="{{__('Description [EN]')}}" />
        <x-splade-input label="{{__('Description [AR]')}}" name="description[ar]" type="text"  placeholder="{{__('Description [AR]')}}" />

        <x-splade-input label="{{__('Exp')}}" type='number' name="exp" placeholder="{{__('Exp')}}" />
        <x-splade-input label="{{__('Icon')}}" name="icon"  placeholder="{{__('Icon')}}" />
        <x-splade-textarea label="{{__('URL')}}" name="url" placeholder="{{__('URL')}}" autosize />

        <div class="flex justify-start gap-2 pt-3">
            <x-tomato-admin-submit label="{{__('Save')}}" :spinner="true" />
            <x-tomato-admin-button danger :href="route('admin.skills.destroy', $model->id)"
                                   confirm="{{trans('tomato-admin::global.crud.delete-confirm')}}"
                                   confirm-text="{{trans('tomato-admin::global.crud.delete-confirm-text')}}"
                                   confirm-button="{{trans('tomato-admin::global.crud.delete-confirm-button')}}"
                                   cancel-button="{{trans('tomato-admin::global.crud.delete-confirm-cancel-button')}}"
                                   method="delete"  label="{{__('Delete')}}" />
            <x-tomato-admin-button secondary :href="route('admin.skills.index')" label="{{__('Cancel')}}"/>
        </div>
    </x-splade-form>
</x-tomato-admin-container>
