<x-tomato-admin-container label="{{__('Update Section Content')}}">
    <x-tomato-form
        :form="$section->form"
        method="POST"
        action="{{route('admin.pages.meta.store', $model->id)}}"
        :default="array_merge(['section' => $sectionID], $model->meta($sectionID) ?? [])"
    />
</x-tomato-admin-container>
