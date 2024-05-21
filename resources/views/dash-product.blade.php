<x-app-layout>
    <div class="flex flex-col items-center w-full py-12">
        @foreach($data as $idx=>$value)
            <div class="qa__item bg-white border border-solid border-gray-200 w-[80%] shrink-0">
                {{-- 既存商品名 --}}
                <div class="qa__head js-ac flex items-center justify-between gap-4 py-6 px-2 ml-4">
                    <div>
                        <p class="text-xs md:text-base lg:text-lg font-bold leading-6 opacity-90">{{$value["name"]}}</p>
                    </div>
                    <aside>
                        <a class="editBtn font-medium text-blue-600 hover:underline mr-4">編集</a>
                        <a class="font-medium text-blue-600 hover:underline mr-4">商品詳細編集</a>
                        <a class="deleteBtn font-medium text-blue-600 hover:underline">削除</a>
                    </aside>
                </div>

                {{-- 既存商品詳細（最初非表示） --}}
                <div class="qa__body flex flex-col">
                    <div class="flex items-center border-y border-solid border-gray-200 py-4">
                        <p class="w-[250px]">1.商品画像の設定</p>
                        <div class="flex gap-16">
                            <aside class="flex flex-col items-center gap-2">
                                <p>【現在の画像】</p>
                                <img src="{{ asset("/img/flower01.jpeg") }}" width="100px">
                            </aside>
                           <aside class="flex flex-col gap-2">
                               <p>【新しい画像】</p>
                               <input type="file">
                           </aside>
                        </div>
                    </div>
                    <div class="flex items-center border-b border-solid border-gray-200 py-4">
                        <p class="w-[250px]">2.商品名</p>
                        <div class="flex-1">
                            <input name="name" value="{{$value['name']}}" class="w-full border border-solid border-gray-400 rounded-md">
                        </div>
                    </div>
                    <div class="flex items-center border-b border-solid border-gray-200 py-4">
                        <p class="w-[250px]">3.プライオリティ</p>
                        <div class="flex-1">
                            <input name="priority" value="1" class="w-full border border-solid border-gray-400 rounded-md">
                        </div>
                    </div>
                    <div class="flex items-center border-b border-solid border-gray-200 py-4">
                        <p class="w-[250px]">4.表示・非表示</p>
                        <div class="flex-1">
                            <input name="isEnabled" value="1" class="w-full border border-solid border-gray-400 rounded-md">
                        </div>
                    </div>
                    <div class="mt-4">
                        <button class="border border-solid border-black">更新</button>
                    </div>
                </div>
            </div>
        @endforeach
            <div class="qa__item bg-white border border-solid border-gray-200 w-[80%] shrink-0">
                 {{-- 新規商品 --}}
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

                {{--新規商品詳細登録フォーム（最初非表示）--}}
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
                                <label for="pickup_link" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">受取リンク</label>
                                <input type="text" name="pickup_link" id="pickup_link" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"/>
                            </div>
                            <div>
                                <label for="delivery_link" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">郵送リンク</label>
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
