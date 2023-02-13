<x-splade-modal class="font-main">
    <h1 class="text-2xl font-bold mb-4">{{trans('tomato-admin::global.crud.create')}} {{__('ContentsMeta')}}</h1>

    <x-splade-form class="flex flex-col space-y-4" action="{{route('admin.contents-metas.store')}}" method="post">
        
          <x-splade-select label="{{__('content')}}" placeholder="Content id" name="content_id" remote-url="/admin/contents/api" remote-root="model.data" option-label=name option-`value=`"id" choices/>
          
          <x-splade-input label="{{__('Model type')}}" name="model_type" type="text"  placeholder="Model type" />
          <x-splade-input label="{{__('Key')}}" name="key" type="text"  placeholder="Key" />
          

        <x-splade-submit label="{{trans('tomato-admin::global.crud.create-new')}} {{__('ContentsMeta')}}" :spinner="true" />
    </x-splade-form>
</x-splade-modal>
