<x-splade-modal class="font-main">
    <h1 class="text-2xl font-bold mb-4">{{trans('tomato-admin::global.crud.view')}} {{ __('Block') }} #{{$model->id}}</h1>

    <div class="flex flex-col space-y-4">
        
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
                      {{__('Body')}}
                  </h3>
              </div>
              <div>
                  <h3 class="text-lg">
                      {{ $model->body}}
                  </h3>
              </div>
          </div>

          <div class="flex justify-between">
              <div>
                  <h3 class="text-lg font-bold">
                      {{__('Button')}}
                  </h3>
              </div>
              <div>
                  <h3 class="text-lg">
                      {{ $model->button}}
                  </h3>
              </div>
          </div>

          <div class="flex justify-between">
              <div>
                  <h3 class="text-lg font-bold">
                      {{__('Url')}}
                  </h3>
              </div>
              <div>
                  <h3 class="text-lg">
                      {{ $model->url}}
                  </h3>
              </div>
          </div>

          <div class="flex justify-between">
              <div>
                  <h3 class="text-lg font-bold">
                      {{__('Key')}}
                  </h3>
              </div>
              <div>
                  <h3 class="text-lg">
                      {{ $model->key}}
                  </h3>
              </div>
          </div>

          
    </div>
</x-splade-modal>
