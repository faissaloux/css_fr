jQuery(document).ready(function($) {
    // Code that uses jQuery's $ can follow here.

/*
compenets :
1 : add to cart
2 : Remove from cart 
3 : update cart item
4 : remove cart item
5 : search Logic
6 : home header search Logic
7 : Make order
8 : order logic
9 : Count orders
*/


/***********************************************
1 : add to cart
/***********************************************/
$('body .caestus_add_to_cart').click(function(){
    var productname  = $(this).data('name');  
    var productID    = $(this).data('id');  
    var productImage = $(this).data('image'); 
    var category     = $(this).data('category'); 
    var formData     = new FormData();
  
    formData.append('name', productname);   
    formData.append('id', productID);   
    formData.append('image', productImage);   
    formData.append('category', category); 
    formData.append('action', 'add_to_cart');  
      
    $.ajax({
        url: varjs.caestus_ajax_url,
        type: 'POST',
        processData: false,
        contentType: false, 
        data: formData,
        cache:false,
        dataType: "JSON",
        success: function(data){ 
            count();
        }
    });

});


/***********************************************
2 : Remove from cart
/***********************************************/
$('body .remove-from-cart').click(function(){
    
    var productID    = $(this).data('id');  
    var category     = $(this).data('category'); 
    var formData     = new FormData();
  
    
    formData.append('id', productID);  
    formData.append('category', category); 
    formData.append('action', 'remove_from_cart');  
      
    $.ajax({
        url: varjs.caestus_ajax_url,
        type: 'POST',
        processData: false,
        contentType: false, 
        data: formData,
        cache:false,
        dataType: "JSON",
        success: function(data) {
            window.location.href = "";
        }
     });
});


/***********************************************
3 : update cart item
/***********************************************/
$('body .product_quantity').change(function(){
  var quantity  = $(this).val();
  var id        = $(this).data('id');
  var category  = $(this).data('category');
  var formdata   = new FormData();

  formdata.append('id',id);
  formdata.append('quantity',quantity);
  formdata.append('category',category);
  formdata.append('action', 'product_quantity'); 

  jQuery.ajax({
    url: varjs.caestus_ajax_url,
    type : 'post',
    contentType : false,
    processData : false,
    dataType : 'html',
    data : formdata,
    success: function(){
        count();
    }
  });

  return false;
});



/***********************************************
4 : remove cart item
/***********************************************/
$(document).on('keyup', 'input[name=shoting_days]', function () {
  var _this = $(this);
  var min = parseInt(_this.attr('min')) || 1;
  var max = parseInt(_this.attr('max')) || 100; 
  var val = parseInt(_this.val()) || (min - 1); 
  if(val < min)
      _this.val( min );
  if(val > max)
      _this.val( max );
});




/***********************************************
5 : search Logic
/***********************************************/
function caestus_search($query){
    const query         = $query;
    const no_result     = $('.home_search_results .no-reuslt');
    const search_result = $('.home_search_results ul');
    no_result.html('');

    const formdata      = new FormData();
    formdata.append('q', query);
    formdata.append('action', 'search_product');

    jQuery.ajax({
        url: varjs.caestus_ajax_url,
        type : 'post',
        contentType : false,
        processData : false,
        dataType : 'json',
        data : formdata,
        success: function(response) {
            search_result.html('');
            $.each( response[0], function(k, v) {
                
                var title = v['title'];
                var id    = v['id'];
                var image = v['image'];
                var link  = v['link'];
                let error = v['error'];
                if ( error ) {
                    search_result.html('<li style="text-align:center;">Pas de résultat </li>');
                }else {
                    const result_item = `<li class='d-flex align-items-center'>
                                            <a href="${link}" class="d-flex align-items-center">
                                                <div class="image-cont mr-4">
                                                    <img src="${image}" />
                                                </div>
                                                <div class="text-cont">
                                                    <p>${title}</p>
                                                </div>
                                            </a>
                                        </li>`;
                    
                    search_result.append(result_item);
                }
            });
        },
    });
}

/***********************************************
6: home header search Logic
/***********************************************/
$("body .home_search").bind("keyup", function(e) {
    const search_query = $(this).val();
    const search_wrapper = $(this).parent("#search-input-cont").siblings(".home_search_results");
    
    if( search_query ) {
        var count = search_query.length;
        if ( count > 1 ) {
          search_wrapper.show();
          caestus_search(search_query);
      }
      return false;
  }
});

$("body .home_search").bind("blur", function(e) {
    $(this).val('');
    const search_wrapper = $(this).parent("#search-input-cont").siblings(".home_search_results");
    $(".search-input-container").hide(200);
    search_wrapper.hide(200);
});

/***********************************************
7: Make order
/***********************************************/
$('body .make_order').click(function(e){

    e.preventDefault();

    var order_form      = $('body #checkoutForm');
    var name            = order_form.find('#first_name').val();
    var project_name    = order_form.find("#project_name").val();
    var phone           = order_form.find("#phone").val();
    var email           = order_form.find("#Email").val();
    var firstDate       = order_form.find("#firstDate").val();
    var secondDate      = order_form.find("#secondDate").val();
    var restDays        = order_form.find("#restDays").val();
    var notes           = order_form.find("#notes").val();
    console.log(notes);
        
    var formData     = new FormData();
  
    formData.append('name',         name);
    formData.append('project_name', project_name);
    formData.append('phone',        phone);
    formData.append('email',        email);
    formData.append('firstDate',    firstDate);
    formData.append('secondDate',   secondDate);
    formData.append('restDays',     restDays);
    formData.append('notes',        notes);
    formData.append('action',       'make_order');  
      
    $.ajax({
        url: varjs.caestus_ajax_url,
        type: 'POST',
        processData: false,
        contentType: false, 
        data: formData,
        cache:false,
        dataType: "JSON",
        success: function(data) {
           window.location.href = "";
        }
     });
});

/***********************************************
8: order logic
/***********************************************/
function order(){
  
  var order_form = $('body #checkoutForm');
  var name = order_form.find('#first_name').val();
  
  
}

/***********************************************
9: Count orders
/***********************************************/
function count(){
    var formData     = new FormData();
    formData.append('action', 'count_orders');  
        
    $.ajax({
        url: varjs.caestus_ajax_url,
        type: 'POST',
        processData: false,
        contentType: false, 
        data: formData,
        cache:false,
        dataType: "JSON",
        success : function(data){
            $("a#cart span#products-in-cart").html(data.data);
        }
    });
}
    count();
});