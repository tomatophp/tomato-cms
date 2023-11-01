<x-splade-data :default="['form_lang'=> app()->getLocale()]" remember="form_lang" local-storage>
    <x-tomato-admin-container label="{{trans('tomato-admin::global.crud.edit')}} {{__('Skill')}} #{{$model->id}}">

        <x-slot:buttons>
            <x-tomato-admin-button type="button" @click.prevent="data.form_lang === 'ar' ? data.form_lang='en' : data.form_lang='ar'">@{{data.form_lang ?? data.lang.id}} </x-tomato-admin-button>
        </x-slot:buttons>

        <x-splade-form class="flex flex-col space-y-4" action="{{route('admin.skills.update', $model->id)}}" method="post" :default="$model">
            <x-splade-file filepond preview label="{{__('Image')}}" name="image"  placeholder="Image" />

            <div v-if="data.form_lang === 'ar'" class="grid grid-cols-2 gap-4">
                <x-splade-input label="{{__('Name [AR]')}}" name="name[ar]" type="text"  placeholder="Name" />
                <x-splade-input label="{{__('Description [AR]')}}" name="description[ar]" type="text"  placeholder="Description" />
            </div>
            <div v-else class="grid grid-cols-2 gap-4">
                <x-splade-input label="{{__('Name [EN]')}}" name="name[en]" type="text"  placeholder="Name" />
                <x-splade-input label="{{__('Description [EN]')}}" name="description[en]" type="text"  placeholder="Description" />
            </div>
            <x-splade-input label="{{__('Exp')}}" type='number' name="exp" placeholder="Exp" />
            <x-splade-input label="{{__('Icon')}}" name="icon" placeholder="Icon" />
            <x-splade-textarea label="{{__('URL')}}" name="url" placeholder="URL" autosize />

            <x-tomato-admin-submit-buttons table="skills" :model="$model" save cancel delete />
        </x-splade-form>
    </x-tomato-admin-container>
</x-splade-data>
