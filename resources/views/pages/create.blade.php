<x-tomato-admin-container label="{{trans('tomato-admin::global.crud.create')}} {{__('Page')}}">
    <x-splade-form class="flex flex-col space-y-4" action="{{route('admin.pages.store')}}" method="post" :default="[
    'lang' => app()->getLocale(),
    'galary' => [],
    'body' => [
        'ar' => '',
        'en' => ''
    ]]">
        <x-tomato-admin-button type="button" @click.prevent="form.lang === 'en' ? form.lang = 'ar' : form.lang = 'en'">
            @{{form.lang}}
        </x-tomato-admin-button>
        <x-splade-file filepond preview name="cover" :label="__('Cover Image')" />
        <x-splade-file filepond preview multiple name="gallery" :label="__('Gallery Images')" />

        <x-splade-input v-if="form.lang === 'en'" :label="__('Title [EN]')" @input="form.slug = form.title.en.replace(' ', '-').toLowerCase()" :placeholder="__('Title [EN]')" name="title.en" type='text' />
        <x-splade-input v-if="form.lang === 'ar'" :label="__('Title [AR]')" @input="form.slug = form.title.ar.replace(' ', '-').toLowerCase()" :placeholder="__('Title [AR]')" name="title.ar" type='text' />

          <x-splade-input :label="__('Slug')" name="slug" type="text"  :placeholder="__('Slug')" />

            <x-tomato-admin-rich v-if="form.lang === 'ar'" name="body.ar" :label="__('Body [AR]')"/>
            <x-tomato-admin-rich v-if="form.lang === 'en'" name="body.en"  :label="__('Body [EN]')"/>

          <x-splade-checkbox :label="__('Is active')" name="is_active" label="Is active" />

          <x-splade-checkbox :label="__('Has view')" name="has_view" label="Has view" />
          <x-splade-input v-if="form.has_view" :label="__('View')" name="view" type="text"  :placeholder="__('View')" />
          <x-tomato-admin-color :label="__('Color')" :placeholder="__('Color')" type='number' name="color" />

        <div class="flex justify-start gap-2 pt-3">
            <x-tomato-admin-submit  label="{{__('Save')}}" :spinner="true" />
            <x-tomato-admin-button secondary :href="route('admin.pages.index')" label="{{__('Cancel')}}"/>
        </div>
    </x-splade-form>
</x-tomato-admin-container>
