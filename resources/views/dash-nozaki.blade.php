<x-app-layout>
    <div class="pt-10 w-11/12 items-center mx-auto">
        <p class="text-4xl">ドラッグ&ドロップ</p>
        <div class="flex">
            <div class="flex w-full justify-center bg-gray-300">
                付与
                @foreach($ct_data as $index => $category)
                    <div class="category-zone mx-10 my-10 w-1/4 h-[150px] bg-emerald-100 flex category-{{ $index }}" data-category-number="{{ $index }}">
                        <p>{{ $category['name'] }}</p>
                        <div class="category-inner justify-center flex-grow grid grid-cols-3">
                        @foreach($att_data as $key => $attribute)
                            @if($category['id'] === $attribute['category_id'])
                                <div id="draggable-{{ $key }}" class="drag-drop draggable mx-3 text-center h-fit">{{ $attribute['name'] }}</div>
                            @endif
                        @endforeach
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="pt-20 flex flex-col">
            @foreach($product_data as $number => $product)
                <div class="my-5 flex w-full justify-center bg-gray-300 product-{{ $number }}">
                    {{ $product['name'] }}
                    @foreach($ct_data as $index => $category)
                        <div class="mx-10 my-10 w-1/4 h-[150px] bg-emerald-100 flex">
                            <p class="pt-2 ps-2">{{ $category['name'] }}</p>
                            <div class="justify-center flex-grow grid dropzone grid-cols-3 category-{{ $index }}">

                            </div>
                        </div>
                    @endforeach
                </div>
            @endforeach
        </div>
    </div>
    @vite('resources/js/nozaki.js')
</x-app-layout>
