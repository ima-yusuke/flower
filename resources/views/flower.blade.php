<x-layout>
    <div class="bg-main-bg flex flex-col justify-center items-center w-full min-h-screen">
        {{--質問画面--}}
        <x-question></x-question>

        {{--確認画面--}}
        <x-confirm></x-confirm>

        {{--結果画面--}}
        <x-result></x-result>
    </div>

    <script>
        const questions = @json($data);

        let products = [
            {
                id:1,
                name: 'コスモス',
                detail:"コスモスの花は、ピンクや白に加えて濃赤、黄やオレンジ色、複色が登場し、年々カラフルになっています。性質はいたって丈夫で、日当たりと風通しがよい場所であれば、あまり土質を選ばずに育ちます。",
                img:"{{asset('img/flower01.jpg')}}",
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

