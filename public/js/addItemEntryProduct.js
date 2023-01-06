 /*** Table Products ***/

 $(document).ready(function(){
    //carregarListItemEntryProduct();
    $("#successDelete").hide(); // hide message success delete
   // $("#errorDelete").hide();
});


// Create form de itens de products
var x = 1;
$(document).on('click', '.add-item-product', function(e) {
    e.preventDefault();
    x++
    $('#form-add-item-product').append("<div class='row mt-3 form-group-itens-product-"+x+"'><div class='col-md-8'><select id='form-select-"+x+"' class='form-select' aria-label=''></select></div><div class='col-3 type-number'><input step='1' value='1' type='number' class='form-control' /></div><div class='col-1 d-flex align-items-center'><i style='color: #e93535; font-size: 16px;cursor: pointer;' class='bx bxs-trash remove_field'></i></div></div></div>");

    $.ajax({
        url: "/item/entry/list/product",
        method: 'GET',
            }).done(function(data){
            $.each(data, function( k, v ) {
                $("#form-select-"+x+"").append("<option value='"+ v.id +"'>"+ v.name +"</option>");
            });
        });
});

//user click on remove text
$(document).on("click", ".remove_field", function(e) {
    e.preventDefault();
    $(".form-group-itens-product-"+x+"").remove();
    x--;
  });


// Create Entry Product
$(document).on('click', '.saveForm', function(e) {
   // $(".saveForm").show();

    value = $(".form_add_itens_product").serialize();

    // $.ajax({
    //     url: "/entry/product/create",
    //     method: 'POST',
    //     data: value,
    //         }).done(function(data){
    //         console.log(data);

    //         if(data) {
    //             $("#successCreate").show();
    //             $(".saveForm").hide();

    //             carregarListItemEntryProduct(0);
    //         }
    //     })
    //     .fail(function(error) {

    //         $.each(error.responseJSON.errors, function( k, v ) {
    //             $('.msgError').append("<div class='alert alert-danger errorMsg' role='alert'>" + v + "</div>");
    //           });

    //           $( ".errorMsg" ).fadeIn(300).delay(3000).fadeOut(300);

    //           setTimeout(function() {
    //             $( ".errorMsg" ).remove();
    //         }, 4000);
    //       });
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
