 /*** Table Users ***/

 $(document).ready(function(){
    carregarTabelaUser();
    //$("#successDelete").hide(); // hide message success delete
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
}
