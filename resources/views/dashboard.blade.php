<x-app-layout>
    <div id="image-container">
        <div id="image-container">
            <img id="image1" class="image" src="{{asset('img/flower01.jpg')}}" alt="Static Image">
            <img id="image2" class="image" src="{{asset('img/flower02.jpeg')}}" alt="Animation">
        </div>
    </div>
    <button id="swap-button">Swap Images</button>


    <div class="py-12 flex flex-wrap gap-4 justify-center items-center">

        <div class="flex flex-col justify-center items-center shadow-xl text-center border-4 border-solid border-black bg-white w-[30%]">
            <a href="{{route("show_register_product")}}" class="w-full h-full hover:bg-black hover:text-white p-3">
                <div class="flex flex-col gap-2">
                    <p><i class="fa-solid fa-gift text-4xl"></i></p>
                    <p class="font-bold">商品登録・編集</p>
                </div>
            </a>
        </div>
        <div class="flex flex-col justify-center items-center shadow-xl text-center border-4 border-solid border-black bg-white w-[30%]">
            <a href="{{route("show_register_question")}}" class="w-full h-full hover:bg-black hover:text-white p-3">
                <div class="flex flex-col gap-2">
                    <p><i class="fa-solid fa-magnifying-glass text-4xl"></i></p>
                    <p class="font-bold">質問設定</p>
                </div>
            </a>
        </div>
        <div class="flex flex-col justify-center items-center shadow-xl text-center border-4 border-solid border-black bg-white w-[30%]">
            <a href="{{route("show_register_link")}}" class="w-full h-full hover:bg-black hover:text-white p-3">
                <div class="flex flex-col gap-2">
                    <p><i class="fa-solid fa-link text-4xl"></i></p>
                    <p class="font-bold">リンク設定</p>
                </div>
            </a>
        </div>
        <div class="flex flex-col justify-center items-center shadow-xl text-center border-4 border-solid border-black bg-white w-[30%]">
            <a href="{{route("show_add_attribute")}}" class="w-full h-full hover:bg-black hover:text-white p-3">
                <div class="flex flex-col gap-2">
                    <p><i class="fa-solid fa-palette text-4xl"></i></p>
                    <p class="font-bold">属性追加</p>
                </div>
            </a>
        </div>
        <div class="flex flex-col justify-center items-center shadow-xl text-center border-4 border-solid border-black bg-white w-[30%]">
            <a href="{{route("show_answer_attribute")}}" class="w-full h-full hover:bg-black hover:text-white p-3">
                <div class="flex flex-col gap-2">
                    <p><i class="fa-solid fa-pen-to-square text-4xl"></i></p>
                    <p class="font-bold">回答への属性付与</p>
                </div>
            </a>
        </div>
        <div class="flex flex-col justify-center items-center shadow-xl text-center border-4 border-solid border-black bg-white w-[30%]">
            <a href="{{route("show_home")}}" class="w-full h-full hover:bg-black hover:text-white p-3">
                <div class="flex flex-col gap-2">
                    <p><i class="fa-solid fa-cart-plus text-4xl"></i></p>
                    <p class="font-bold">商品への属性付与</p>
                </div>
            </a>
        </div>
        <div class="flex flex-col justify-center items-center shadow-xl text-center border-4 border-solid border-black bg-white w-[30%]">
            <a href="{{ route("show_nozaki") }}" class="w-full h-full hover:bg-black hover:text-white p-3">
                <div class="flex flex-col gap-2">
                    <p><i class="fa-solid fa-cart-plus text-4xl"></i></p>
                    <p class="font-bold">野嵜テスト用</p>
                </div>
            </a>
        </div>
    </div>
    <script>
        document.getElementById('swap-button').addEventListener('click', function() {
            const image1 = document.getElementById('image1');
            const image2 = document.getElementById('image2');

            // Apply zoom in and zoom out effects with translation
            image1.classList.add('image1-zoom-in');
            image2.classList.add('image2-zoom-out');

            // Wait for the animations to complete
            setTimeout(() => {
                // Swap the images in the DOM
                const container = document.getElementById('image-container');
                container.insertBefore(image2, image1);

                // Remove zoom effects immediately after swapping
                image1.classList.add('swapped');
                image2.classList.add('swapped');
                image1.classList.remove('image1-zoom-in');
                image2.classList.remove('image2-zoom-out');

                // Force a reflow to apply the immediate changes
                void image1.offsetWidth;
                void image2.offsetWidth;

                // Remove the swapped class to re-enable transitions
                image1.classList.remove('swapped');
                image2.classList.remove('swapped');
            }, 500); // Match this duration to the CSS transition duration
        });


    </script>
</x-app-layout>
