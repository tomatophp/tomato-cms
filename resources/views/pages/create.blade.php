<x-tomato-admin-container label="{{trans('tomato-admin::global.crud.create')}} {{__('Page')}}">
    <x-splade-form class="flex flex-col gap-4" action="{{route('admin.pages.store')}}" method="post" :default="[
            'galary' => [],
            'title' => [
                'ar' => '',
                'en' => ''
            ],
            'short_description' => [
                'ar' => '',
                'en' => ''
            ],
            'keywords' => [
                'ar' => '',
                'en' => ''
            ],
            'body' => [
                'ar' => '',
                'en' => ''
            ]
        ]">
        <x-splade-file filepond preview name="cover" :label="__('Cover Image')" />
        <x-splade-file filepond preview multiple name="gallery" :label="__('Gallery Images')" />

        <x-splade-input :label="__('Title [EN]')" @input="form.slug = form.title.en.replace(' ', '-').toLowerCase()" :placeholder="__('Title [EN]')" name="title.en" type='text' />
        <x-splade-input :label="__('Title [AR]')" @input="form.slug = form.title.ar.replace(' ', '-').toLowerCase()" :placeholder="__('Title [AR]')" name="title.ar" type='text' />
        <x-splade-input :label="__('Slug')" name="slug" type="text"  :placeholder="__('Slug')" />
        <x-tomato-markdown-editor  name="body[en]"  :label="__('Body [EN]')"/>
        <x-tomato-markdown-editor  name="body[ar]" :label="__('Body [AR]')"/>

        <x-splade-textarea :label="__('Short Description')" name="short_description.en" :placeholder="__('Short Description [EN]')" />
        <x-splade-textarea :label="__('Short Description')" name="short_description.ar" :placeholder="__('Short Description [AR]')" />

        <x-splade-textarea :label="__('Keywords')" name="keywords.en"  :placeholder="__('Keywords [EN]')" />
        <x-splade-textarea :label="__('Keywords')" name="keywords.ar"  :placeholder="__('Keywords [AR]')" />


        <x-splade-checkbox :label="__('Is active')" name="is_active" label="Is active" />
        <x-splade-checkbox :label="__('Has view')" name="has_view" label="Has view" />
        <x-splade-input v-if="form.has_view" :label="__('View')" name="view" type="text"  :placeholder="__('View')" />
        <x-tomato-admin-color :label="__('Color')" :placeholder="__('Color')" type='number' name="color" />

        <div class="flex justify-start gap-2 pt-3">
            <x-tomato-admin-submit label="{{__('Save')}}" :spinner="true" />
            <x-tomato-admin-button secondary :href="route('admin.pages.index')" label="{{__('Cancel')}}"/>
        </div>
    </x-splade-form>
</x-tomato-admin-container>
