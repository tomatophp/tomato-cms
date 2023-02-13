<x-splade-modal class="font-main">
    <h1 class="text-2xl font-bold mb-4">{{trans('tomato-admin::global.crud.edit')}} {{__('Content')}} #{{$model->id}}</h1>

    <x-splade-form class="flex flex-col space-y-4" action="{{route('admin.contents.update', $model->id)}}" method="post" :default="$model">

        <x-splade-select label="{{__('type')}}" placeholder="Type id" name="type_id" remote-url="/admin/types/api" remote-root="model.data" option-label=name option-`value=`"id" choices/>
        <x-splade-select label="{{__('category')}}" placeholder="Category id" name="category_id" remote-url="/admin/categories/api" remote-root="model.data" option-label=name option-`value=`"id" choices/>

        <x-splade-input label="{{__('Model type')}}" name="model_type" type="text"  placeholder="Model type" />
        <x-splade-input label="{{__('Title')}}" name="title" type="text"  placeholder="Title" />
        <x-splade-input label="{{__('Slug')}}" name="slug" type="text"  placeholder="Slug" />

        <x-splade-textarea label="{{__('Short description')}}" name="short_description" placeholder="Short description" autosize />
        <x-splade-checkbox label="{{__('Published')}}" name="published" label="Published" />
        <x-splade-checkbox label="{{__('Featured')}}" name="featured" label="Featured" />

        <x-splade-submit label="{{trans('tomato-admin::global.crud.update')}} {{__('Content')}}" :spinner="true" />
    </x-splade-form>
</x-splade-modal>
