 /*** Table Users ***/

 $(document).ready(function(){
    carregarTabelaUser(0);

    //$("#successDelete").hide(); // hide message success delete

});

// Pagination
$(document).on('click', '.paginationUser a', function(e) {
    e.preventDefault();
    var pagina = $(this).attr('href').split('page=')[1];
    carregarTabelaUser(pagina);
});

$("#search").keyup(function() {
    carregarTabelaUser(0);
  });

// Search user
function carregarTabelaUser(pagina) {

     // Gif
     $('.users_data').html('<div class="d-flex justify-content-center mt-3 loading">Loading&#8230;</div>');

    var search = $("#search").val();

    $.ajax({
    url: "/users/list" + "?page=" + pagina,
    method: 'GET',
    data: {search: search}
        }).done(function(data){
        // console.log(data);

        setTimeout(function() {
            if(data) {
                $('.users_data').html(data);
            }else {
                $('.users_data').html('<div class="">Error</div>');
            }
        }, 1000);
    });
}
