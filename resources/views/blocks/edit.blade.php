<x-splade-modal class="font-main">
    <h1 class="text-2xl font-bold mb-4">{{trans('tomato-admin::global.crud.edit')}} {{__('Block')}} #{{$model->id}}</h1>

    <x-splade-form class="flex flex-col space-y-4" action="{{route('admin.blocks.update', $model->id)}}" method="post" :default="$model">
        
          <x-splade-input label="{{__('Title')}}" name="title" type="text"  placeholder="Title" />
          
          
          <x-splade-input label="{{__('Description')}}" name="description" type="text"  placeholder="Description" />
          <x-splade-input label="{{__('Body')}}" name="body" type="text"  placeholder="Body" />
          <x-splade-input label="{{__('Button')}}" name="button" type="text"  placeholder="Button" />
          <x-splade-input label="{{__('Url')}}" name="url" type="text"  placeholder="Url" />
          <x-splade-input label="{{__('Key')}}" name="key" type="text"  placeholder="Key" />
          

        <x-splade-submit label="{{trans('tomato-admin::global.crud.update')}} {{__('Block')}}" :spinner="true" />
    </x-splade-form>
</x-splade-modal>
