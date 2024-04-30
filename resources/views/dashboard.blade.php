<x-app-layout>
    <div class="py-12 flex flex-wrap gap-4 justify-center items-center">

            <div class="flex flex-col justify-center items-center shadow-xl text-center border-4 border-solid border-black bg-white w-[30%]">
                <a href="{{route("show_home")}}" class="w-full h-full hover:bg-black hover:text-white p-3">
                    <div class="flex flex-col gap-2">
                        <p><i class="fa-solid fa-gift text-4xl"></i></p>
                        <p class="font-bold">商品登録</p>
                    </div>
                </a>
            </div>
            <div class="flex flex-col justify-center items-center shadow-xl text-center border-4 border-solid border-black bg-white w-[30%]">
                <a href="{{route("show_home")}}" class="w-full h-full hover:bg-black hover:text-white p-3">
                    <div class="flex flex-col gap-2">
                        <p><i class="fa-solid fa-cart-plus text-4xl"></i></p>
                        <p class="font-bold">商品一覧</p>
                    </div>
                </a>
            </div>
            <div class="flex flex-col justify-center items-center shadow-xl text-center border-4 border-solid border-black bg-white w-[30%]">
                <a href="{{route("show_home")}}" class="w-full h-full hover:bg-black hover:text-white p-3">
                    <div class="flex flex-col gap-2">
                        <p><i class="fa-solid fa-palette text-4xl"></i></p>
                        <p class="font-bold">属性設定</p>
                    </div>
                </a>
            </div>
            <div class="flex flex-col justify-center items-center shadow-xl text-center border-4 border-solid border-black bg-white w-[30%]">
                <a href="{{route("show_home")}}" class="w-full h-full hover:bg-black hover:text-white p-3">
                    <div class="flex flex-col gap-2">
                        <p><i class="fa-solid fa-users text-4xl"></i></p>
                        <p class="font-bold">Q＆A設定</p>
                    </div>
                </a>
            </div>
            <div class="flex flex-col justify-center items-center shadow-xl text-center border-4 border-solid border-black bg-white w-[30%]">
                <a href="{{route("show_home")}}" class="w-full h-full hover:bg-black hover:text-white p-3">
                    <div class="flex flex-col gap-2">
                        <p><i class="fa-solid fa-link text-4xl"></i></p>
                        <p class="font-bold">リンク設定</p>
                    </div>
                </a>
            </div>
            <div class="flex flex-col justify-center items-center shadow-xl text-center border-4 border-solid border-black bg-white w-[30%]">
                <a href="{{route("show_home")}}" class="w-full h-full hover:bg-black hover:text-white p-3">
                    <div class="flex flex-col gap-2">
                        <p><i class="fa-solid fa-house text-4xl"></i></p>
                        <p class="font-bold">管理者設定</p>
                    </div>
                </a>
            </div>
    </div>

</x-app-layout>
