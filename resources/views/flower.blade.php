<x-layout>
    <div class="bg-main-bg flex flex-col justify-center items-center w-full min-h-screen">
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
        <div id="confirm" class="confirm hide gap-6 pt-10">
            <h1 class="font-bold text-2xl text-center mb-4 text-confirm-bg">以下の回答内容でよろしいですか？</h1>
            <div id="reconfirm" class="flex flex-col gap-6 bg-confirm-bg px-24 py-8 rounded-2xl"></div>
            <button class="btn" id="confirm-btn">診断結果を見る</button>
        </div>

        {{--結果画面--}}
        <div id="result" class="result hide flex flex-col justify-center items-center gap-8">
            <p id="flower-name" class="font-bold text-xl"></p>
            <div class="flex gap-10 w-[70%]">
                {{--左側画像--}}
                <img id="selectedImg" style="height: 450px; width: 350px" class="object-cover">


                {{--右側詳細--}}
                <div class="flex flex-col justify-center items-center gap-4 w-[60%]">
                    <div id="detail">

                    </div>
                    <aside class="flex gap-4">
                        <button id="restart-btn" class="btn-white">初めからやり直す</button>
                        <button id="buy-btn" class="btn">購入する</button>
                    </aside>
                </div>
            </div>
        </div>
    </div>

<script>
    const questions = @json($data);

    let products = [
        {
            id:1,
            name: 'コスモス',
            detail:"コスモスの花は、ピンクや白に加えて濃赤、黄やオレンジ色、複色が登場し、年々カラフルになっています。性質はいたって丈夫で、日当たりと風通しがよい場所であれば、あまり土質を選ばずに育ちます。",
            img:"{{asset('img/flower01.jpeg')}}",
            attributes:["赤色","大","家族","クリスマス"],
            priority:1,
            is_enabled:1
        },
        {
            id:2,
            name: 'チューリップ',
            detail:"チューリップは花も葉もシンプルで美しく、世界中で人気のある球根植物です。これまでに数えられないほどの品種が誕生し、現在の品種リストには5000を超える品種が登録され、およそ1000品種が世界中で育てられています。",
            img:"{{asset('img/flower03.jpg')}}",
            attributes:["白色","小","友人","卒業式"],
            priority:1,
            is_enabled:1
        },
        {
            id:3,
            name: 'ひまわり',
            detail:"夏を代表する花であるひまわり（ヒマワリ）。4～6月頃に種をまくと1週間ほどで発芽し、7～9月に開花時期を迎えて、大きなものでは3mほどにまで成長します。",
            img:"{{asset('img/flower02.jpeg')}}",
            attributes:["黄色","中","恋人","自分","誕生日"],
            priority:1,
            is_enabled:1
        }
    ];

    let tmpArray =[];

    // 非表示なのは除外(is_enabledが1でないもの)
    products.forEach((value)=>{
        if(value["is_enabled"]===1){
            tmpArray.push(value);
        }
    })

    products = tmpArray;

</script>
</x-layout>

