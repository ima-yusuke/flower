<x-layout>
    <div class="bg-main-bg flex flex-col justify-center items-center w-full min-h-screen">
        {{--質問画面--}}
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

        {{--確認画面--}}
        <div id="confirm" class="confirm hide gap-6 pt-10">
            <h1 class="font-bold text-2xl text-center mb-4 text-confirm-bg">以下の回答内容でよろしいですか？</h1>
            <div id="reconfirm" class="flex flex-col gap-6 bg-confirm-bg px-24 py-8 rounded-2xl"></div>
            <button class="btn" id="confirm-btn">診断結果を見る</button>
        </div>

        {{--結果画面--}}
        <div id="result" class="result hide flex justify-between items-center gap-8 w-full">
            <div class="flex justify-between">
                <div class="absolute -bottom-48 -left-24 w-[800px] h-[800px] bg-result-ball rounded-full">
                    <img id="selectedImg" class="object-cover absolute left-1/3 top-1/4 transform translate-x-20 -translate-y-56 z-10 rounded-full w-[400px] h-[400px]">
                </div>
                <div class="w-[50%]">

                </div>
                {{--右側詳細--}}
                <div class="flex flex-col justify-center items-center gap-4 w-[50%] mx-10">
                    <div id="detail" class="flex flex-col gap-8">
                        {{--タイトル--}}
                        <div class="font-bold flex flex-col gap-2">
                            <p>あなたにおすすめなのは</p>
                            <aside class="flex items-center">
                                <h2 class="text-4xl">商品名<span class="p_name"></span></h2>
                                <p>です！</p>
                            </aside>
                        </div>

                        {{--詳細--}}
                        <p class="p_detail"></p>

                        {{--項目--}}
                        <aside>

                        </aside>
                    </div>
                    <aside class="flex gap-4">
                        <button class="btn-white">
                            <a href="{{route("show_home")}}">初めからやり直す</a>
                        </button>

                        {{--modal open button--}}
                        <button data-modal-target="default-modal" data-modal-toggle="default-modal" id="open-modal-btn" class="btn block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center" type="button">
                            購入する
                        </button>
                    </aside>

                    <!-- Main modal -->
                    <div id="default-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                        <div class="relative p-4 w-full max-w-2xl max-h-full">
                            <!-- Modal content -->
                            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                <!-- Modal header -->
                                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                        購入先リンク
                                    </h3>
                                </div>
                                <!-- Modal body -->
                                <div class="p-4 md:p-5 space-y-4">
                                    <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
                                        メールアドレスを入力して『送信』ボタンを押してください。<br>
                                        ご入力頂いたメールアドレスに購入先リンクをお送り致します。
                                    </p>
                                    <input type="email" placeholder="test@com" class="w-full rounded-md">
                                </div>
                                <!-- Modal footer -->
                                <div class="flex items-center justify-between p-4 md:p-5 border-t border-gray-200 rounded-b">
                                    <button data-modal-hide="default-modal" type="button" class="mail-btn py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100">閉じる</button>
                                    <button data-modal-hide="default-modal" type="button" class="mail-btn text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">送信</button>
                                </div>
                            </div>
                        </div>
                    </div>
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

    // 購入ボタンを押したときにmodalでbodyのoverflow-hiddenが外れる問題に対応
    let mail_btn = document.getElementsByClassName("mail-btn");
    for (let i = 0; i < mail_btn.length; i++) {
        mail_btn[i].addEventListener("click", function () {
            let body = document.querySelector("body");
            body.style.overflow = "hidden";
        });
    }

</script>
</x-layout>

