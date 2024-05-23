<x-app-layout>

    {{--表示質問一覧--}}
    <div class="flex flex-col items-center w-full py-12">
        <div class="flex justify-start w-[80%]">
            <h2 class="dash_h2 font-semibold text-gray-800">表示質問一覧</h2>
        </div>
        <div id="my_sortable" class="flex flex-col items-center w-full">
            @foreach($data as $idx=>$value)
                <li id="{{$idx}}" class="qa__item bg-white border border-solid border-gray-200 w-[80%] shrink-0 list-none">
                    {{-- 質問 --}}
                    <div class="qa__head js-ac flex items-center justify-between gap-4 py-6 px-2 ml-4">
                        <div>
                            <p class="text-xs md:text-base lg:text-lg font-bold leading-6 opacity-90">{{$idx+1}}.{{$value["question"]}}</p>
                        </div>
                        <aside>
                            <label class="inline-flex items-center cursor-pointer mr-4">
                                <span class="ms-3 text-sm font-medium text-gray-900 dark:text-gray-300 mr-2">非表示</span>
                                <input type="checkbox" value="" class="sr-only peer">
                                <div class="relative w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600"></div>
                                <span class="ms-3 text-sm font-medium text-gray-900 dark:text-gray-300">表示</span>
                            </label>
                            <a class="editBtn font-medium text-blue-600 hover:underline mr-4">編集</a>
                            <a class="deleteBtn font-medium text-blue-600 hover:underline">削除</a>
                        </aside>
                    </div>

                    {{-- 回答（最初非表示） --}}
                    <div class="qa__body">
                        <div class="answer_sortable">
                            @foreach($value["answer"] as $key=>$val)
                                <aside id="{{$key}}" class="flex justify-between items-center border border-solid border-gray-200">
                                    <p >{{$key+1}}.{{$val}}</p>
                                    <div>
                                        <button class="border border-solid border-black">削除</button>
                                    </div>
                                </aside>
                            @endforeach
                        </div>
                        <aside>
                            <input type="text" placeholder="新しい回答">
                            <button class="border border-solid border-black">追加</button>
                        </aside>
                    </div>
                </li>
            @endforeach
        </div>

        {{--新規質問追加--}}
        <div class="flex flex-col items-center w-full pb-12">
            <div class="qa__item bg-white border border-solid border-gray-200 w-[80%] shrink-0">
                {{-- 新規質問 --}}
                <div class="qa__head js-ac flex items-center justify-between gap-4 py-6 px-2 ml-4">
                    <div>
                        <p class="text-xs md:text-base lg:text-lg font-bold leading-6 opacity-90">
                            <span class="bg-red-500 text-white text-sm font-medium me-2 px-2.5 py-0.5 rounded-8">New</span>新規質問の追加
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
                                <label for="question" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"><span class="bg-red-500 text-white text-sm font-medium me-2 px-2.5 py-0.5 rounded-8">必須</span>質問</label>
                                <input type="text" name="question" id="question" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="価格帯は？" required />
                            </div>
                            <br>
                            <div>
                                <label for="answer" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"><span class="bg-red-500 text-white text-sm font-medium me-2 px-2.5 py-0.5 rounded-8">必須</span>回答</label>
                                <input type="text" name="answer" id="answer" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="5,000円未満" required />
                            </div>
                            <br>
                            <div>
                                <button class="border border-solid border-black">回答の追加</button>
                            </div>
                        </div>
                        <x-register_btn></x-register_btn>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{--非表示質問一覧--}}
    <div class="flex flex-col items-center w-full py-12">
        <div class="flex justify-start w-[80%]">
            <h2 class="dash_h2 font-semibold text-gray-800">非表示質問一覧</h2>
        </div>
        <div id="my_sortable" class="flex flex-col items-center w-full">
            @foreach($data as $idx=>$value)
                <div id="{{$idx}}" class="qa__item bg-white border border-solid border-gray-200 w-[80%] shrink-0 list-none">
                    {{-- 質問 --}}
                    <div class="qa__head js-ac flex items-center justify-between gap-4 py-6 px-2 ml-4">
                        <div>
                            <p class="text-xs md:text-base lg:text-lg font-bold leading-6 opacity-90">{{$idx+1}}.{{$value["question"]}}</p>
                        </div>
                        <aside>
                            <label class="inline-flex items-center cursor-pointer mr-4">
                                <span class="ms-3 text-sm font-medium text-gray-900 dark:text-gray-300 mr-2">非表示</span>
                                <input type="checkbox" value="" class="sr-only peer">
                                <div class="relative w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600"></div>
                                <span class="ms-3 text-sm font-medium text-gray-900 dark:text-gray-300">表示</span>
                            </label>
                            <a class="deleteBtn font-medium text-blue-600 hover:underline">削除</a>
                        </aside>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <script src="//cdnjs.cloudflare.com/ajax/libs/Sortable/1.15.0/Sortable.min.js"></script>
</x-app-layout>
