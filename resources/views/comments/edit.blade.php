<x-splade-modal class="font-main">
    <h1 class="text-2xl font-bold mb-4">{{trans('tomato-admin::global.crud.edit')}} {{__('Comment')}} #{{$model->id}}</h1>

    <x-splade-form class="flex flex-col space-y-4" action="{{route('admin.comments.update', $model->id)}}" method="post" :default="$model">
        
          <x-splade-select label="{{__('account')}}" placeholder="Account id" name="account_id" remote-url="/admin/accounts/api" remote-root="model.data" option-label=name option-`value=`"id" choices/>
          <x-splade-select label="{{__('parent')}}" placeholder="Parent id" name="parent_id" remote-url="/admin/comments/api" remote-root="model.data" option-label=name option-`value=`"id" choices/>
          
          <x-splade-input label="{{__('Model type')}}" name="model_type" type="text"  placeholder="Model type" />
          <x-splade-textarea label="{{__('Comment')}}" name="comment" placeholder="Comment" autosize />
          <x-splade-checkbox label="{{__('Active)}}" name="active" label="Active" />

        <x-splade-submit label="{{trans('tomato-admin::global.crud.update')}} {{__('Comment')}}" :spinner="true" />
    </x-splade-form>
</x-splade-modal>
