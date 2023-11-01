<x-splade-data :default="['form_lang'=> app()->getLocale()]" remember="form_lang" local-storage>
    <x-tomato-admin-container label="{{trans('tomato-admin::global.crud.edit')}} {{__('Testimonial')}} #{{$model->id}}">

        <x-slot:buttons>
            <x-tomato-admin-button type="button" @click.prevent="data.form_lang === 'ar' ? data.form_lang='en' : data.form_lang='ar'">@{{data.form_lang ?? data.lang.id}} </x-tomato-admin-button>
        </x-slot:buttons>

    <x-splade-form class="flex flex-col space-y-4" action="{{route('admin.testimonials.update', $model->id)}}" method="post" :default="$model">
            <x-splade-select label="{{__('Service')}}" placeholder="{{__('Service')}}" name="service_id" remote-url="/admin/services/api" remote-root="data" option-label="name.{{app()->getLocale()}}" option-value="id" choices/>

            <div v-if="data.form_lang === 'ar'" class="grid grid-cols-2 gap-4">
                <x-splade-input label="{{__('Name [AR]')}}" name="name[ar]" type="text"  placeholder="Name" />
                <x-splade-input label="{{__('Position [AR]')}}" name="position[ar]" type="text"  placeholder="Position" />
                <x-splade-input class="col-span-2" label="{{__('Company [AR]')}}" name="company[ar]" type="text"  placeholder="Company" />
                <x-splade-textarea class="col-span-2" label="{{__('Comment [AR]')}}" name="comment[ar]" placeholder="Comment" autosize />
            </div>
            <div v-else class="grid grid-cols-2 gap-4">
                <x-splade-input label="{{__('Name [EN]')}}" name="name[en]" type="text"  placeholder="Name" />
                <x-splade-input label="{{__('Position [EN]')}}" name="position[en]" type="text"  placeholder="Position" />
                <x-splade-input class="col-span-2" label="{{__('Company [EN]')}}" name="company[en]" type="text"  placeholder="Company" />
                <x-splade-textarea class="col-span-2" label="{{__('Comment [EN]')}}" name="comment[en]" placeholder="Comment" autosize />
            </div>

            <x-splade-input label="{{__('Rate')}}" type='number' name="rate" placeholder="Rate" />

            <x-tomato-admin-submit-buttons table="testimonials" :model="$model" save cancel delete />

        </x-splade-form>

    </x-tomato-admin-container>
</x-splade-data>
