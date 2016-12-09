$(document).ready(function(){
    $(".status_set").click(function(){
        var status = $('.avatar_status').attr('data');
        var status_new = $(this).attr('data');
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
       
        $.ajax({
            url:'/status',
            type:'post',
            data:{ajax_status:$(this).attr('data'),_token: CSRF_TOKEN},
            success:function(result){
                if(result=='ok'){
                    $('.avatar_status').attr('data',status_new);
                    $('.avatar_status').removeClass(status);
                    $('.avatar_status').addClass(status_new);
                }
            }
        })
    })
})

