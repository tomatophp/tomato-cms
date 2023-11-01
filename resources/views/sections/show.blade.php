<x-tomato-admin-container label="{{trans('tomato-admin::global.crud.view')}} {{ __('Section') }} #{{$model->id}}">
    <div class="grid grid-cols-2 gap-4">
        <x-tomato-admin-row :label="__('Type')" :value="$model->type" />
        <x-tomato-admin-row :label="__('Place')" :value="$model->place" />
        <x-tomato-admin-row :label="__('Title')" :value="$model->title" />
        <x-tomato-admin-row :label="__('Button')" :value="$model->button" />
        <x-tomato-admin-row :label="__('Url')" :value="$model->url" />
        <x-tomato-admin-row :label="__('Activated')" :value="$model->activated" type="bool" />
        <div class="col-span-2">
            <x-tomato-admin-row :label="__('Description')" :value="$model->description" />
        </div>
    </div>

    <x-tomato-admin-submit-buttons table="sections" :model="$model" edit delete cancel />

</x-tomato-admin-container>
