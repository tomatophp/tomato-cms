<x-tomato-admin-container label="{{trans('tomato-admin::global.crud.edit')}} {{__('Skill')}} #{{$model->id}}">

    <x-splade-form class="flex flex-col space-y-4" action="{{route('admin.skills.update', $model->id)}}" method="post" :default="$model">
        <x-splade-file filepond preview label="{{__('Image')}}" name="image"  placeholder="Image" />

        <x-splade-input label="{{__('Name [EN]')}}" name="name[en]" type="text"  placeholder="{{__('Name [EN]')}}" />
        <x-splade-input label="{{__('Name [AR]')}}" name="name[ar]" type="text"  placeholder="{{__('Name [AR]')}}" />

        <x-splade-input label="{{__('Description [EN]')}}" name="description[en]" type="text"  placeholder="{{__('Description [EN]')}}" />
        <x-splade-input label="{{__('Description [AR]')}}" name="description[ar]" type="text"  placeholder="{{__('Description [AR]')}}" />

        <x-splade-input label="{{__('Exp')}}" type='number' name="exp" placeholder="{{__('Exp')}}" />
        <x-tomato-admin-icon label="{{__('Icon')}}" name="icon" placeholder="{{__('Icon')}}" />
        <x-splade-textarea label="{{__('URL')}}" name="url" placeholder="{{__('URL')}}" autosize />

        <x-tomato-admin-submit-buttons table="skills" :model="$model" save cancel delete />
    </x-splade-form>
</x-tomato-admin-container>
