$(function(){


    //create
    $('#article_create_form').on('submit', function(e){
        e.preventDefault();

        $.ajax({
            type: $(this).attr('method') ,
            url: $(this).attr('action') ,
            data: $(this).serialize() ,
            success: function(data){
                $('#article_table').load(location.href + " #article_table");
                $('#article_create').modal('toggle');
            },
            error: function(e){
                alert(e);//if error occurs
            }

        })
    })


    //view data in modal
    $(document).on('click', '#edit_modal_trigger', function(e){
        e.preventDefault();

        var id = $(this).data('id');

        $.ajax({
            type: 'GET' ,
            url: '/article/' + id ,
            success: function(data){
               $('#title_update').val(data.title);
               $('#content_update').val(data.content);

               $('#article_update_form').attr('action', '/article/'+ id);
            },
            error: function(e){
                alert(e);//if error occurs
            }

        })
    })


      //UPDATE | EDIT
      $('#article_update_form').on('submit', function(e){
        e.preventDefault();

        console.log('working');

        $.ajax({
            type: $(this).attr('method') ,
            url: $(this).attr('action') ,
            data: $(this).serialize() ,
            success: function(data){
                // console.log(data);
                $('#article_table').load(location.href + " #article_table");

                $('#article_update').modal('toggle');

            },
            error: function(e){
                alert(e);//if error occurs
            }

        })
    })


    //view data in modal | delete
    $(document).on('click', '#delete_modal_trigger', function(e){
        e.preventDefault();

        var id = $(this).data('id');

        console.log(id);

        $.ajax({
            type: 'GET' ,
            url: '/article/' + id ,
            success: function(data){
                $('#to_delete_name').text(data.title);
                $('#to_delete_id').val(data.id);
            },
            error: function(e){
                alert(e);//if error occurs
            }

        })
    })



    //delete
    $(document).on('click', '#confirm_delete_article', function(e){
        e.preventDefault();

        var id = $('#to_delete_id').val();

        console.log(id);

        $.ajax({
            type: 'DELETE' ,
            url: '/article/' + id ,
            data: {
                _token:$('input[name=_token]').val(),
            },
            success: function(data){
                console.log(data);

                $('#article_table').load(location.href + " #article_table");
                $('#article_delete').modal('toggle');
            },
            error: function(e){
                alert(e);//if error occurs
            }

        })
    })



    //upvote
    $('#article_upvote').on('submit', function(e){
        e.preventDefault();

        $.ajax({
            type: $(this).attr('method') ,
            url: $(this).attr('action') ,
            data: $(this).serialize() ,
            success: function(data){
                console.log(data);
                $('#vote_count').text(data.vote_count);

            },
            error: function(e){
                alert(e);//if error occurs
            }

        })
    })

    //downvote
    $('#article_downvote').on('submit', function(e){
        e.preventDefault();

        $.ajax({
            type: $(this).attr('method') ,
            url: $(this).attr('action') ,
            data: $(this).serialize() ,
            success: function(data){
                console.log(data);
                $('#vote_count').text(data.vote_count);

            },
            error: function(e){
                alert(e);//if error occurs
            }

        })
    })


})
