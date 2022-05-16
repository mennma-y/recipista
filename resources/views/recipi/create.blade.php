@extends('layouts.app')

@section('content')
    @include('parts.header')
        <div class="container myprofile-page">
            <div class="create-title">
                <h1 style="text-align:center;padding-bottom:10px;border-bottom:solid 5px hotpink;width:70%;
                    margin: auto;margin-top: 30px">MY料理を投稿してシェアしよう！！</h1>  
            </div>
            <div class="create-image" style="text-align:center;margin-top:30px;margin-bottom:60px;">
                <img src="/image/createImage.jpg" alt="">
            </div>
            <form action="{{route('recipi.store')}}" method="POST" enctype="multipart/form-data" style="width:60%;margin:auto;">
            @csrf
                
                <div class="create-form">
                    <div class="mb-3">
                        <label for="img_url" class="form-label">レシピ写真(必須)</label>
                        <input type="file" name="img_url" class="col-md-5 col-form-label text-md-end">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">料理名(必須)</label>
                        <input type="text" name="recipi_name" class="form-control" id="exampleFormControlInput1" placeholder="例：卵焼き" required>
                    </div>

                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">カテゴリー(必須)</label>
                        <input type="text" name="category" class="form-control" id="exampleFormControlInput1" placeholder="例：和食" required>
                    </div>


                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">レシピ詳細(必須)</label>
                        <textarea class="form-control" name="body" id="exampleFormControlTextarea1" rows="6" placeholder="材料と手順を書いてね！" required></textarea>
                    </div>
                </div>
                <div class="create-button" style="margin-bottom: 30px;">
                    <input type="submit" class="btn btn-primary" value="投稿する">
                </div>
            </form>
        </div>
    @include('parts.footer')
@endsection