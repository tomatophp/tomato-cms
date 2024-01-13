<x-tomato-admin-container label="{{trans('tomato-admin::global.crud.edit')}} {{__('Testimonial')}} #{{$model->id}}">

    <x-splade-form class="flex flex-col gap-4" action="{{route('admin.testimonials.update', $model->id)}}" method="post" :default="$model">
        <x-splade-select label="{{__('Service')}}" placeholder="{{__('Service')}}" name="service_id" remote-url="/admin/services/api" remote-root="data" option-label="name.{{app()->getLocale()}}" option-value="id" choices/>

        <x-splade-input label="{{__('Name [EN]')}}" name="name[en]" type="text"  placeholder="{{__('Name [EN]')}}" />
        <x-splade-input label="{{__('Name [AR]')}}" name="name[ar]" type="text"  placeholder="{{__('Name [AR]')}}" />

        <x-splade-input label="{{__('Position [EN]')}}" name="position[en]" type="text"  placeholder="{{__('Position [EN]')}}" />
        <x-splade-input label="{{__('Position [AR]')}}" name="position[ar]" type="text"  placeholder="{{__('Position [AR]')}}" />

        <x-splade-input class="col-span-2" label="{{__('Company [EN]')}}" name="company[en]" type="text"  placeholder="{{__('Company [EN]')}}" />
        <x-splade-input class="col-span-2" label="{{__('Company [AR]')}}" name="company[ar]" type="text"  placeholder="{{__('Company [AR]')}}" />

        <x-splade-textarea class="col-span-2" label="{{__('Comment [EN]')}}" name="comment[en]" placeholder="{{__('Comment [EN]')}}" autosize />
        <x-splade-textarea class="col-span-2" label="{{__('Comment [AR]')}}" name="comment[ar]" placeholder="{{__('Comment [AR]')}}" autosize />


        <x-splade-input label="{{__('Rate')}}" type='number' name="rate" placeholder="Rate" />

        <div class="flex justify-start gap-2 pt-3">
            <x-tomato-admin-submit label="{{__('Save')}}" :spinner="true" />
            <x-tomato-admin-button danger :href="route('admin.testimonials.destroy', $model->id)"
                                   confirm="{{trans('tomato-admin::global.crud.delete-confirm')}}"
                                   confirm-text="{{trans('tomato-admin::global.crud.delete-confirm-text')}}"
                                   confirm-button="{{trans('tomato-admin::global.crud.delete-confirm-button')}}"
                                   cancel-button="{{trans('tomato-admin::global.crud.delete-confirm-cancel-button')}}"
                                   method="delete"  label="{{__('Delete')}}" />
            <x-tomato-admin-button secondary :href="route('admin.testimonials.index')" label="{{__('Cancel')}}"/>
        </div>
    </x-splade-form>

</x-tomato-admin-container>
