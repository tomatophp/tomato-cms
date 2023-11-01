<x-splade-data :default="['form_lang'=> app()->getLocale()]" remember="form_lang" local-storage>
    <x-tomato-admin-container label="{{trans('tomato-admin::global.crud.create')}} {{__('Post')}}">

        <x-slot:buttons>
            <x-tomato-admin-button type="button" @click.prevent="data.form_lang === 'ar' ? data.form_lang='en' : data.form_lang='ar'">@{{data.form_lang ?? data.lang.id}} </x-tomato-admin-button>
        </x-slot:buttons>

            <x-splade-form :default="['type'=> 'post', 'body' => [
            'ar' => '',
            'en' => '',
        ], 'categories' => []]" action="{{route('admin.posts.store')}}" method="post">
                <div class="grid grid-cols-1 gap-4" v-if="data.form_lang === 'ar'">
                    <x-splade-file filepond preview name="feature" label="{{__('Feature Image')}}" />
                    <x-splade-select label="{{__('Category')}}" multiple placeholder="Category" relation name="categories[]" remote-url="/admin/categories/api" remote-root="data" option-label="name[{{\Illuminate\Support\Str::of(app()->getLocale())->remove(' ')}}]" option-value="id" choices/>
                    <x-splade-select label="{{__('Type')}}" placeholder="Type" name="type" remote-url="/admin/types/api?for=posts" remote-root="data" option-label="name[{{\Illuminate\Support\Str::of(app()->getLocale())->remove(' ')}}]" option-value="key" choices/>

                    <x-splade-input class="w-full" label="{{__('Title [AR]')}}" @input="form.slug = form.title.ar.replaceAll(' ', '-')" name="title[ar]" type="text"  placeholder="Title" />
                    <x-splade-input label="{{__('Slug')}}" name="slug" type="text"  placeholder="Slug" />
                    <x-tomato-markdown-editor name="body[ar]" label="{{__('Body [AR]')}}" />

                    <x-splade-textarea label="{{__('Short description [AR]')}}" name="short_description[ar]" placeholder="Short description" autosize />
                    <x-splade-textarea label="{{__('Keywords [AR]')}}" name="keywords[ar]" placeholder="Keywords" autosize />


                    <x-splade-checkbox label="{{__('Activated')}}" name="activated" />
                    <x-splade-checkbox label="{{__('Trend')}}" name="trend" />
                </div>

                <div class="grid grid-cols-1 gap-4" v-else>
                    <x-splade-file filepond preview name="feature" label="{{__('Feature Image')}}" />
                    <x-splade-select label="{{__('Category')}}" multiple placeholder="Category" relation name="categories[]" remote-url="/admin/categories/api" remote-root="data" option-label="name[{{\Illuminate\Support\Str::of(app()->getLocale())->remove(' ')}}]" option-value="id" choices/>
                    <x-splade-select label="{{__('Type')}}" placeholder="Type" name="type" remote-url="/admin/types/api?for=posts" remote-root="data" option-label="name[{{\Illuminate\Support\Str::of(app()->getLocale())->remove(' ')}}]" option-value="key" choices/>

                    <x-splade-input class="w-full" label="{{__('Title [EN]')}}" @input="form.slug = form.title.en.replaceAll(' ', '-')" name="title[en]" type="text"  placeholder="Title" />
                    <x-splade-input label="{{__('Slug')}}" name="slug" type="text"  placeholder="Slug" />
                    <x-tomato-markdown-editor name="body[en]" label="{{__('Body [EN]')}}"/>

                    <x-splade-textarea label="{{__('Short description [EN]')}}" name="short_description[en]" placeholder="Short description" autosize />
                    <x-splade-textarea label="{{__('Keywords [EN]')}}" name="keywords[en]" placeholder="Keywords" autosize />

                    <x-splade-checkbox label="{{__('Activated')}}" name="activated" />
                    <x-splade-checkbox label="{{__('Trend')}}" name="trend"  />
                </div>

                <div v-if="form.type === 'open-source'" class="flex flex-col space-y-4 mb-4">
                    <x-splade-input label="{{__('GitHub Repo URL')}}" name="meta_url" type="text"  placeholder="Meta URL" />
                    <x-splade-input label="{{__('On Click Redirect To')}}" name="meta_redirect" type="text"  placeholder="Meta Redirect" />
                </div>

                <div v-if="form.type === 'videos'" class="flex flex-col space-y-4 mb-4">
                    <x-splade-input label="{{__('Youtube Video URL')}}" name="meta_url" type="text"  placeholder="Meta URL" />
                    <x-splade-input label="{{__('On Click Redirect To')}}" name="meta_redirect" type="text"  placeholder="Meta Redirect" />
                </div>


                <x-tomato-admin-submit-buttons table="posts" save cancel />
            </x-splade-form>

    </x-tomato-admin-container>
</x-splade-data>
