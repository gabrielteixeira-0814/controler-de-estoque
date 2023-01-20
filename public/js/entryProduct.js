 /*** Table Products ***/

 $(document).ready(function(){
    carregarTabelaEntryProduct();
    $("#successDelete").hide(); // hide message success delete
   // $("#errorDelete").hide();
});


// Table Entry Product
function carregarTabelaEntryProduct() {

     // Gif
     $('.entryProducts_data').html('<div class="d-flex justify-content-center mt-3 loading">Loading&#8230;</div>');

    var search = $("#search").val();

    $.ajax({
    url: "/entry/product/list",
    method: 'GET',
    data: ''
        }).done(function(data){
        setTimeout(function() {
            if(data) {
                $('.entryProducts_data').html(data);
            }else {
                $('.entryProducts_data').html('<div class="">Error</div>');
            }
        }, 1000);
    });
}

// Return Form Entry Product
$(document).on('click', '.createEntryProduct', function(e) {

    $("#successCreate").hide(); //hide message
    $(".modalFormGif").hide();
    $("#gifForm").show();

    $.ajax({
        url: "/entry/product/form",
        method: 'GET',
        data: ''
            }).done(function(data){

            setTimeout(function() {
                if(data) {

                     // Gif
                     $("#gifForm").hide();

                     $(".modalFormGif").show();

                    $('.form-entryProduct').html(data);
                }else {
                    $('.form-entryProduct').html('<div class="">Error</div>');
                }
            }, 500);
        });
});


// Create Entry Product
$(document).on('click', '.saveForm', function(e) {
    $(".saveForm").show();

    value = $(".form_entryProduct").serialize();

    $.ajax({
        url: "/entry/product/create",
        method: 'POST',
        data: value,
            }).done(function(data){
            console.log(data);

            if(data) {
                $("#successCreate").show();
                $(".saveForm").hide();

                carregarTabelaEntryProduct(0);
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

// Show Entry Product
$(document).on('click', '.edit', function(e) {

    $("#successEdit").hide(); //hide message
    $(".modalGif").hide();
    $("#gif").show();

    var id = $(this).val();

    $.ajax({
        url: "/entry/product/"+ id + "",
        method: 'GET',
        data: ""
            }).done(function(data){
            setTimeout(function() {
                if(data) {

                    // Gif
                    $("#gif").hide();

                    $(".modalGif").show();

                    date = new Date(data[0].entryDate);
                    date = (date.getDate()+1)+"/"+(date.getMonth()+1)+"/"+date.getFullYear();

                    $('.id').val(data[0].id);
                    $('.entryDate').val(date);
                    $('.total').val(data[0].total);

                }else {
                    console.log('Error');
                }
            }, 1000);
        });
});

// Edit Entry Product
$(document).on('click', '.saveEdit', function(e) {
    $(".saveEdit").show();

    value = $(".form_product_edit").serialize();

    $.ajax({
        url: "/entry/product/update",
        method: 'POST',
        data: value,
            }).done(function(data){
            if(data) {
                $("#successEdit").show();
                $(".saveEdit").hide();

                carregarTabelaEntryProduct(0);
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


// Delete Entry Product
$(document).on('click', '.delete', function(e) {

    var id = $(this).val();
    $.ajax({
        url: "/entry/product/delete/"+ id + "",
        method: 'DELETE',
        data: ""
            }).done(function(data){
                if(data != 'Error') {
                    $("#successDelete").show();
                    carregarTabelaEntryProduct(0);

                    setTimeout(function() {
                        $("#successDelete").hide();
                    }, 3000);

                }else {
                    console.log('Error');
                    $("#errorDelete").show();
                }
        });
});

// Create form to add itens

 totalItens = 0;

 // Adicionar itens
 $(document).on('click', '.addItens', function(e) {
     e.preventDefault();
     $(".formItens").append("<div class='my-2 itens totalItens' ><input id='' class='form-control'><span><button class='deleteItens'>x</button></span></div>");

     totalItens++
 });

 // remove itens
 $(document).on('click', '.deleteItens', function(e) {
     e.preventDefault();
     $(".formItens").remove();

     totalItens--
 });
