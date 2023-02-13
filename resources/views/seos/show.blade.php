<x-splade-modal class="font-main">
    <h1 class="text-2xl font-bold mb-4">{{trans('tomato-admin::global.crud.view')}} {{ __('Seo') }} #{{$model->id}}</h1>

    <div class="flex flex-col space-y-4">
        
          
          <div class="flex justify-between">
              <div>
                  <h3 class="text-lg font-bold">
                      {{__('Model type')}}
                  </h3>
              </div>
              <div>
                  <h3 class="text-lg">
                      {{ $model->model_type}}
                  </h3>
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
                      {{__('Description')}}
                  </h3>
              </div>
              <div>
                  <h3 class="text-lg">
                      {{ $model->description}}
                  </h3>
              </div>
          </div>

          <div class="flex justify-between">
              <div>
                  <h3 class="text-lg font-bold">
                      {{__('Keywords')}}
                  </h3>
              </div>
              <div>
                  <h3 class="text-lg">
                      {{ $model->keywords}}
                  </h3>
              </div>
          </div>

          <div class="flex justify-between">
              <div>
                  <h3 class="text-lg font-bold">
                      {{__('Share')}}
                  </h3>
              </div>
              <div>
                  <h3 class="text-lg">
                      {{ $model->share}}
                  </h3>
              </div>
          </div>

          <div class="flex justify-between">
              <div>
                  <h3 class="text-lg font-bold">
                      {{__('Likes')}}
                  </h3>
              </div>
              <div>
                  <h3 class="text-lg">
                      {{ $model->likes}}
                  </h3>
              </div>
          </div>

          <div class="flex justify-between">
              <div>
                  <h3 class="text-lg font-bold">
                      {{__('Views')}}
                  </h3>
              </div>
              <div>
                  <h3 class="text-lg">
                      {{ $model->views}}
                  </h3>
              </div>
          </div>

    </div>
</x-splade-modal>
