@extends('layouts.app')

@section('content')
    
    <div class="background-image" style="width: 100%;">
        <img src="/image/background-image.jpg" alt="" style="width: 100%;">

        <div class="title-text">
            <h1>ようこそ！<br><span style="color: tomato;">Recipistaへ！</span></h1>
            <div class="title-letter" style="margin-top: 150px;">
                <p>みんなが作った美味しい料理やおしゃれな料理を
                    <br>シェアしてHAPPYになろう！
                </p>
            </div>
            <div class="sub-letter" style="margin-top:100px;">
                <p>
                    料理好きのコミュニティをさらに広げるためのツール<br>です！
                    <br>料理を通じてたくさんのお友達を作ろう！
                </p>
            </div>
            <div class="third-text" style="margin-top: 110px;">
                <p>
                    <span style="color: tomato;">右上アイコン</span>から新規会員登録とログインができます！
                </p>
            </div>
            <h2 style="font-size: 30px;font-weight:bold; margin-top:200px;color:#fff;">Cooking saves the <span style="color:tomato;">world</span></h2>
        </div>

    </div>
    
    @include('parts.footer')
@endsection