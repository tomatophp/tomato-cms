<x-splade-data :default="['form_lang'=> app()->getLocale()]" remember="form_lang" local-storage>
    <x-tomato-admin-container label="{{trans('tomato-admin::global.crud.edit')}} {{__('Page')}} #{{$model->id}}">
        <x-slot:buttons>
            <x-tomato-admin-button type="button" @click.prevent="data.form_lang === 'ar' ? data.form_lang='en' : data.form_lang='ar'">@{{data.form_lang ?? data.lang.id}} </x-tomato-admin-button>
        </x-slot:buttons>

        <x-splade-form class="flex flex-col space-y-4" action="{{route('admin.pages.update', $model->id)}}" method="post" :default="array_merge($model->toArray(), ['lang'=> app()->getLocale()])">

            <x-splade-file filepond preview name="cover" :label="__('Cover Image')" />
            <x-splade-file filepond preview multiple name="gallery" :label="__('Gallery Images')" />

            <div v-if="data.form_lang === 'en'" class="flex flex-col gap-4">
                <x-splade-input :label="__('Title [EN]')" :placeholder="__('Title [EN]')" name="title.en" type='text' />
                <x-splade-input :label="__('Slug')" name="slug" type="text"  :placeholder="__('Slug')" />
                <x-tomato-markdown-editor  name="body[en]"  :label="__('Body [EN]')"/>
                <x-splade-textarea :label="__('Short Description')" name="short_description.en" :placeholder="__('Short Description')" />
                <x-splade-textarea :label="__('Keywords')" name="keywords.en"  :placeholder="__('Keywords')" />
            </div>

            <div v-if="data.form_lang === 'ar'" class="flex flex-col gap-4">
                <x-splade-input :label="__('Title [AR]')"  :placeholder="__('Title [AR]')" name="title.ar" type='text' />
                <x-splade-input :label="__('Slug')" name="slug" type="text"  :placeholder="__('Slug')" />
                <x-tomato-markdown-editor  name="body[ar]" :label="__('Body [AR]')"/>
                <x-splade-textarea :label="__('Short Description')" name="short_description.ar" :placeholder="__('Short Description')" />
                <x-splade-textarea :label="__('Keywords')" name="keywords.ar"  :placeholder="__('Keywords')" />
            </div>

            <x-splade-checkbox :label="__('Is active')" name="is_active" label="Is active" />

            <x-splade-checkbox :label="__('Has view')" name="has_view" label="Has view" />
            <x-splade-input v-if="form.has_view" :label="__('View')" name="view" type="text"  :placeholder="__('View')" />
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
</x-splade-data>
