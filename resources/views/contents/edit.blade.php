<x-tomato-admin-layout>
    <x-slot name="header">
        {{trans('tomato-admin::global.crud.edit')}} {{__('Content')}} #{{$model->id}}
    </x-slot>

    <x-splade-form class="grid grid-cols-12 gap-4 my-4" action="{{route('admin.contents.update', $model->id)}}" method="post" :default="[
            'title' => $model->title,
            'slug' => $model->slug,
            'body' => $model->body,
            'categories' => $model->categories,
            'images' => $model->images,
            'seo_title' => $model->seo_title,
            'seo_description' => $model->seo_description,
            'seo_keywords' => $model->seo_keywords,
        ]">
        <div class="col-span-8">
            <x-splade-input name="title" @input="form.slug = form.title.toLowerCase()
                        .trim()
                        .replace(/[^\w\s-]/g, '')
                        .replace(/[\s_-]+/g, '-')
                        .replace(/^-+|-+$/g, '')" class="text-3xl" type="text"  placeholder="{{__('Add Title')}}" />
            <div class="flex justify-start my-2" v-if="form.title">
                <div class="font-bold mx-2">Permalink: </div>
                <div>
                    <a class="text-primary-500 underline" target="_blank" :href="'{{url('/category/')}}'+form.slug">
                        {{url('/category/')}}/@{{ form.slug }}
                    </a>
                </div>
            </div>
            <x-tomato-rich class="my-8" label="{{__('Body')}}" name="body" type="text"  placeholder="Body" />
            <div class="space-y-4 w-full">
                <div class="border border-gray-300 rounded-lg bg-white">
                    <div class="py-2 px-4">
                        <span class="font-bold">SEO</span>
                    </div>
                    <hr>
                    <div class="py-4 px-4">
                        <div class="flex flex-col space-y-4">
                            <x-splade-input placeholder="{{__('SEO Title')}}" name="seo_title" />
                            <x-splade-textarea placeholder="{{__('SEO Description')}}" name="seo_description" />
                            <x-splade-input placeholder="{{__('SEO Keywords')}}" name="seo_keywords" />
                        </div>
                        <div class="flex justify-start my-4">
                            <div class="flex justify-start py-2">
                                <div class="flex flex-col justify-center mx-2">
                                    <i class="bx bx-info-circle"></i>
                                </div>
                                <div>
                                <span>
                                    <span>Views: </span>
                                    <span class="font-bold mx-1">0</span>
                                </span>
                                </div>
                            </div>
                            <div class="flex justify-start py-2">
                                <div class="flex flex-col justify-center mx-2">
                                    <i class="bx bx-share"></i>
                                </div>
                                <div>
                                <span>
                                    <span>Share: </span>
                                    <span class="font-bold mx-1">0</span>
                                </span>
                                </div>
                            </div>
                            <div class="flex justify-start py-2">
                                <div class="flex flex-col justify-center mx-2">
                                    <i class="bx bx-like"></i>
                                </div>
                                <div>
                                <span>
                                    <span>Likes: </span>
                                    <span class="font-bold mx-1">0</span>
                                </span>
                                </div>
                            </div>
                        </div>
                        <hr class="my-4">
                        <div class="flex justify-end">
                            <x-splade-submit>Update SEO Data</x-splade-submit>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-span-4 space-y-4">
            <div class="border border-gray-300 rounded-lg bg-white">
                <div class="py-2 px-4">
                    <span class="font-bold">Publish</span>
                </div>
                <hr>
                <div class="flex flex-col justify-start w-full">
                    <div class="flex justify-between py-2 px-4">
                        <div class="flex justify-start">
                            <button class="hover:bg-gray-200 border border-primary-500 py-2 px-4 text-sm text-primary-500 rounded-lg">
                                Save Draft
                            </button>
                        </div>
                        <div class="flex justify-end">
                            <button class="hover:bg-gray-200 border border-primary-500 py-2 px-4 text-sm text-primary-500 rounded-lg">
                                Preview
                            </button>
                        </div>
                    </div>
                    <div class="flex justify-start py-2 px-4">
                        <div class="flex flex-col justify-center mx-2">
                            <i class="bx bx-info-circle"></i>
                        </div>
                        <div>
                            <span>
                                <span>Status: </span>
                                <span class="font-bold mx-1">Draft</span>
                                <button class="text-primary-500 underline">Edit</button>
                            </span>
                        </div>
                    </div>
                    <div class="flex justify-start py-2 px-4">
                        <div class="flex flex-col justify-center mx-2">
                            <i class="bx bx-show"></i>
                        </div>
                        <div>
                            <span>
                                <span>Visibility: </span>
                                <span class="font-bold mx-1">Public</span>
                                <button class="text-primary-500 underline">Edit</button>
                            </span>
                        </div>
                    </div>
                    <div class="flex justify-start py-2 px-4">
                        <div class="flex flex-col justify-center mx-2">
                            <i class="bx bx-calendar"></i>
                        </div>
                        <div>
                            <span>
                                <span>Publish: </span>
                                <span class="font-bold mx-1">Immediately</span>
                                <button class="text-primary-500 underline">Edit</button>
                            </span>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="flex justify-end py-2 px-4">
                    <x-splade-submit>Update</x-splade-submit>
                </div>
            </div>
            <div class="border border-gray-300 rounded-lg bg-white">
                <div class="py-2 px-4">
                    <span class="font-bold">Featured Image</span>
                </div>
                <hr>
                <div class="py-4 px-4">
                    <x-splade-file placeholder="{{__('Set Featured Image')}}" name="images" filepond preview />
                </div>
            </div>

            <div class="border border-gray-300 rounded-lg bg-white">
                <div class="py-2 px-4">
                    <span class="font-bold">Categories</span>
                </div>
                <hr>
                <div class="py-2 px-4">
                    <x-splade-group name="categories">
                        @foreach($categories as $category)
                            <x-splade-checkbox label="{{$category->name}}" name="categories[]" value="{{$category->id}}" />

                            @if($category->children->count())
                                @foreach($category->children as $child)
                                    <div class="pl-4 mb-2">
                                        <x-splade-checkbox label="{{$child->name}}" name="categories[]" value="{{$child->id}}" />
                                    </div>
                                @endforeach
                            @endif
                        @endforeach
                    </x-splade-group>
                </div>
            </div>

            <div class="border border-gray-300 rounded-lg bg-white">
                <div class="py-2 px-4">
                    <span class="font-bold">Post Attributes</span>
                </div>
                <hr>
                <div class="py-4 px-4">
                    <x-splade-select label="{{__('Content Type')}}" placeholder="Post, Page, Ads" name="type_id" choices>
                        @foreach($types as $type)
                            <option value="{{$type->id}}">{{$type->name}}</option>
                        @endforeach
                    </x-splade-select>
                </div>
            </div>

            <div class="border border-gray-300 rounded-lg bg-white">
                <div class="py-2 px-4">
                    <span class="font-bold">Tags</span>
                </div>
                <hr>
                <div class="py-2 px-4">
                    <x-splade-input  name="name" placeholder="Tag Name"  />

                    <span class="text-gray-400 text-sm">Separate tags with commas</span>
                </div>
            </div>

        </div>
    </x-splade-form>
</x-tomato-admin-layout>
