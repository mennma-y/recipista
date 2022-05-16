$( function ()
{
    $('.js-follow').click(function(){
        const this_obj = $(this);
        const followed_user_id = $(this).data('followed-user-id');
        const follow_id = $(this).data('follow-id');
        
        cache:false
        if(follow_id){
            //フォローを取り消す
            $.ajax({
                headers:{
                    'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
                },
                url: '/follow',
                type:'POST',
                data:{
                        'follow_id':follow_id
                },
                timeout: 10000
            })
                //取り消し成功
                .done(()=>{
                    
                    this.obj.text('フォローする');
                    this_obj.data('follow_id',null);
                })
                //取り消し失敗
                .fail((data) =>{
                    alert('処理中にエラーが生じました。');
                    console.log(data);
                });

        }else{
            //フォローする
            $.ajax({
                headers:{
                    'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
                },
                url: '/follow',
                type:'POST',
                data:{
                        'followed_user_id':followed_user_id
                },
                timeout: 10000

            })
                .data((data)=>{
                    this.obj.text('フォローを外す');
                    this_obj.data('follow-id',data['follow_id']);
                })

                //フォロー失敗
                .fail((data) =>{
                    alert('処理中にエラーが生じました。');
                    console.log(data);
                });  
        }
    })


});  