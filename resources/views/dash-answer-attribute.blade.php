<x-app-layout>
    <section class="flex flex-col items-center gap-16 w-full py-12">
        @foreach($q_data as $idx=>$value)
            {{--articleが各質問のひとかたまり--}}
            <article class="w-full flex flex-col items-center gap-4">
                {{--質問--}}
                <div class="w-[80%]">
                    <h1 class="flex justify-start text-xl font-bold pl-2">Q{{$idx+1}}.{{$value["question"]}}</h1>
                </div>
                {{--回答のかたまり--}}
                <div class="w-full flex flex-col items-center">
                    @foreach($value["answer"] as $val)
                        <div class="qa__item bg-white border border-solid border-gray-200 w-[80%] shrink-0">
                            {{--既存回答名 --}}
                            <div class="qa__head js-ac flex items-center justify-between gap-4 py-6 px-2 ml-4">
                                <div>
                                    <p class="text-xs md:text-base lg:text-lg font-bold leading-6 opacity-90">{{$val}}</p>
                                </div>
                                <aside>
                                    <a class="editBtn font-medium text-blue-600 hover:underline mr-4">編集</a>
                                </aside>
                            </div>

                            {{--既存各属性（最初非表示） --}}
                            <div class="qa__body flex flex-col gap-16">
                                {{--既存の属性表示--}}
                                <div class="flex flex-col gap-2">
                                    <h2 class="font-bold">【現在付与されてる属性】</h2>
                                    <p class="font-bold underline">色</p>
                                    <ul class="flex flex-col gap-4">
                                        <li class="flex items-center gap-4">
                                            <p>黄色</p>
                                            <div class="flex items-center">
                                                <button class="border border-solid border-black">削除</button>
                                            </div>
                                        </li>
                                        <li class="flex items-center gap-4">
                                            <p>白色</p>
                                            <div>
                                                <button class="border border-solid border-black">削除</button>
                                            </div>
                                        </li>
                                    </ul>
                                </div>

                                {{--新規属性付与--}}
                                <div class="flex flex-col gap-4">
                                    <h2 class="font-bold">【新規属性付与】</h2>
                                    @foreach($data as $value)
                                        <div>
                                            <p class="font-bold underline">{{$value["category_name"]}}</p>
                                            <aside class="flex gap-2">
                                                <select>
                                                    @foreach($value["attributes"] as $val)
                                                        <option>{{$val}}</option>
                                                    @endforeach
                                                </select>
                                                <div>
                                                    <button class="border border-solid border-black">追加</button>
                                                </div>
                                            </aside>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </article>
        @endforeach
    </section>
</x-app-layout>
