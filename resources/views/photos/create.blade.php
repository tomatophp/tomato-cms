<x-tomato-admin-container label="{{trans('tomato-admin::global.crud.create')}} {{__('Photo')}}">
    <x-splade-form class="flex flex-col gap-4" action="{{route('admin.photos.store')}}" method="post">

        <x-splade-file filepond preview label="{{__('Photo')}}" name="photo" />
        <x-splade-input label="{{__('Name')}}" name="name" type="text"  placeholder="Name" />
        <x-splade-textarea label="{{__('Description')}}" name="description" type="text"  placeholder="Description" />
        <x-splade-input label="{{__('Alt')}}" name="alt" type="text"  placeholder="Alt" />
        <x-splade-input label="{{__('Url')}}" name="url" type="text"  placeholder="Url" />
        <x-splade-input label="{{__('By')}}" name="by" type="text"  placeholder="By" />
        <x-splade-checkbox label="{{__('Activated')}}" name="activated" label="Activated" />

        <div class="flex justify-start gap-2 pt-3">
            <x-tomato-admin-submit label="{{__('Save')}}" :spinner="true" />
            <x-tomato-admin-button secondary :href="route('admin.photos.index')" label="{{__('Cancel')}}"/>
        </div>
    </x-splade-form>
</x-tomato-admin-container>
