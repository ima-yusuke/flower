<x-layout>
    <div class="flex flex-col justify-center items-center w-full min-h-screen">
        {{--開始画面--}}
        <div id="start" class="start">
            <h1>おすすめ商品診断</h1>
            <button id="start-btn" class="btn">スタート</button>
{{--            <button class="option-btn">--}}
{{--                <div>--}}
{{--                    <span class="rounded-circle">1</span>--}}
{{--                    <span>好きな色は？</span>--}}
{{--                </div>--}}
{{--                <span>▶</span>--}}
{{--            </button>--}}
        </div>

        {{--質問画面--}}
        <div id="quiz" class="quiz hide">
            <div class="flex justify-center items-center gap-10 h-full mt-[80px]">
                {{--左側コンテンツ（画像）--}}
                <div style="width: 450px; height: 450px;" id="tmpImg">
                    <img src="{{ asset("/img/box.jpg") }}" style="width: 100%; height: 100%; object-fit: cover;">
                </div>

                {{--右側コンテンツ（質問＆選択肢）--}}
                <div class="flex flex-col">
                    <div id="question" class="font-bold text-xl text-center mb-4"></div>
                    <div id="answer-buttons"></div>
                </div>
            </div>
        </div>

        {{--確認画面--}}
        <div id="confirm" class="confirm hide">
            <h1 class="font-bold text-xl text-center mb-4">回答内容は以下でよろしいですか？</h1>
            <div id="reconfirm" class="flex flex-col gap-4"></div>
            <button class="btn" id="confirm-btn">診断結果を見る</button>
        </div>

        {{--結果画面--}}
        <div id="result" class="result hide">
            <h1>診断結果</h1>
            <div id="score"></div>
            <p id="result-text" class="result-text"></p>
            <button id="restart-btn" class="btn">もう一度診断する</button>
        </div>
    </div>

<script>
    const questions = @json($data);

    const results = [
        {
            id:1,
            name: 'あなたにおすすめの商品は、コスモスです！',
            img:"{{asset('img/flower01.jpeg')}}",
            attributes:["赤色","大","家族","クリスマス"],
            score:[],
            priority:1
        },
        {
            id:2,
            name: 'あなたにおすすめの商品は、チューリップです！',
            img:"{{asset('img/flower03.jpg')}}",
            attributes:["白色","小","友人","卒業式"],
            score:[],
            priority:1
        },
        {
            id:3,
            name: 'あなたにおすすめの商品は、ひまわりです！',
            img:"{{asset('img/flower02.jpeg')}}",
            attributes:["黄色","中","恋人","自分","誕生日"],
            score:[],
            priority:1
        }
    ];
</script>
</x-layout>

