<x-app-layout>
    <section class="flex flex-col items-center gap-12 w-full py-12">
        {{-- 新カテゴリー追加 --}}
        <article class="qa__item bg-white border border-solid border-gray-200 w-[80%] shrink-0">
            <div class="qa__head js-ac flex items-center justify-between gap-4 py-6 px-2 ml-4">
                <div>
                    <label for="category" class="block mb-2 text-sm font-medium text-gray-900">新カテゴリーの追加</label>
                    <input type="text" name="category" id="category" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="サイズ"  />
                </div>
                <aside>
                    <a class="font-medium text-blue-600 hover:underline mr-4">追加</a>
                </aside>
            </div>
        </article>

        {{--既存カテゴリー一覧--}}
        <article class="w-full flex flex-col items-center">
            @foreach($data as $idx=>$value)
                <div class="qa__item bg-white border border-solid border-gray-200 w-[80%] shrink-0">
                    {{--既存カテゴリー名 --}}
                    <div class="qa__head js-ac flex items-center justify-between gap-4 py-6 px-2 ml-4">
                        <div>
                            <p class="text-xs md:text-base lg:text-lg font-bold leading-6 opacity-90">{{$value["category_name"]}}</p>
                        </div>
                        <aside>
                            <a class="editBtn font-medium text-blue-600 hover:underline mr-4">編集</a>
                            <a class="deleteBtn font-medium text-blue-600 hover:underline">削除</a>
                        </aside>
                    </div>

                    {{--既存各属性（最初非表示） --}}
                    <div class="qa__body">
                        @foreach($value["attributes"] as $val)
                            <aside class="flex justify-between items-center border border-solid border-gray-200">
                                <p >{{$val}}</p>
                                <div>
                                    <button class="border border-solid border-black">削除</button>
                                </div>
                            </aside>
                        @endforeach
                            {{--新規属性追加用--}}
                            <aside class="flex justify-between items-center border border-solid border-gray-200">
                                <input placeholder="新属性" type="text">
                                <div>
                                    <button class="border border-solid border-black">追加</button>
                                </div>
                            </aside>
                    </div>
                </div>
            @endforeach
        </article>
    </section>
</x-app-layout>
