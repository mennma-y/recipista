@extends('layouts.app')

@section('content')
    @include('parts.header')
        <div class="container">
            <div class="recipi-main-title" style="margin-top: 40px;">
                <h1 style="text-align: center;padding-bottom:10px; border-bottom:solid 5px hotpink">みんなの思い出の品や得意料理をシェアしよう！</h1>
            </div>
            <div class="recipi-sub-text" style="margin-top:50px;">
                <p>お気に入りのレシピがあれば<span style="color: tomato;">いいね</span>を押すこともできるよ！</p>
                <p>フォローしてお友達になろう♪</p>
                <p>あと1品何か作りたいときや献立が思いつかないときにも活用できるよ！！</p>
            </div>

            <div class="create-button">
                <a href="{{route('recipi.create')}}" class="btn btn-primary">新規投稿</a>
            </div>
            
            <div class="recipi-itiran" style="display: flex;flex-wrap:wrap;justify-content:center;">
                @foreach($recipis as $recipi)
                    <div class="card" style="width: 18rem;">
                        <img src="{{asset($recipi->img_url)}}" style="width:60%; margin:auto; margin-top:30px;" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title" style="font-weight:bold;">{{$recipi->recipi_name}}</h5>
                            <p class="card-text">{{$recipi->category}}</p>
                            <a href="{{route('recipi.show',['id'=>$recipi->id])}}" class="btn btn-primary">レシピ詳細</a>
                            <div class="heart" style="width: 10%;margin:auto;margin-top:10px;">
                                <!-- <img src="/image/icon-heart-twitterblue.svg" alt="" style="width: 100%;"> -->
                                @if($recipi->users()->where('user_id', Auth::id())->exists())
                                    <form action="{{ route('unfavorites', $recipi) }}" method="POST">
                                    @csrf
                                        <input type="image" src="/image/icon-heart-twitterblue.svg" style="width:100%;">
                                    </form>
                                @else
                                    <form action="{{ route('favorites', $recipi) }}" method="POST">
                                    @csrf
                                        <input type="image" src="/image/icon-heart.svg" style="width:100%;">
                                    </form>

                                    

                                @endif
        
                                    <p>{{ $recipi->users()->count() }}</p>
                                
                            </div>
                            @if($recipi->user_id == $user->id)
                                <a href="{{route('recipi.edit',['id'=>$recipi->id])}}" class="btn btn-info" style="color: #fff;margin-top:10px;">編集</a>
                            @endif
                            
                        </div>
                    </div>
                @endforeach

                <div class="event-pagination" style="width: 20%; margin:30px auto;">
                    {{$recipis->links()}}
                </div>
    
            </div>

        </div>
    @include('parts.footer')
@endsection