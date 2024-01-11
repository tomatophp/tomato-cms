<x-tomato-admin-container label="{{trans('tomato-admin::global.crud.edit')}} {{__('Post')}} #{{$model->id}}">

    <x-splade-form class="flex flex-col gap-4" action="{{route('admin.posts.update', $model->id)}}" method="post" :default="$model">
        <x-splade-file filepond preview name="feature" label="{{__('Feature Image')}}" />
        <x-splade-select label="{{__('Category')}}" multiple placeholder="Category" relation name="categories[]" remote-url="/admin/categories/api" remote-root="data" option-label="name[{{\Illuminate\Support\Str::of(app()->getLocale())->remove(' ')}}]" option-value="id" choices/>
        <x-splade-select label="{{__('Type')}}" placeholder="Type" name="type" remote-url="/admin/types/api?for=posts" remote-root="data" option-label="name[{{\Illuminate\Support\Str::of(app()->getLocale())->remove(' ')}}]" option-value="key" choices/>

        <x-splade-input class="w-full" label="{{__('Title [EN]')}}" @input="form.slug = form.title.en.replaceAll(' ', '-')" name="title[en]" type="text"  placeholder="Title" />
        <x-splade-input class="w-full" label="{{__('Title [AR]')}}" @input="form.slug = form.title.ar.replaceAll(' ', '-')" name="title[ar]" type="text"  placeholder="Title" />

        <x-splade-input label="{{__('Slug')}}" name="slug" type="text"  placeholder="Slug" />

        <x-tomato-markdown-editor name="body[en]" label="{{__('Body [EN]')}}"/>
        <x-tomato-markdown-editor name="body[ar]" label="{{__('Body [AR]')}}" />

        <x-splade-textarea label="{{__('Short description [EN]')}}" name="short_description[en]" placeholder="Short description" autosize />
        <x-splade-textarea label="{{__('Short description [AR]')}}" name="short_description[ar]" placeholder="Short description" autosize />

        <x-splade-textarea label="{{__('Keywords [EN]')}}" name="keywords[en]" placeholder="Keywords" autosize />
        <x-splade-textarea label="{{__('Keywords [AR]')}}" name="keywords[ar]" placeholder="Keywords" autosize />

        <x-splade-checkbox label="{{__('Activated')}}" name="activated" />
        <x-splade-checkbox label="{{__('Trend')}}" name="trend"  />

        <div v-if="form.type === 'open-source'" class="flex flex-col space-y-4 mb-4">
            <x-splade-input label="{{__('GitHub Repo URL')}}" name="meta_url" type="text"  placeholder="Meta URL" />
            <x-splade-input label="{{__('On Click Redirect To')}}" name="meta_redirect" type="text"  placeholder="Meta Redirect" />
        </div>

        <div v-if="form.type === 'videos'" class="flex flex-col space-y-4 mb-4">
            <x-splade-input label="{{__('Youtube Video URL')}}" name="meta_url" type="text"  placeholder="Meta URL" />
            <x-splade-input label="{{__('On Click Redirect To')}}" name="meta_redirect" type="text"  placeholder="Meta Redirect" />
        </div>

        <x-tomato-admin-submit-buttons table="posts" :model="$model" save delete cancel />
    </x-splade-form>

</x-tomato-admin-container>
