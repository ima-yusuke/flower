<x-app-layout>
    <div class="pt-10 w-11/12 items-center mx-auto">
        <p class="text-4xl">ドラッグ&ドロップ</p>
        <div class="flex">
            @foreach($ct_data as $category)
                <div class="mx-10 my-10 w-1/4 h-[150px] bg-emerald-100 flex">
                    {{ $category['name'] }}
                    @foreach($att_data as $key => $attribute)
                        @if($category['id'] === $attribute['category_id'])
                            <div id="draggable-{{ $key }}" class="drag-drop draggable mx-5 h-fit">{{ $attribute['name'] }}</div>
                        @endif
                    @endforeach
                </div>
            @endforeach
        </div>
        <div class="pt-20 flex">
            <div id="outer-dropzone" class="dropzone">
                商品
            </div>
        </div>
    </div>



{{--    <div id="no-drop" class="drag-drop draggable"> #no-drop </div>--}}

    <div id="yes-drop" class="drag-drop draggable"> #yes-drop </div>

{{--    <div id="outer-dropzone" class="dropzone">#outer-dropzone</div>--}}

    @vite('resources/js/nozaki.js')
</x-app-layout>
