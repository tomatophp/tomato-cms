<x-tomato-admin-container label="{{trans('tomato-admin::global.crud.edit')}} {{__('Photo')}} #{{$model->id}}">
    <x-splade-form class="flex flex-col gap-4" action="{{route('admin.photos.update', $model->id)}}" method="post" :default="$model">

        <x-splade-file filepond preview label="{{__('Photo')}}" name="photo" />
        <x-splade-input label="{{__('Name')}}" name="name" type="text"  placeholder="Name" />
        <x-splade-textarea label="{{__('Description')}}" name="description" type="text"  placeholder="Description" />
        <x-splade-input label="{{__('Alt')}}" name="alt" type="text"  placeholder="Alt" />
        <x-splade-input label="{{__('Url')}}" name="url" type="text"  placeholder="Url" />
        <x-splade-input label="{{__('By')}}" name="by" type="text"  placeholder="By" />
        <x-splade-checkbox label="{{__('Activated')}}" name="activated" label="Activated" />

        <x-tomato-admin-submit-buttons table="photos" :model="$model" save delete cancel />
    </x-splade-form>
</x-tomato-admin-container>
