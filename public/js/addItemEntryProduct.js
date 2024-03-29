 /*** Table Item Entry Products ***/

 $(document).ready(function(){
    $("#successDelete").hide(); // hide message success delete
});

// Create form de itens de products
 $(document).on('click', '#entryProductId', function(e) {
    var id = $(this).val();
     $('.idItem').val(id);
 });

 // Table Itens Entry Product

 $(document).on('click', '.list', function(e) {
     $(".modalGif").hide();
     $("#gif").show();

     var id = $(this).val();

     console.log(id);
     carregarTabelaItemEntryProduct(id);

 });

 function carregarTabelaItemEntryProduct(id) {

     // Gif
     $('.itemEntryProducts_data').html('<div class="d-flex justify-content-center mt-3 loading">Loading&#8230;</div>');

     $.ajax({
         url: "/item/entry/product/"+ id + "",
         method: 'GET',
         headers: {
             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
         },
         data: ""
     }).done(function(data){

         console.log(data);

         setTimeout(function() {
             if(data) {
                 $('.itemEntryProducts_data').html(data);
             }else {
                 $('.itemEntryProducts_data').html('<div class="">Error</div>');
             }
         }, 1000);
     });
 }

var x = 0;
$(document).on('click', '.add-item-product', function(e) {
    e.preventDefault();
    x++
    $('#form-add-item-product').append("<div class='row mt-3 form-group-itens-product-"+x+"'><div class='col-md-8'><select id='form-select-"+x+"' name='name-select-"+x+"' class='form-select' aria-label=''></select></div><div class='col-3 type-number'><input step='1' value='1' type='number' id='quantity-"+x+"' name='name-quantity-"+x+"' class='form-control' /></div><div class='col-1 d-flex align-items-center'><i style='color: #e93535; font-size: 16px;cursor: pointer;' class='bx bxs-trash remove_field'></i></div></div></div>");

    $.ajax({
        url: "/item/entry/list/product",
        method: 'GET',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
            }).done(function(data){
            $.each(data, function( k, v ) {
                $("#form-select-"+x+"").append("<option value='"+ v.id +"'>"+ v.name +"</option>");
            });
        });
});

//item product click on remove text
$(document).on("click", ".remove_field", function(e) {
    e.preventDefault();
    $(".form-group-itens-product-"+x+"").remove();
    x--;
  });

// Create Item Entry Product
$(document).on('click', '.save-itens-add-product', function(e) {

    value = $("#form_add_itens_product").serialize();

    console.log(value);

    $.ajax({
        url: "/item/entry/product/create",
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: value,
            }).done(function(data){
            console.log(data);

            if(data) {
                $("#successCreate").show();
                $(".saveForm").hide();

                carregarListItemEntryProduct(0);
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
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
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
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: value,
            }).done(function(data){
            if(data) {
                $("#successEdit").show();
                $(".saveEdit").hide();

                carregarListItemEntryProduct(0);
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
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: ""
            }).done(function(data){
                if(data != 'Error') {
                    $("#successDelete").show();
                    carregarListItemEntryProduct(0);

                    setTimeout(function() {
                        $("#successDelete").hide();
                    }, 3000);

                }else {
                    console.log('Error');
                    $("#errorDelete").show();
                }
        });
});
