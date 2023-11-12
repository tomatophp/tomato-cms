<x-tomato-admin-container label="{{trans('tomato-admin::global.crud.edit')}} {{__('Page')}} #{{$model->id}}">
    <x-splade-form class="flex flex-col space-y-4" action="{{route('admin.pages.update', $model->id)}}" method="post" :default="$model">

        <x-splade-file filepond preview name="cover" :label="__('Cover Image')" />
        <x-splade-file filepond preview multiple name="gallery" :label="__('Gallery Images')" />

        <div class="grid grid-cols-2 gap-4">
            <x-splade-input :label="__('Title [EN]')" @input="form.slug = form.title.en.replace(' ', '-').toLowerCase()" :placeholder="__('Title [EN]')" name="title.en" type='text' />
            <x-splade-input :label="__('Title [AR]')" :placeholder="__('Title [AR]')" name="title.ar" type='text' />
        </div>

        <x-splade-input :label="__('Slug')" name="slug" type="text"  :placeholder="__('Slug')" />

        <x-tomato-admin-rich name="body.ar" :label="__('Body [AR]')"/>
        <x-tomato-admin-rich name="body.en"  :label="__('Body [EN]')"/>

        <x-splade-checkbox :label="__('Is active')" name="is_active" label="Is active" />

        <x-splade-checkbox :label="__('Has view')" name="has_view" label="Has view" />
        <x-splade-input :label="__('View')" name="view" type="text"  :placeholder="__('View')" />
        <x-tomato-admin-color :label="__('Color')" :placeholder="__('Color')" type='number' name="color" />

        <div class="flex justify-start gap-2 pt-3">
            <x-tomato-admin-submit  label="{{__('Save')}}" :spinner="true" />
            <x-tomato-admin-button danger :href="route('admin.pages.destroy', $model->id)"
                                   confirm="{{trans('tomato-admin::global.crud.delete-confirm')}}"
                                   confirm-text="{{trans('tomato-admin::global.crud.delete-confirm-text')}}"
                                   confirm-button="{{trans('tomato-admin::global.crud.delete-confirm-button')}}"
                                   cancel-button="{{trans('tomato-admin::global.crud.delete-confirm-cancel-button')}}"
                                   method="delete"  label="{{__('Delete')}}" />
            <x-tomato-admin-button secondary :href="route('admin.pages.index')" label="{{__('Cancel')}}"/>
        </div>
    </x-splade-form>
</x-tomato-admin-container>
