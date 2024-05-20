<x-app-layout>
    <div class="flex flex-col items-center w-full py-12">
        @foreach($data as $idx=>$value)
            <div class="qa__item bg-white border border-solid border-gray-200 w-[80%] shrink-0">
                {{-- 質問 --}}
                <div class="qa__head js-ac flex items-center justify-between gap-4 py-6 px-2 ml-4">
                    <div>
                        <p class="text-xs md:text-base lg:text-lg font-bold leading-6 opacity-90">{{$value["name"]}}</p>
                    </div>
                    <aside>
                        <a class="deleteBtn font-medium text-blue-600 hover:underline mr-4">削除</a>
                        <a class="editBtn font-medium text-blue-600 hover:underline">編集</a>
                    </aside>
                </div>

                {{-- 回答（最初非表示） --}}
                <div class="qa__body">
                    <p>{{$value["text"]}}</p>
                </div>
            </div>
        @endforeach
            <div class="qa__item bg-white border border-solid border-gray-200 w-[80%] shrink-0">
                 {{-- 新規質問 --}}
                <div class="qa__head js-ac flex items-center justify-between gap-4 py-6 px-2 ml-4">
                    <div>
                        <p class="text-xs md:text-base lg:text-lg font-bold leading-6 opacity-90">
                            <span class="bg-red-500 text-white text-sm font-medium me-2 px-2.5 py-0.5 rounded-8">New</span>新規商品の追加
                        </p>
                    </div>
                    <aside>
                        <a class="editBtn font-medium text-blue-600 hover:underline">追加</a>
                    </aside>
                </div>

                {{--新規回答フォーム（最初非表示）--}}
                <div class="qa__body">
                    <form class="Form flex flex-col gap-8" method="post" action="{{route("show_home")}}" enctype="multipart/form-data">
                        @csrf
                        <div class="grid gap-6 mb-6 md:grid-cols-2">
                            <div>
                                <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"><span class="bg-red-500 text-white text-sm font-medium me-2 px-2.5 py-0.5 rounded-8">必須</span> 商品名</label>
                                <input type="text" name="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="母の日セット" required />
                            </div>
                            <div>
                                <label for="img" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"><span class="bg-red-500 text-white text-sm font-medium me-2 px-2.5 py-0.5 rounded-8">必須</span> 商品画像</label>
                                <input type="file" accept="image/jpeg,image/png"  name="img" id="img" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg p-2.5 focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
                            </div>
                            <div>
                                <label for="pickup_link" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">郵送リンク</label>
                                <input type="text" name="pickup_link" id="pickup_link" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"/>
                            </div>
                            <div>
                                <label for="delivery_link" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">受取リンク</label>
                                <input type="text" name="delivery_link" id="delivery_link" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"/>
                            </div>
                            <div>
                                <label for="priority" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">プライオリティ</label>
                                <input type="number" name="priority" id="priority" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"/>
                            </div>
                        </div>
                        <x-register_btn></x-register_btn>
                    </form>
                </div>
            </div>

    </div>
</x-app-layout>
