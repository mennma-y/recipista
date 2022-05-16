
    <header>
        <ul class="nav nav-pills nav-fill" style="border: solid 1px;">
            <li class="nav-item" style="background-color: goldenrod;">
                <a class="nav-link" style="color: #111;border: solid 1px;font-weight:bold;"href="{{route('recipi.home')}}">ホーム</a>
            </li>
            <li class="nav-item"style="background-color: goldenrod;">
                <a class="nav-link" style="color: #111;border: solid 1px;font-weight:bold;" href="{{route('recipi.main')}}">Recipi Share</a>
            </li>
            <li class="nav-item"style="background-color: goldenrod;">
                <a class="nav-link" style="color: #111;border: solid 1px;font-weight:bold;" href="{{route('user.index',['id'=>$user->id])}}">マイページ</a>
            </li>
            <li class="nav-item"style="background-color: goldenrod;">
                <a class="nav-link" style="color:#111;border: solid 1px;font-weight:bold;" href="{{route('notification')}}">通知</a>  
            </li>
        </ul>
    </header>
