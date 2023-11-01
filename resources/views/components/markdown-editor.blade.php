<label for="">
    <span class="block mb-1 text-gray-700 font-sans dark:text-white">{{$label ?? ''}}</span>
</label>
<MdEditor {{ $attributes->only(['v-if', 'v-show', 'class'])->class(['hidden' => $isHidden()]) }}
          v-model="{{ $vueModel() }}" language="en-US">

</MdEditor>
