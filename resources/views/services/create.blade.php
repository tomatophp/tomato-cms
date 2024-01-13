<x-tomato-admin-container label="{{trans('tomato-admin::global.crud.create')}} {{__('Service')}}">
    <x-splade-form class="flex flex-col gap-4"  action="{{route('admin.services.store')}}" method="post">
        <x-splade-select
            label="{{__('Page')}}"
            placeholder="{{__('Page')}}"
            name="page_id"
            remote-url="/admin/pages/api"
            remote-root="data"
            option-label="title[{{\Illuminate\Support\Str::of(app()->getLocale())->remove(' ')}}]"
            option-value="id"
            choices
        />

        <x-splade-select
            label="{{__('Form')}}"
            placeholder="{{__('Form')}}"
            name="form_id"
            remote-url="/admin/forms/api"
            remote-root="data"
            option-label="name[{{\Illuminate\Support\Str::of(app()->getLocale())->remove(' ')}}]"
            option-value="id"
            choices
        />

        <x-splade-file preview filepond class="col-span-2" name="icon" label="{{__('Icon')}}" />
        <x-splade-input label="{{__('Name [EN]')}}" @input="form.slug = form.name.en.replaceAll(' ', '-')" name="name[en]" type="text"  placeholder="Name" />
        <x-splade-input label="{{__('Name [AR]')}}" @input="form.slug = form.name.ar.replaceAll(' ', '-')" name="name[ar]" type="text"  placeholder="Name" />
        <x-splade-input label="{{__('Slug')}}" name="slug" type="text"  placeholder="Slug" />
        <x-splade-input label="{{__('Sku')}}" name="sku" type="text"  placeholder="Sku" />
        <x-splade-input label="{{__('Rate')}}" type='number' name="rate" placeholder="Rate" />
        <x-splade-textarea class="col-span-2" label="{{__('Short description [EN]')}}" name="short_description[en]" type="text"  placeholder="Short description" />
        <x-splade-textarea class="col-span-2" label="{{__('Short description [AR]')}}" name="short_description[ar]" type="text"  placeholder="Short description" />
        <x-splade-textarea class="col-span-2" label="{{__('Keywords [EN]')}}" name="keywords[en]" type="text"  placeholder="Keywords" />
        <x-splade-textarea class="col-span-2" label="{{__('Keywords [AR]')}}" name="keywords[ar]" type="text"  placeholder="Keywords" />

        <x-splade-checkbox label="{{__('Activated')}}" name="activated" label="Activated" />
        <x-splade-checkbox label="{{__('Trend')}}" name="trend" label="Trend" />

        <div class="flex justify-start gap-2 pt-3">
            <x-tomato-admin-submit label="{{__('Save')}}" :spinner="true" />
            <x-tomato-admin-button secondary :href="route('admin.services.index')" label="{{__('Cancel')}}"/>
        </div>
    </x-splade-form>
</x-tomato-admin-container>
