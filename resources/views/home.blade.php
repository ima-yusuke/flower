<x-layout>
    <div class="h-screen bg-top-white">
        {{--右側コンテンツ--}}
        <div class="h-full w-[65%]">
            <img src="{{asset("img/top-flower.jpg")}}" class="h-full w-full object-cover">
        </div>

        {{--左側コンテンツ--}}
        <div>

        </div>
    </div>

    {{--position absoluteパート--}}
    <div class="bg-white font-bold text-4xl absolute top-52 right-48 px-8 py-10 w-[500px] leading-6">
        簡単な質問に答えて<br></br>あなたにピッタリな花を<br></br>見つけよう
    </div>

    <button class="bg-top-button-pink text-white px-16 absolute bottom-20 left-1/2 transform -translate-x-1/2">
        <a id="start-btn" href="{{route("show_flower")}}">はじめる</a>
    </button>
</x-layout>
