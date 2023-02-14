<x-splade-modal class="font-main">
    <h1 class="text-2xl font-bold mb-4">{{trans('tomato-admin::global.crud.view')}} {{ __('Content') }} #{{$model->id}}</h1>

    <div class="flex flex-col space-y-4">

{{--          <div class="flex justify-between">--}}
{{--              <div>--}}
{{--                  <h3 class="text-lg font-bold">--}}
{{--                      {{__('Type')}}--}}
{{--                  </h3>--}}
{{--              </div>--}}
{{--              <div>--}}
{{--                  <h3 class="text-lg">--}}
{{--                      {{ $model->type->name}}--}}
{{--                  </h3>--}}
{{--              </div>--}}
{{--          </div>--}}

{{--          <div class="flex justify-between">--}}
{{--              <div>--}}
{{--                  <h3 class="text-lg font-bold">--}}
{{--                      {{__('Category')}}--}}
{{--                  </h3>--}}
{{--              </div>--}}
{{--              <div>--}}
{{--                  <h3 class="text-lg">--}}
{{--                      {{ $model->Category->name}}--}}
{{--                  </h3>--}}
{{--              </div>--}}
{{--          </div>--}}


        <div class="flex justify-center">
            <div class="bg-cover bg-center w-full" style="background-image: url('{{$model->image}}'); background-repeat: no-repeat">

            </div>
        </div>

          <div class="flex justify-between">
              <div>
                  <h3 class="text-lg font-bold">
                      {{__('Title')}}
                  </h3>
              </div>
              <div>
                  <h3 class="text-lg">
                      {{ $model->title}}
                  </h3>
              </div>
          </div>

          <div class="flex justify-between">
              <div>
                  <h3 class="text-lg font-bold">
                      {{__('Slug')}}
                  </h3>
              </div>
              <div>
                  <h3 class="text-lg">
                      {{ $model->slug}}
                  </h3>
              </div>
          </div>


          <div class="flex justify-between">
              <div>
                  <h3 class="text-lg font-bold">
                      {{__('Short description')}}
                  </h3>
              </div>
              <div>
                  <h3 class="text-lg">
                      {{ $model->short_description}}
                  </h3>
              </div>
          </div>

        <div class="flex justify-between">
            <div>
                <h3 class="text-lg font-bold">
                    {{__('Body')}}
                </h3>
            </div>
            <div>
                <h3 class="text-lg">
                    {!! $model->body  !!}
                </h3>
            </div>
        </div>

          <div class="flex justify-between">
              <div>
                  <h3 class="text-lg font-bold">
                      {{__('Published')}}
                  </h3>
              </div>
              <div>
                  <h3 class="text-lg">
                      {{ $model->published}}
                  </h3>
              </div>
          </div>

          <div class="flex justify-between">
              <div>
                  <h3 class="text-lg font-bold">
                      {{__('Featured')}}
                  </h3>
              </div>
              <div>
                  <h3 class="text-lg">
                      {{ $model->featured}}
                  </h3>
              </div>
          </div>

    </div>
</x-splade-modal>
