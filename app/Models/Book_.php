<?php

namespace App\Models;

class Book
{
    private static $books = [
        [
            "tittle" => "Rich Dad Poor Dad",
            "slug" => "rich-dad-poor-dad",
            "author" => "Robert Kiyosaki",
            "body" => "Lorem ipsum dolor sit, amet consectetur adipisicing elit. Qui at commodi quam distinctio omnis aliquid hic! Amet quibusdam natus quidem distinctio, aliquid enim quae. Provident voluptatum nihil unde mollitia quo."
        ],
        [
            "tittle" => "一生的财富",
            "slug" => "一-生-的-财-富",
            "author" => "(美国)拿破仑·希尔",
            "body" => "登誰神手力條荷因。奶浪助弟帽原加占課頭道青抱她呀園路幾。而雪又重走雄助几位坐呢汁采麼，那具果大時明拉欠公幾四許海半兄：言友牙怎貓申背福老扒己快，校還免。

        力孝課造物哭彩王定「時坐畫立字忍流羊隻氣」己黃更哭跟打美跑還房信姊巾植。士它穴亮英。司二丟蛋「住」昔元動貓聽個停昔黃珠牙亮母未樹。
        
        才歡跳兔哭而弓士昔點助尼黑說，訴尤連新蝸裝牙兄你樹話記幫送東斗化：肉西右能浪跳抓要您石各祖送告請蛋再字里怪因訴。
        
        斗們文尾；假七去兒英的活語這免由苗冰虎風游它帶免：十鼻呀棵上兄象們風沒尤竹背波；黃訴穿長枝馬屋。荷晚自人喝害科國行波夕隻事，吃手花尾往母們的內止幫身弟貝今青丁冒一乾：只兔午泉嗎朋。"
        ],

    ];

    public static function all()
    {
        return collect(self::$books);
    }

    public static function find($slug)
    {
        $books = static::all();
        // $singleBook = [];
        // foreach ($books as $b) {
        //     if ($b['slug'] === $slug) {
        //         $singleBook = $b;
        //     }
        // }

        return $books->firstWhere('slug', $slug);
    }
}
