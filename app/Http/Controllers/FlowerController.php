<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FlowerController extends Controller
{
    //商品データ
    public $p_data =[
        ["id" => 1, "name" => "Aセット","text"=>"aaaaaaaaaaaa"],
        ["id" => 2, "name" => "Bセット","text"=>"bbbbbbbbbb"],
        ["id" => 3, "name" => "Cセット","text"=>"cccccccccc"],
        ["id" => 4, "name" => "Dセット","text"=>"ddddddddddddd"]
    ];

    //質問・回等データ
    public $data =[
        ["id" => 1, "question" => "どんな雰囲気？","answer"=>["シック","モダン","暗め","明るめ","その他"],"order"=>1],
        ["id" => 2, "question" => "誰に渡す？","answer"=>["自分","友人","家族","恋人","その他"],"order"=>2],
        ["id" => 3, "question" => "いつ渡す？","answer"=>["誕生日","クリスマス","卒業式","その他"],"order"=>3]
    ];

    //属性データ
    public $atb_data =[
        ["id" => 1, "category_name" => "色","attributes"=>["赤色","黄色","白色"]],
        ["id" => 2, "category_name" => "サイズ","attributes"=>["小","中","大"]],
        ["id" => 3, "category_name" => "価格","attributes"=>["お手頃","高級"]],
    ];

    //swap用テストデータ
    public $test_product_data =[
        ["id" => 1, "order"=>1, "name" => "コスモス","img"=>"img/flower01.jpg","text"=>"コスモスの花は、ピンクや白に加えて濃赤、黄やオレンジ色、複色が登場し、年々カラフルになっています。性質はいたって丈夫で、日当たりと風通しがよい場所であれば、あまり土質を選ばずに育ちます。"],
        ["id" => 2, "order"=>2,"name" => "チューリップ","img"=>"img/flower03.jpg","text"=>"チューリップは花も葉もシンプルで美しく、世界中で人気のある球根植物です。これまでに数えられないほどの品種が誕生し、現在の品種リストには5000を超える品種が登録され、およそ1000品種が世界中で育てられています。"],
        ["id" => 3,"order"=>3, "name" => "ひまわり","img"=>"img/flower02.jpeg","text"=>"夏を代表する花であるひまわり（ヒマワリ）。4～6月頃に種をまくと1週間ほどで発芽し、7～9月に開花時期を迎えて、大きなものでは3mほどにまで成長します。"],
        ["id" => 4,"order"=>4, "name" => "テスト花","img"=>"img/flower01.jpeg","text"=>"テスト花です。"],
    ];

    public $category_data =[
        ["id" => 1, "name" => "色"],
        ["id" => 2, "name" => "サイズ"],
        ["id" => 3, "name" => "価格"],
    ];

    public $attribute_data = [
        ["id" => 1, "category_id" => 1, "name" => "赤色", "is_enable" => 1],
        ["id" => 2, "category_id" => 1, "name" => "黄色", "is_enable" => 1],
        ["id" => 3, "category_id" => 1, "name" => "白色", "is_enable" => 1],
        ["id" => 4, "category_id" => 2, "name" => "小", "is_enable" => 1],
        ["id" => 5, "category_id" => 2, "name" => "中", "is_enable" => 1],
        ["id" => 6, "category_id" => 2, "name" => "大", "is_enable" => 1],
        ["id" => 7, "category_id" => 3, "name" => "お手頃", "is_enable" => 1],
        ["id" => 8, "category_id" => 3, "name" => "高級", "is_enable" => 1],
    ];

    //ホーム画面
    public function show_home()
    {
        return view("home");
    }

    //診断ページ
    public function show_question_page()
    {
        $data = $this->data;
        return view("flower",compact("data"));
    }

    //管理画面/商品登録
    public function show_register_product()
    {
        $data = $this->p_data;
        return view("dash-product",compact("data"));
    }

    //管理画面/質問設定
    public function show_register_question()
    {
        $data = $this->data;
        return view("dash-question",compact("data"));
    }

    //管理画面/リンク設定
    public function show_register_link()
    {
        $data = $this->p_data;
        return view("dash-link",compact("data"));
    }

    //管理画面/属性追加
    public function show_add_attribute()
    {
        $data = $this->atb_data;
        return view("dash-add-attribute",compact("data"));
    }

    //管理画面/回答属性付与
    public function show_answer_attribute()
    {
        $data = $this->atb_data;
        $q_data = $this->data;
        return view("dash-answer-attribute",compact("data","q_data"));
    }

    public function show_nozaki()
    {
        $ct_data = $this->category_data;
        $att_data = $this->attribute_data;
        return view("dash-nozaki", compact("ct_data", "att_data"));
    }

    public function show_swap()
    {
        $data = $this->test_product_data;
        return view("dash-swap",compact("data"));
    }

    public function show_swap2()
    {
        $data = $this->test_product_data;
        return view("dash-swap2",compact("data"));
    }
}
