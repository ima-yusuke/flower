<x-app-layout>
    <div class="flex justify-center items-center py-12">
        {{--swap コンテイナー--}}
        <div class="image-container flex flex-col justify-center items-center gap-y-24">

            {{--too画像--}}
            <div class="flex justify-center gap-12">
                <div>
                    <img src="{{asset($data[0]["img"])}}" id="image0" data-key="{{$data[0]['id']}}" class="top_image">
                </div>
                <div class="flex flex-col gap-8 w-[500px]">
                    <div class="font-bold flex flex-col gap-2">
                        <p>あなたにおすすめなのは</p>
                        <aside class="flex items-end gap-2">
                            <h2 class="text-4xl">商品名<span class="p_name" id="p_name">{{$data[0]["name"]}}</span></h2>
                            <p>です！</p>
                        </aside>
                    </div>

                    <p class="p_detail" id="p_detail">{{$data[0]["text"]}}</p>
                </div>
            </div>
            {{--下の画像3つ--}}
            <div class="flex gap-64" id="small_image_container">
                @foreach($data as $key=>$value)
                    @if($key!==0)
                        <div class="flex flex-col items-center gap-2">
                            <img src="{{asset($value["img"])}}" data-key="{{ $value['id']}}" class="image small_image">
                            <p class="rank">【第{{$value["order"]}}位】</p>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </div>

    <script>
        // データをphpから取得し、さらにimgにasset関数を追加
        const products = @json(array_map(function ($product) {
        $product['img'] = asset($product['img']);
        return $product;
        }, $data));

        // メイン(1位）画像
        const mainImage = document.getElementById('image0');

        // その他の候補の画像3つ
        const images = document.querySelectorAll('.image-container .flex img');

        // メイン画像の表示位置を固定させるためtop、leftに現在の位置を追加
        mainImage.style.top = mainImage.offsetTop + 'px';
        mainImage.style.left = mainImage.offsetLeft +'px';

        // 同様に各候補画像の表示位置を固定させるためtop、leftに現在の位置を追加
        images.forEach(image => {
            image.style.top = image.offsetTop + 'px';
            image.style.left = image.offsetLeft + 'px';
        });

        // 下の画像クリック時の処理
        images.forEach(image => {
            image.addEventListener('click', function() {
                // getBoundingClientRectは要素のtop、right、bottom、left、width、heightを返す
                // メイン画像の中心座標を計算
                const mainImageRect = mainImage.getBoundingClientRect();
                const mainImageCenterX = mainImageRect.left + mainImageRect.width / 2;
                const mainImageCenterY = mainImageRect.top + mainImageRect.height / 2;

                // クリックされた画像の中心座標を計算
                const imageRect = image.getBoundingClientRect();
                const imageCenterX = imageRect.left + imageRect.width / 2;
                const imageCenterY = imageRect.top + imageRect.height / 2;

                // メイン画像とクリックされた画像の中心の差を計算
                const deltaX = mainImageCenterX - imageCenterX;
                const deltaY = mainImageCenterY - imageCenterY;

                // クリックした画像をメイン画像の中心に移動
                image.style.transform = `translate(${deltaX}px, ${deltaY}px)`;

                // クリックした画像が動き始めて500後に下記実行される
                setTimeout(() => {
                    //画像srcの入れ替え
                    const tempSrc = mainImage.src;
                    mainImage.src = image.src;
                    image.src = tempSrc;

                    // クリックされた画像のid取得
                    let selectedImgId = image.getAttribute('data-key');

                    // クリックされた画像のidをもとにデータ取得
                    let newMainProduct = null;
                    // ソートで使用（新small画像3つのデータ）
                    let newImagesArray = [];

                    products.forEach((value)=>{
                        if(value["id"]==selectedImgId){
                            newMainProduct = value;
                        }else{
                            newImagesArray.push(value)
                        }
                    })

                    // data-keyの更新
                    image.setAttribute("data-key",mainImage.getAttribute('data-key'))
                    mainImage.setAttribute("data-key",selectedImgId)

                    // 名前更新
                    let p_name =document.getElementById("p_name");
                    p_name.innerHTML = newMainProduct["name"]

                    // 詳細更新
                    let p_detail =document.getElementById("p_detail");
                    p_detail.innerHTML = newMainProduct["text"]

                    // imageのみ動いている（mainImageはsrcのみ変更）
                    // ①imageがまずmainImageのとこに移動（imageに上記image.style.transformでtransform追加)
                    // ②imageのsrcが変わる
                    // ③下記でtransformを空にすることで元の位置に戻る
                    image.style.transform = '';

                    // ここからsort（案）
                    function compareOrder(a, b) {
                        return a.order - b.order;
                    }

                    // newImagesArrayをorderの数が小さい順にソートする
                    newImagesArray.sort(compareOrder);

                    setTimeout(()=>{
                        let smallImages = document.querySelectorAll("#small_image_container div img");
                        let ranks = document.getElementsByClassName("rank");

                        // 一度画像を非表示
                        for(let i= 0; i<smallImages.length;i++){
                            smallImages[i].classList.add("fade-out");
                            ranks[i].classList.add("fade-out");
                        }

                        // ソートしてから再度表示させる
                        setTimeout(()=>{
                            for(let i= 0; i<smallImages.length;i++){
                                smallImages[i].src = newImagesArray[i].img;
                                smallImages[i].setAttribute("data-key",newImagesArray[i]["id"])
                                ranks[i].innerHTML ="【第"+ newImagesArray[i].order+"位】";
                                smallImages[i].classList.remove("fade-out");
                                ranks[i].classList.remove("fade-out");
                            }
                        },500)

                    },500)

                }, 700);
            });
        });
    </script>
</x-app-layout>
