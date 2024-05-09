<x-app-layout>
    <div class="flex flex-col items-center w-full">

        <div id="accordion-collapse" data-accordion="collapse" class="w-[80%]">
            @foreach($data as $idx=>$value)
                {{--アコーディオン開くためのボタン--}}
                <div id="accordion-collapse-heading-{{$idx+1}}" class="flex justify-between">
                    <button type="button" class="flex items-center justify-between w-full p-5 font-medium rtl:text-right text-gray-500 border border-b-0 border-gray-200 rounded-t-xl focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800 dark:border-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 gap-3" data-accordion-target="#accordion-collapse-body-{{$idx+1}}" aria-expanded="false" aria-controls="accordion-collapse-body-{{$idx+1}}">
                        <span>{{$value['name']}}</span>
                        <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5"/>
                        </svg>
                    </button>
                    <button>削除</button>
                </div>

                {{--アコーディオン開いたとき表示される箇所--}}
                <div id="accordion-collapse-body-{{$idx+1}}" class="hidden" aria-labelledby="accordion-collapse-heading-{{$idx+1}}">
                    <div class="p-5 border border-b-0 border-gray-200 dark:border-gray-700 dark:bg-gray-900">
                        <p class="text-gray-500">{{$value['text']}}</p>
                    </div>
                </div>
            @endforeach

            {{--新規追加用 (アコーディオン開くためのボタン)--}}
            <div id="accordion-collapse-heading-{{count($data)+1}}" class="flex justify-between">
                <button type="button" class="flex items-center justify-between w-full p-5 font-medium rtl:text-right text-gray-500 border border-b-0 border-gray-200 rounded-t-xl focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800 dark:border-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 gap-3" data-accordion-target="#accordion-collapse-body-{{count($data)+1}}" aria-expanded="false" aria-controls="accordion-collapse-body-{{count($data)+1}}">
                    <span>新規商品の追加</span>
                    <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5"/>
                    </svg>
                </button>
            </div>

            {{--新規追加用 (アコーディオン開いたとき表示される箇所)--}}
            <div id="accordion-collapse-body-{{count($data)+1}}" class="hidden" aria-labelledby="accordion-collapse-heading-{{count($data)+1}}">
                <div class="p-5 border border-b-0 border-gray-200 dark:border-gray-700 dark:bg-gray-900">
                    <p class="text-gray-500"><input placeholder="詳細..."/></p>
                </div>
            </div>
        </div>

        {{--商品追加--}}
        <section class="w-[90%] flex flex-col gap-8">
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
        </section>
    </div>
</x-app-layout>
