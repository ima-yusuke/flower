<div id="quiz" class="quiz hide">
    <div class="flex justify-center items-center gap-10 h-full mt-[80px]">
        {{--左側コンテンツ（画像）--}}
        <div style="width: 450px; height: 450px;" id="tmpImg" >
            <img src="{{ asset("/img/box.jpg") }}" style="width: 100%; height: 100%; object-fit: cover;" class="rounded-3xl">
        </div>

        {{--右側コンテンツ（質問＆選択肢）--}}
        <div class="flex flex-col">
            <div id="question" class="font-bold text-xl text-center mb-4"></div>
            <div id="answer-buttons"></div>
        </div>
    </div>
</div>
