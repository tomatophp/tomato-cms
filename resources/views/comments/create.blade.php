<x-tomato-admin-container label="{{trans('tomato-admin::global.crud.create')}} {{__('Comment')}}">
    <x-splade-form class="flex flex-col space-y-4" action="{{route('admin.comments.store')}}" method="post">

        <x-splade-select label="{{__('Post')}}" placeholder="Post" name="post_id" remote-url="/admin/posts/api" remote-root="data" option-label="name" option-value="id" choices/>
        <x-splade-select label="{{__('account')}}" placeholder="Account" name="account_id" remote-url="/admin/accounts/api" remote-root="data" option-label="name" option-value="id" choices/>
        <x-splade-select label="{{__('parent')}}" placeholder="Parent" name="parent_id" remote-url="/admin/comments/api" remote-root="data" option-label="name" option-value="id" choices/>

        <x-splade-textarea label="{{__('Comment')}}" name="comment" placeholder="Comment" autosize />
        <x-splade-checkbox label="{{__('Active')}}" name="active" label="Active" />

        <div class="flex justify-start gap-2 pt-3">
            <x-tomato-admin-submit label="{{__('Save')}}" :spinner="true" />
            <x-tomato-admin-button secondary :href="route('admin.comments.index')" label="{{__('Cancel')}}"/>
        </div>
    </x-splade-form>
</x-tomato-admin-container>
