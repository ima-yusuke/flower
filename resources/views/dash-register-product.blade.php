<x-app-layout>
    <div class="flex flex-col items-center gap-16 py-10">
        {{--現在の一覧表示--}}
        <section class="w-[90%] flex flex-col gap-8 sm:rounded-lg">

            <div class="overflow-y-auto overflow-x-auto h-600 ">
                <table class="whitespace-nowrap w-full shadow-md text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr class="text-center text-sm">
                            <th scope="col" class="px-2 py-3">
                                編集
                            </th>
                            <th scope="col" class="px-2 py-3">
                                削除
                            </th>
                            <th scope="col" class="px-2 py-3">
                                詳細編集
                            </th>
                            <th scope="col" class="px-2 py-3">
                                商品名
                            </th>
                            <th scope="col" class="px-2 py-3">
                                商品画像
                            </th>
                            <th scope="col" class="px-2 py-3">
                                郵送リンク
                            </th>
                            <th scope="col" class="px-2 py-3">
                                受取リンク
                            </th>
                            <th scope="col" class="px-2 py-3">
                                プライオリティ
                            </th>
                        </tr>
                    </thead>
    {{--                <tbody>--}}
    {{--                @foreach($interviews as $key=>$value)--}}
    {{--                    --}}{{-- 最初表示されるtr--}}
    {{--                    <tr class="h-64 text-xs originalTr bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">--}}
    {{--                        <td class="px-6 py-4 _sticky_a text-gray-700 uppercase bg-gray-50">--}}
    {{--                            <div class="flexCenter">--}}
    {{--                                <a class="text-center editBtn font-medium text-blue-600 dark:text-blue-500 hover:underline">編集</a>--}}
    {{--                            </div>--}}
    {{--                        </td>--}}
    {{--                        <livewire:interview-livewire :id="$value->id"></livewire:interview-livewire>--}}
    {{--                        <td class="text-center px-6 py-4 w-[5%] ">--}}
    {{--                            <div class="flexCenter">{{$value["name"]}}</div>--}}
    {{--                        </td>--}}
    {{--                        <td class="text-center px-2 py-4 w-100">--}}
    {{--                            <img src="{{asset($value->path_1)}}" class="rounded-8 shrink-0 object-cover">--}}
    {{--                        </td>--}}
    {{--                        <td class="text-center px-2 py-4 w-100">--}}
    {{--                            <img src="{{asset($value->path_2)}}" class="rounded-8 shrink-0 object-cover">--}}
    {{--                        </td>--}}
    {{--                        <td class="text-center px-2 py-4 w-150 ">--}}
    {{--                            <p>{{$value["school"]}}</p>--}}
    {{--                            <p>{{$value["department"]!=null?$value["department"]:null}}</p>--}}
    {{--                            <p>{{$value["faculty"]!=null?$value["faculty"]:null}}</p>--}}
    {{--                        </td>--}}
    {{--                        <td class="text-center px-6 py-4 w-150">--}}
    {{--                            <p>{{$value["hire_year"]}}入社</p>--}}
    {{--                            <p>{{$value["job_dpt"]}}</p>--}}
    {{--                        </td>--}}
    {{--                        <td class="px-2 py-4 whitespace-normal">--}}
    {{--                            <div class="flexCenter">{{$value["title"]}} </div>--}}
    {{--                        </td>--}}
    {{--                        <td class="px-2 py-4 whitespace-normal">--}}
    {{--                            <div class="flexCenter">{{$value["question_1"]}}</div>--}}
    {{--                        </td>--}}
    {{--                        <td class="px-2 py-4 whitespace-normal">--}}
    {{--                            <div class="flexCenter">{{$value["question_2"]}}</div>--}}
    {{--                        </td>--}}
    {{--                        <td class="px-2 py-4 whitespace-normal">--}}
    {{--                            <div class="flexCenter">{{$value["question_3"]}}</div>--}}
    {{--                        </td>--}}
    {{--                        <td class="px-2 py-4 whitespace-normal">--}}
    {{--                            <div class="flexCenter">{{$value["question_4"]}}</div>--}}
    {{--                        </td>--}}
    {{--                        <td class="px-2 py-4 whitespace-normal">--}}
    {{--                            <div class="flexCenter">{{$value["question_5"]}}</div>--}}
    {{--                        </td>--}}
    {{--                        <td class="px-2 py-4 whitespace-pre">--}}
    {{--                            <div class="flexCenter">{{$value["question_6"]}}</div>--}}
    {{--                        </td>--}}
    {{--                        <td class="px-2 py-4 whitespace-pre">--}}
    {{--                            <div class="flexCenter">{{$value["question_7"]}}</div>--}}
    {{--                        </td>--}}
    {{--                        <td class="px-2 py-4 whitespace-normal">--}}
    {{--                            <div class="flexCenter">{{$value["question_8"]}}</div>--}}
    {{--                        </td>--}}
    {{--                    </tr>--}}

    {{--                    --}}{{--hidden (編集用tr)--}}
    {{--                    <tr class="h-64 editTr text-center bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">--}}
    {{--                        <form method="post" action="{{route('update-interview',$value)}}" enctype="multipart/form-data">--}}
    {{--                            @csrf--}}
    {{--                            @method("patch")--}}
    {{--                            <td class="px-6 py-4 _sticky_a ">--}}
    {{--                                <x-dashboard_btn></x-dashboard_btn>--}}
    {{--                            </td>--}}
    {{--                            <livewire:interview-livewire :id="$value->id"></livewire:interview-livewire>--}}

    {{--                            <td class="px-6 py-4"><input class="text-xs text-dashInputColor" type="text" name="name" value="{{$value["name"]}}" required></td>--}}
    {{--                            <td class="px-6 py-4">--}}
    {{--                                <div class="flexColumnCenter gap-2">--}}
    {{--                                    <label class="py-2 px-4 bg-black hover:cursor-pointer">--}}
    {{--                                        <input type="file" accept="image/jpeg,image/png" name="path_1" class="imgInput hidden">--}}
    {{--                                        <i class="iconDefault fa-solid fa-file-arrow-up text-white"></i>--}}
    {{--                                        <i class="iconHidden hidden fa-regular fa-circle-check text-white"></i>--}}
    {{--                                        <span class="fileSpan text-white">ファイル選択</span>--}}
    {{--                                    </label>--}}
    {{--                                    <div class="flexColumnCenter">--}}
    {{--                                        <img src="{{asset($value->path_1)}}" class="w-full rounded-8 shrink-0 object-cover">--}}
    {{--                                        <p class="text-xs">※現在の画像</p>--}}
    {{--                                    </div>--}}
    {{--                                </div>--}}
    {{--                            </td>--}}
    {{--                            <td class="px-6 py-4">--}}
    {{--                                <div class="flexColumnCenter gap-2">--}}
    {{--                                    <label class="py-2 px-4 bg-black hover:cursor-pointer">--}}
    {{--                                        <input type="file" accept="image/jpeg,image/png"  name="path_2" class="imgInput hidden">--}}
    {{--                                        <i class="iconDefault fa-solid fa-file-arrow-up text-white"></i>--}}
    {{--                                        <i class="iconHidden hidden fa-regular fa-circle-check text-white"></i>--}}
    {{--                                        <span class="fileSpan text-white">ファイル選択</span>--}}
    {{--                                    </label>--}}
    {{--                                    <div class="flexColumnCenter">--}}
    {{--                                        <img src="{{asset($value->path_2)}}" class="rounded-8 shrink-0 object-cover">--}}
    {{--                                        <p class="text-xs">※現在の画像</p>--}}
    {{--                                    </div>--}}
    {{--                                </div>--}}
    {{--                            </td>--}}
    {{--                            <td class="px-6 py-4">--}}
    {{--                                <p class="my-2"><input class="text-xs text-dashInputColor" type="text" name="school" value="{{$value["school"]}}" required></p>--}}
    {{--                                <p class="my-2"><input class="text-xs text-dashInputColor" type="text" name="department" value="{{$value["department"]!=null?$value["department"]:null}}" placeholder="〇〇学部"></p>--}}
    {{--                                <p><input class="text-xs text-dashInputColor" type="text" name="faculty" value="{{$value["faculty"]!=null?$value["faculty"]:null}}" placeholder="〇〇学科"></p>--}}
    {{--                            </td>--}}
    {{--                            <td class="px-6 py-4">--}}
    {{--                                <p class="my-2"><input class="text-xs text-dashInputColor" type="text" name="hire_year" value="{{$value["hire_year"]}}" required></p>--}}
    {{--                                <p><input class="text-xs text-dashInputColor" type="text" name="job_dpt" value="{{$value["job_dpt"]}}" required></p>--}}
    {{--                            </td>--}}
    {{--                            <td class="px-6 py-4 w-full"><textarea name="title" class="w-full h-200 text-xs text-dashInputColor" required>{{$value["title"]}}</textarea></td>--}}
    {{--                            <td class="px-6 py-4 w-full"><textarea name="question_1" class="w-full h-200 text-xs text-dashInputColor" required>{{$value["question_1"]}}</textarea></td>--}}
    {{--                            <td class="px-6 py-4 w-full"><textarea name="question_2" class="w-full h-200 text-xs text-dashInputColor" required>{{$value["question_2"]}}</textarea></td>--}}
    {{--                            <td class="px-6 py-4 w-full"><textarea name="question_3" class="w-full h-200 text-xs text-dashInputColor" required>{{$value["question_3"]}}</textarea></td>--}}
    {{--                            <td class="px-6 py-4 w-full"><textarea name="question_4" class="w-full h-200 text-xs text-dashInputColor" required>{{$value["question_4"]}}</textarea></td>--}}
    {{--                            <td class="px-6 py-4 w-full"><textarea name="question_5" class="w-full h-200 text-xs text-dashInputColor" required>{{$value["question_5"]}}</textarea></td>--}}
    {{--                            <td class="px-6 py-4 w-full"><textarea name="question_6" class="w-full h-200 text-xs text-dashInputColor" required>{{$value["question_6"]}}</textarea></td>--}}
    {{--                            <td class="px-6 py-4 w-full"><textarea name="question_7" class="w-full h-200 text-xs text-dashInputColor" required>{{$value["question_7"]}}</textarea></td>--}}
    {{--                            <td class="px-6 py-4 w-full"><textarea name="question_8" class="w-full h-200 text-xs text-dashInputColor" required>{{$value["question_8"]}}</textarea></td>--}}
    {{--                        </form>--}}
    {{--                    </tr>--}}
    {{--                @endforeach--}}
    {{--                </tbody>--}}
                </table>
            </div>

        </section>

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
