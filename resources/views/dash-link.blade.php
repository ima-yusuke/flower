<x-app-layout>
    <div class="flex flex-col items-center w-full py-12">
        @foreach($data as $idx=>$value)
            <div class="qa__item bg-white border border-solid border-gray-200 w-[80%] shrink-0">
                {{-- 商品 --}}
                <div class="qa__head js-ac flex items-center justify-between gap-4 py-6 px-2 ml-4">
                    <div>
                        <p class="text-xs md:text-base lg:text-lg font-bold leading-6 opacity-90">{{$value["name"]}}</p>
                    </div>
                    <aside>
                        <a class="editBtn font-medium text-blue-600 hover:underline">編集</a>
                    </aside>
                </div>

                {{-- リンク（最初非表示） --}}
                <div class="qa__body flex flex-col gap-4">
                    <aside class="flex gap-4">
                        <label id="get-mail">受取：
                            <input id="get-mail" placeholder="https://www.google.com">
                        </label>
                        <div class="flex">
                            <button class="border border-solid border-black">登録</button>
                            <button class="border border-solid border-black">削除？</button>
                        </div>
                    </aside>
                    <aside class="flex gap-4">
                        <label id="get-mail">郵送：
                            <input id="get-mail" placeholder="https://www.google.com">
                        </label>
                        <div class="flex">
                            <button class="border border-solid border-black">登録</button>
                            <button class="border border-solid border-black">削除？</button>
                        </div>
                    </aside>
                </div>
            </div>
        @endforeach
    </div>
</x-app-layout>
