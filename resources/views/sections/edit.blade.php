<x-tomato-admin-container label="{{trans('tomato-admin::global.crud.edit')}} {{__('Section')}} #{{$model->id}}">
    <x-splade-form class="flex flex-col space-y-4" action="{{route('admin.sections.update', $model->id)}}" method="post" :default="$model">

        <x-splade-select choices label="{{__('Type')}}" name="type" placeholder="{{__('Type')}}">
            @foreach(config('tomato-cms.sections') as $key => $section)
                <option value="{{$key}}">{{$section}}</option>
            @endforeach
            <options value=""></options>
        </x-splade-select>
        <x-splade-input label="{{__('Key')}}" name="key" type="text"  placeholder="{{__('Key')}}" />
        <x-splade-input label="{{__('View Path')}}" name="view" type="text"  placeholder="{{__('View Path')}}" />
        <div class="flex justifiy-between gap-4">
            <x-splade-input label="{{__('Icon')}}" name="icon" placeholder="bx bx-user" class="w-full" />
            <x-tomato-admin-color label="{{__('Color')}}" name="color" />
        </div>
        <x-splade-checkbox label="{{__('Activated')}}" name="activated" />

        <x-splade-select choices
                         remote-root="data"
                         :remote-url="route('admin.forms.api')"
                         option-value="id"
                         option-label="title.{{app()->getLocale()}}"
                         name="form_id"
                         label="{{__('Form')}}"
                         placeholder="{{__('Form')}}" />

        <x-tomato-admin-submit-buttons table="sections" :model="$model" save delete cancel />
    </x-splade-form>
</x-tomato-admin-container>
