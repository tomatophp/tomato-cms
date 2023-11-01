<x-splade-data :default="['form_lang'=> app()->getLocale()]" remember="form_lang" local-storage>
    <x-tomato-admin-container label="{{trans('tomato-admin::global.crud.create')}} {{__('Portfolios')}}">

        <x-slot:buttons>
            <x-tomato-admin-button type="button" @click.prevent="data.form_lang === 'ar' ? data.form_lang='en' : data.form_lang='ar'">@{{data.form_lang ?? data.lang.id}} </x-tomato-admin-button>
        </x-slot:buttons>

        <x-splade-form class="flex flex-col space-y-4"  action="{{route('admin.portfolios.store')}}" method="post">
            <x-splade-file filepond preview name="feature" label="{{__('Feature')}}" />
            <x-splade-file filepond preview name="images[]" label="{{__('Images')}}"  multiple />

            <div v-if="data.form_lang === 'ar'" class="grid grid-cols-2 gap-4">
                <x-splade-input class="col-span-2" label="{{__('Title [AR]')}}" name="title[ar]" type="text"  placeholder="Title" />
                <x-splade-select label="{{__('Service')}}" placeholder="{{__('Service')}}" name="service_id" remote-url="/admin/services/api" remote-root="data" :option-label="'name.'.app()->getLocale()" option-value="id" choices/>
                <x-splade-input label="{{__('Company [AR]')}}" name="company[ar]" type="text"  placeholder="Company" />
                <div class="col-span-2" >
                    <x-tomato-markdown-editor name="body[ar]" label="{{__('Body [AR]')}}" />
                </div>
                <x-splade-input class="col-span-2" label="{{__('Short description [AR]')}}" name="short_description[ar]" type="text"  placeholder="Short description" />
                <x-splade-textarea class="col-span-2" label="{{__('Keywords [AR]')}}" name="keywords[ar]" placeholder="Keywords" autosize />
            </div>
            <div v-else class="grid grid-cols-2 gap-4">
                <x-splade-input class="col-span-2" label="{{__('Title [EN]')}}" name="title[en]" type="text"  placeholder="Title" />
                <x-splade-select label="{{__('Service')}}" placeholder="{{__('Service')}}" name="service_id" remote-url="/admin/services/api" remote-root="data" :option-label="'name.'.app()->getLocale()" option-value="id" choices/>
                <x-splade-input label="{{__('Short description [EN]')}}" name="short_description[en]" type="text"  placeholder="Short description" />
                <div class="col-span-2" >
                    <x-tomato-markdown-editor name="body[en]" label="{{__('Body [EN]')}}"/>
                </div>
                <x-splade-textarea class="col-span-2" label="{{__('Keywords [EN]')}}" name="keywords[en]" placeholder="Keywords" autosize />
                <x-splade-input class="col-span-2" label="{{__('Company [EN]')}}" name="company[en]" type="text"  placeholder="Company" />
            </div>

            <x-splade-checkbox label="{{__('Activated')}}" name="activated" />

            <x-tomato-admin-submit-buttons table="portfolios" save cancel />
        </x-splade-form>
    </x-tomato-admin-container>
</x-splade-data>
