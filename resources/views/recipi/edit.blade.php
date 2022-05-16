@extends('layouts.app')

@section('content')
    @include('parts.header')
        <div class="container myprofile-page">
            <div class="create-title">
                <h1 style="text-align:center;padding-bottom:10px;border-bottom:solid 5px hotpink;width:70%;
                    margin: auto;margin-top: 30px">このレシピを編集する</h1>  
            </div>
            <div class="create-image" style="width:60%; margin:auto; margin-top:30px; margin-bottom:60px;">
                <img src="{{$recipi->img_url}}" alt="" style="width:100%;">
            </div>
            <form action="{{route('recipi.delete',$recipi->id)}}" method="POST">
            @csrf
                    <div class="delete-button" style="width: 80%;float:right;margin-bottom:30px;">
                        <input type="submit" class="btn btn-danger" value="削除する">
                    </div>
            </form>
            <form action="{{route('recipi.update',$recipi->id )}}" method="POST" enctype="multipart/form-data" style="width:60%;margin:auto;">
            @csrf
                
                <div class="create-form">

                    <div class="mb-3">
                        <label for="img_url" class="form-label">レシピ写真(必須)</label>
                        <input type="file" name="img_url" class="col-md-6 col-form-label text-md-end" required>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">料理名(必須)</label>
                        <input type="text" name="recipi_name" class="form-control" id="exampleFormControlInput1" value="{{$recipi->recipi_name}}" required>
                    </div>

                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">カテゴリー(必須)</label>
                        <input type="text" name="category" class="form-control" id="exampleFormControlInput1" value="{{$recipi->category}}" required>
                    </div>


                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">レシピ詳細(必須)</label>
                        <textarea class="form-control" name="body" id="exampleFormControlTextarea1" rows="6" required>{{$recipi->body}}</textarea>
                    </div>
                </div>
            
                    <div class="edit-button" style="margin-bottom: 30px;">
                        <input type="submit" class="btn btn-primary" value="編集する">
                    </div>
            </form>
            
            
                
            
        </div>
    @include('parts.footer')
@endsection