@extends('layouts.app')

@section('content')
    @include('parts.header')
    <div class="background-image" style="width: 100%;">
        <img src="/image/background-image.jpg" alt="" style="width: 100%;">

        <div class="main-title-text">
            <div class="title-main">
                <h1>{{$user->name}}様ようこそ！<br><span style="color: tomato;">Recipistaへ！</span></h1>
            </div>
            <div class="title-letter" style="margin-top: 150px;">   
                <p>みんなが作った美味しい料理やおしゃれな料理を
                    <br>シェアしてHAPPYになろう！
                </p>
            </div>
            <div class="sub-letter" style="margin-top:150px;">
                <p>
                    料理好きのコミュニティをさらに広げるためのツール<br>です！
                    <br>料理を通じてたくさんのお友達を作ろう！
                </p>
            </div>
    
            <h2 style="font-size: 30px;font-weight:bold; margin-top:200px;color:#fff;">Cooking saves the <span style="color:tomato;">world</span></h2>
        </div>

    </div>
    
    @include('parts.footer')
@endsection