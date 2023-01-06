 /*** Table Users ***/

 $(document).ready(function(){
    carregarTabelaUser();
    $("#successDelete").hide(); // hide message success delete
});


// Table user
function carregarTabelaUser() {

     // Gif
     $('.users_data').html('<div class="d-flex justify-content-center mt-3 loading">Loading&#8230;</div>');

    var search = $("#search").val();

    $.ajax({
    url: "/user/list",
    method: 'GET',
    data: ''
        }).done(function(data){

        setTimeout(function() {
            if(data) {
                $('.users_data').html(data);
            }else {
                $('.users_data').html('<div class="">Error</div>');
            }
        }, 1000);
    });
}

// Return Form user
$(document).on('click', '.createUser', function(e) {

    $("#successCreate").hide(); //hide message
    $(".modalFormGif").hide();
    $("#gifForm").show();

    $.ajax({
        url: "user/form",
        method: 'GET',
        data: ''
            }).done(function(data){

            setTimeout(function() {
                if(data) {

                     // Gif
                     $("#gifForm").hide();

                     $(".modalFormGif").show();

                    $('.form-user').html(data);
                }else {
                    $('.form-user').html('<div class="">Error</div>');
                }
            }, 500);
        });
});


// Create user
$(document).on('click', '.saveForm', function(e) {
    $(".saveForm").show();

    value = $(".form_user").serialize();

    $.ajax({
        url: "/user/create",
        method: 'POST',
        data: value,
            }).done(function(data){
            console.log(data);

            if(data) {
                $("#successCreate").show();
                $(".saveForm").hide();

                carregarTabelaUser(0);
            }
        })
        .fail(function(error) {

            $.each(error.responseJSON.errors, function( k, v ) {
                $('.msgError').append("<div class='alert alert-danger errorMsg' role='alert'>" + v + "</div>");
              });

              $( ".errorMsg" ).fadeIn(300).delay(3000).fadeOut(300);

              setTimeout(function() {
                $( ".errorMsg" ).remove();
            }, 4000);
          });
});


 // close modal create
 $(document).on('click', '.closeCreate', function(e) {
    $(".saveForm").show();
});


// Show user
$(document).on('click', '.edit', function(e) {

    $("#successEdit").hide(); //hide message
    $(".modalGif").hide();
    $("#gif").show();

    var id = $(this).val();

    $.ajax({
        url: "user/"+ id + "",
        method: 'GET',
        data: ""
            }).done(function(data){
            //console.log(data[0]);

            setTimeout(function() {
                if(data) {

                    // Gif
                    $("#gif").hide();

                    $(".modalGif").show();

                    $('.id').val(data[0].id)
                    $('.name').val(data[0].name)
                    $('.office').val(data[0].office)
                }else {
                    console.log('Error');
                }
            }, 1000);
        });
});


// Edit user
$(document).on('click', '.saveEdit', function(e) {
    $(".saveEdit").show();

    value = $(".form_user_edit").serialize();

    $.ajax({
        url: "/user/update",
        method: 'POST',
        data: value,
            }).done(function(data){

            if(data) {
                $("#successEdit").show();
                $(".saveEdit").hide();

                carregarTabelaUser(0);
            }
        }).fail(function(error) {

            // Message errors
            console.log("error");
            console.log(error.responseJSON.errors);

            $.each(error.responseJSON.errors, function( k, v ) {
                $('.msgErrorEdit').append("<div class='alert alert-danger errorMsgEdit' role='alert'>" + v + "</div>");
              });

              $( ".errorMsgEdit" ).fadeIn(300).delay(3000).fadeOut(300);

              setTimeout(function() {
                $( ".errorMsgEdit" ).remove();
            }, 4000);
          });
});

// close modal edit
$(document).on('click', '.closeEdit', function(e) {
    $(".saveEdit").show();
});


// Delete user
$(document).on('click', '.delete', function(e) {

    var id = $(this).val();
    $.ajax({
        url: "user/delete/"+ id + "",
        method: 'DELETE',
        data: ""
            }).done(function(data){
                console.log(data);
                if(data) {
                    $("#successDelete").show();
                    carregarTabelaUser(0);

                    setTimeout(function() {
                        $("#successDelete").hide();
                    }, 3000);

                }else {
                    console.log('Error');
                }
        });
});
