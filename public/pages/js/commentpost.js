$(document).ready(function () {
    $('#submit').on('click',function(event){
        event.preventDefault();
        var author_id=$('#author_id').val();
        var sender_id=$('#sender_id').val();
        var text=$('#text').val();

        $.ajax({
            url: "/sendcomment",
            type:"POST",
            dataType: "html",
            data:{
                "_token": $('meta[name="csrf-token"]').attr('content'),
                author_id:author_id,
                sender_id:sender_id,
                text:text
            },
            success:function(response){
                console.log(response);
                 window.history.back();
            },
        });
    });
});

