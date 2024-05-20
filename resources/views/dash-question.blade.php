<x-app-layout>
    <div id="my_sortable" class="flex flex-col items-center w-full pt-12">
        @foreach($data as $idx=>$value)
            <li class="qa__item bg-white border border-solid border-gray-200 w-[80%] shrink-0 list-none">
                {{-- 質問 --}}
                <div class="qa__head js-ac flex items-center justify-between gap-4 py-6 px-2 ml-4">
                    <div>
                        <p class="text-xs md:text-base lg:text-lg font-bold leading-6 opacity-90">{{$value["question"]}}</p>
                    </div>
                    <aside>
                        <a class="editBtn font-medium text-blue-600 hover:underline mr-4">編集</a>
                        <a class="deleteBtn font-medium text-blue-600 hover:underline">削除</a>
                    </aside>
                </div>

                {{-- 回答（最初非表示） --}}
                <div class="qa__body">
                    <div class="answer_sortable">
                        @foreach($value["answer"] as $val)
                            <aside class="flex justify-between items-center border border-solid border-gray-200">
                                <p >{{$val}}</p>
                                <div>
                                    <button class="border border-solid border-black">削除or非表示?</button>
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


    <script src="//cdnjs.cloudflare.com/ajax/libs/Sortable/1.15.0/Sortable.min.js"></script>
</x-app-layout>
