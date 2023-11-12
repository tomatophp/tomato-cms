<x-tomato-admin-container label="{{__('Update Section Content')}}">
    <x-tomato-form
        :form="$section->form"
        method="POST"
        action="{{route('admin.pages.meta.store', $model->id)}}"
        :default="array_merge(['section' => $section->id], $model->meta($section->id) ?? [])"
    />
</x-tomato-admin-container>
