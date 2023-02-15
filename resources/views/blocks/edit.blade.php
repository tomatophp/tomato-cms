<x-tomato-admin-layout>
    <x-slot name="header">
        {{trans('tomato-admin::global.crud.edit')}} {{__('Block')}} #{{$model->id}}
    </x-slot>
    <x-splade-form class="flex flex-col space-y-4" action="{{route('admin.blocks.update', $model->id)}}" method="post" :default="$model">

        <x-splade-input label="{{__('Title')}}" name="title" type="text"  placeholder="Title" />

        <x-tomato-code label="{{__('HTML')}}" name="html"  placeholder="HTML" />

        <x-splade-input label="{{__('Description')}}" name="description" type="text"  placeholder="Description" />
        <x-splade-input label="{{__('Body')}}" name="body" type="text"  placeholder="Body" />
        <x-splade-input label="{{__('Button')}}" name="button" type="text"  placeholder="Button" />
        <x-splade-input label="{{__('Url')}}" name="url" type="text"  placeholder="Url" />


        <x-splade-submit label="{{trans('tomato-admin::global.crud.update')}} {{__('Block')}}" :spinner="true" />
    </x-splade-form>
</x-tomato-admin-layout>
