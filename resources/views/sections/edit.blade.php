<x-tomato-admin-container label="{{trans('tomato-admin::global.crud.edit')}} {{__('Section')}} #{{$model->id}}">
    <x-splade-form class="flex flex-col space-y-4" action="{{route('admin.sections.update', $model->id)}}" method="post" :default="$model">

        <x-splade-input label="{{__('Type')}}" name="type" type="text"  placeholder="Type" />
        <x-splade-input label="{{__('Place')}}" name="place" type="text"  placeholder="Place" />
        <x-splade-input label="{{__('Title [AR]')}}" name="title[ar]" type="text"  placeholder="Title" />
        <x-splade-input label="{{__('Title [EN]')}}" name="title[en]" type="text"  placeholder="Title" />
        <x-splade-input label="{{__('Description [AR]')}}" name="description[ar]" type="text"  placeholder="Description" />
        <x-splade-input label="{{__('Description [EN]')}}" name="description[en]" type="text"  placeholder="Description" />
        <x-splade-input label="{{__('Button [AR]')}}" name="button[ar]" type="text"  placeholder="Button" />
        <x-splade-input label="{{__('Button [EN]')}}" name="button[en]" type="text"  placeholder="Button" />
        <x-splade-input label="{{__('Url')}}" name="url" type="text"  placeholder="Url" />

        <x-splade-checkbox label="{{__('Activated')}}" name="activated" label="Activated" />

        <x-tomato-admin-repeater name="body" label="{{__('Body')}}" :options="['type', 'title', 'url']">
            <div class="flex flex-col gap-4">
                <x-splade-input v-model="repeater.main[key].type" label="Type" placeholder="Type"/>
                <x-splade-input v-model="repeater.main[key].title.ar" label="Title" placeholder="Title [AR]"/>
                <x-splade-input v-model="repeater.main[key].title.en" label="Title" placeholder="Title [EN]"/>
                <x-splade-input v-model="repeater.main[key].url" label="URL" placeholder="URL"/>
            </div>
        </x-tomato-admin-repeater>

        <x-tomato-admin-submit-buttons table="sections" :model="$model" save delete cancel />
    </x-splade-form>
</x-tomato-admin-container>
