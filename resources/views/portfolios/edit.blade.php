<x-tomato-admin-container label="{{trans('tomato-admin::global.crud.edit')}} {{__('Portfolio')}} #{{$model->id}}">

    <x-splade-form class="flex flex-col space-y-4"  action="{{route('admin.portfolios.update', $model->id)}}" method="post" :default="$model">
        <x-splade-file filepond preview name="feature" label="{{__('Feature')}}" />
        <x-splade-file filepond preview name="images[]" label="{{__('Images')}}"  multiple />

        <x-splade-input class="col-span-2" label="{{__('Title [AR]')}}" name="title[ar]" type="text"  placeholder="{{__('Title [AR]')}}" />
        <x-splade-input class="col-span-2" label="{{__('Title [EN]')}}" name="title[en]" type="text"  placeholder="{{__('Title [EN]')}}" />
        <x-splade-input class="col-span-2" label="{{__('Company [EN]')}}" name="company[en]" type="text"  placeholder="{{__('Company [EN]')}}" />
        <x-splade-input class="col-span-2" label="{{__('Company [AR]')}}" name="company[ar]" type="text"  placeholder="{{__('Company [AR]')}}" />
        <div class="col-span-2" >
            <x-tomato-markdown-editor name="body[ar]" label="{{__('Body [AR]')}}" />
        </div>
        <div class="col-span-2" >
            <x-tomato-markdown-editor name="body[en]" label="{{__('Body [EN]')}}"/>
        </div>
        <x-splade-input class="col-span-2" label="{{__('Short description [EN]')}}" name="short_description[en]" type="text"  placeholder="{{__('Short description [EN]')}}" />
        <x-splade-input class="col-span-2" label="{{__('Short description [AR]')}}" name="short_description[ar]" type="text"  placeholder="{{__('Short description [AR]')}}" />
        <x-splade-textarea class="col-span-2" label="{{__('Keywords [EN]')}}" name="keywords[en]" placeholder="{{__('Keywords [EN]')}}" autosize />
        <x-splade-textarea class="col-span-2" label="{{__('Keywords [AR]')}}" name="keywords[ar]" placeholder="{{__('Keywords [AR]')}}" autosize />

        <x-splade-checkbox label="{{__('Activated')}}" name="activated" />

        <x-tomato-admin-submit-buttons table="portfolios" :model="$model" save cancel delete />
    </x-splade-form>

</x-tomato-admin-container>
