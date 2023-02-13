<x-splade-modal class="font-main">
    <h1 class="text-2xl font-bold mb-4">{{trans('tomato-admin::global.crud.create')}} {{__('Seo')}}</h1>

    <x-splade-form class="flex flex-col space-y-4" action="{{route('admin.seos.store')}}" method="post">
        
          
          <x-splade-input label="{{__('Model type')}}" name="model_type" type="text"  placeholder="Model type" />
          <x-splade-input label="{{__('Title')}}" name="title" type="text"  placeholder="Title" />
          <x-splade-textarea label="{{__('Description')}}" name="description" placeholder="Description" autosize />
          <x-splade-textarea label="{{__('Keywords')}}" name="keywords" placeholder="Keywords" autosize />
          <x-splade-input label="{{__('Share')}}" type='number' name="share" placeholder="Share" />
          <x-splade-input label="{{__('Likes')}}" type='number' name="likes" placeholder="Likes" />
          <x-splade-input label="{{__('Views')}}" type='number' name="views" placeholder="Views" />

        <x-splade-submit label="{{trans('tomato-admin::global.crud.create-new')}} {{__('Seo')}}" :spinner="true" />
    </x-splade-form>
</x-splade-modal>
