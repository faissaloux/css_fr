$.extend($.fn.datepicker.defaults, {language: 'fr'});

$(document).ready(function () {
    $.fn.datepicker.defaults.language = 'fr';

});


document.addEventListener(
    "DOMContentLoaded", () => {
        new Mmenu( "#my-menu", {
            "extensions": [
               "pagedim-black",
               "shadow-page",
            ]
        });
    }
);


function checkAndGetChars() {
    var searchQuery = $('#searchInput').val();
    if (searchQuery) {
        var count = searchQuery.length;
        if (count > 2) {
            $('#ajaxSearch').show();
            $('.no-reuslt').html('');
            $('.search-result ul').html('');
            return searchFunction(searchQuery);
        }
        return false;
    }
}


function searchFunction(searchQuery) {

    var formdata = new FormData();
    formdata.append('search', searchQuery);

    jQuery.ajax({
        url: '/searchAjax',
        type: 'post',
        contentType: false,
        processData: false,
        dataType: 'html',
        data: formdata,
        beforeSend: function () {
            $(".loadingcopong").show();
        },
        success: function (response) {
            var returnedData = JSON.parse(response);
            $.each(returnedData, function (k, v) {
                if (k == 'error') {
                    $('.no-reuslt').show();
                    $('.search-result .no-reuslt').html('No resultat');
                    return $(".loadingcopong").hide();
                } else {
                    $('.no-reuslt').hide();
                    if (v['name'] == 'RED HELIUM 8K S35' || v['name'] == 'RED GEMINI 5K S35') {
                        $('.search-result ul').append('<li data-open="/cameras/' + v['id'] + '" class="searchclick" ><img src="' + v['image'] + '" class="searchImg"/><a href="/cameras/' + v['id'] + '">' + v['name'] + '</a></li>');
                    } else {
                        $('.search-result ul').append('<li data-open="/product/' + v['id'] + '" class="searchclick" ><img src="' + v['image'] + '" class="searchImg"/><a href="/product/' + v['id'] + '">' + v['name'] + '</a></li>');
                    }
                }
            });
            return $(".loadingcopong").hide();
        },
        error: function (response) {
            alert('Error , Please Try Again');
        }
    });
    return false;
}


$("#lightgallery").lightGallery({download: false,});


$("#underlightgallery").lightGallery({download: false,});


$('.lkslkls').slick({
    arrows: true,
    fade: true,
});


$(".tppgkg").slick({
    dots: false,
    infinite: true,
    slidesToShow: 1,
    slidesToScroll: 1,
});


$(".regular").slick({
    dots: false,
    infinite: true,
    slidesToShow: 8,
    slidesToScroll: 2,
    responsive: [
        {
            slidesToShow: 2,
            slidesToScroll: 2,
        }
    ]
});


$(document).on('keyup', 'input[name=shoting_days]', function () {
    var _this = $(this);
    var min = parseInt(_this.attr('min')) || 1;
    var max = parseInt(_this.attr('max')) || 100;
    var val = parseInt(_this.val()) || (min - 1);
    if (val < min)
        _this.val(min);
    if (val > max)
        _this.val(max);
});


var date = new Date();
date.setDate(date.getDate());
var today = new Date(date.getFullYear(), date.getMonth(), date.getDate());

$('body #firstDate').datepicker({
    format: "yyyy-mm-dd",
    startDate: date,
    todayHighlight: true,
    startDate: today,
}).on('changeDate', function (ev) {
    var start = $("#firstDate").val();
    var startD = new Date(start);
    var end = $("#secondDate").val();
    var endD = new Date(end);
    var diff = parseInt((endD.getTime() - startD.getTime()) / (24 * 3600 * 1000));
    $("#restDays").val(diff);
});


$('body #secondDate').datepicker({
    format: "yyyy-mm-dd",
    startDate: date,
    todayHighlight: true,
    startDate: today,
}).on('changeDate', function (ev) {
    var start = $("#firstDate").val();
    var startD = new Date(start);
    var end = $("#secondDate").val();
    var endD = new Date(end);
    var diff = parseInt((endD.getTime() - startD.getTime()) / (24 * 3600 * 1000));
    $("#restDays").val(diff);
});


$('body .datePicker').datepicker({
    language: 'fr',
    showButtonPanel: true,
});
$('.carousel').carousel();

(function () {

    $("#cart").on("click", function () {
        $(".shopping-cart").fadeToggle("fast");
    });

})();


var btn = $('#button');

$(window).scroll(function () {
    if ($(window).scrollTop() > 300) {
        btn.addClass('show');
    } else {
        btn.removeClass('show');
    }
});

btn.on('click', function (e) {
    e.preventDefault();
    $('html, body').animate({scrollTop: 0}, '300');
});


$('.section-pack  .card').click(function () {
    window.location.href = "/pack/product/1";
});


$(document).mouseup(function (e) {
    var container = $("#ajaxSearch");

    // if the target of the click isn't the container nor a descendant of the container
    if (!container.is(e.target) && container.has(e.target).length === 0) {
        container.hide();
        $('#searchInput').val('');
    }


    var container2 = $(".mlsqfkkfmkmlklm");

    // if the target of the click isn't the container nor a descendant of the container
    if (!container2.is(e.target) && container2.has(e.target).length === 0) {
        container2.hide();
        $('.searchStuf').hide();
        $('.searchStuf').val('');
    }


});


$(document).on('click', '.searchStuf', function (event) {
    $(this).show();
});


$(document).on('submit', '#addtocartForm', function (event) {
    event.preventDefault();
});

$('body #addToCartBtn').click(function () {
    $('#CartproductID').val();
    $('#CartproductName').val();
    $('#CartproductImage').val();

    var ajaxUrl = '/ajax1/';

    var productname = $(this).data('name');
    var productID = $(this).data('id');
    var productImage = $(this).data('image');
    var category = $(this).data('category');
    var formData = new FormData();

    formData.append('name', productname);
    formData.append('id', productID);
    formData.append('image', productImage);
    formData.append('category', category);

    $.ajax({
        url: ajaxUrl,
        type: 'POST',
        processData: false, // important
        contentType: false, // important
        data: formData,
        cache: false,
        dataType: "JSON",
        beforeSend: function (data) {

        },
        success: function (data) {
            // close the modal
            $('#myModal').modal('hide');
            window.location.href = "";

        },
        error: function (data) {
            $('.loading').hide();
            $('#addtocart').modal('hide');
            alert('an error! please try again');
        }
    });


});

$("body").on("click", ".searchclick", function () {
    window.location.href = $(this).data('open');
});

// $('body .quantityPicker').change(function () {
//     var qu = $(this).val();
//     var id = $(this).data('cartitem');
//     saveQuantity(id, qu);
//     return false;
// });

function saveQuantity(CartItem, quantity) {

    var formdata = new FormData();
    formdata.append('cartItem', CartItem);
    formdata.append('Quantity', quantity);

    jQuery.ajax({
        url: '/ajax2/',
        type: 'post',
        contentType: false,
        processData: false,
        dataType: 'html',
        data: formdata,
        beforeSend: function () {

        },
        success: function (response) {

        },
        error: function (response) {
            alert('Error , Please Try Again');
        }
    });

}


$('body .ssfsqzgzagez').click(function () {
    $(".searchStuf").animate({
        height: "toggle",
        opacity: "toggle"
    }, "slow");
});


$(".searchStuf").bind("keyup", function (e) {

    checkAndGetChars2();
})

function checkAndGetChars2() {
    var searchQuery = $('.searchStuf').val();
    if (searchQuery) {
        var count = searchQuery.length;
        if (count > 1) {
            $('.mlsqfkkfmkmlklm').show();
            $('.no-reuslt').html('');
            $('.search-For-Top-Header ul').html('');
            return searchFunction2(searchQuery);
        }
        return false;
    }
}

function searchFunction2(searchQuery) {
    var formdata = new FormData();
    formdata.append('search', searchQuery);

    jQuery.ajax({
        url: '/searchAjax',
        type: 'post',
        contentType: false,
        processData: false,
        dataType: 'html',
        data: formdata,
        beforeSend: function () {
            $(".search-For-Top-Header ul").append('<li>loading ... </li>');
        },
        success: function (response) {
            $(".search-For-Top-Header ul").html('');
            var returnedData = JSON.parse(response);
            $.each(returnedData, function (k, v) {
                if (k == 'error') {
                    $('.search-For-Top-Header ul').html('<li style="text-align:center;">Pas de résultat </li>');
                } else {


                    if (v['name'] == 'RED HELIUM 8K S35' || v['name'] == 'RED GEMINI 5K S35') {
                        $('.search-For-Top-Header ul').append('<li data-open="/cameras/' + v['id'] + '" class="searchclick" ><img src="' + v['image'] + '" class="searchImg"/><a href="/cameras/' + v['id'] + '">' + v['name'] + '</a></li>');
                    } else {
                        $('.search-For-Top-Header ul').append('<li data-open="/product/' + v['id'] + '" class="searchclick" ><img src="' + v['image'] + '" class="searchImg"/><a href="/product/' + v['id'] + '">' + v['name'] + '</a></li>');
                    }


                }
            });

        },
        error: function (response) {
            alert('Error , Please Try Again');
        }
    });
    return false;
}


$('body span.lkqlqlkjsq').on('click', function () {
    $('span.lkqlqlkjsq').hide();
    $('body .slicknav_menu').hide();
    $('body .searjhcj').hide();
    $('#menudydydymenu').slicknav('toggle');
});

$('body #menuphoneopen').click(function () {
    $('body .lkqlqlkjsq').addClass('active');
    $('body .slicknav_menu').show();

    $('body .searjhcj').show();
    $('body .lkqlqlkjsq').show();
    $('body .slicknav_menu').addClass('active');
    $('#menudydydymenu').slicknav('toggle');
});

$('#menudydydymenu').slicknav();


/***************************** Search Header Phone ********************/
$(".HeaderPhoneSearch").bind("keyup", function (e) {
    $('.searchPhoneHeaderResutls').show();
    $('.overflowSearchPHoneHeader').show();
    $('.searchPhoneHeaderResutls').html('');
    HeaderPhoneSearchFunctionCheckQuery();
});

function HeaderPhoneSearchFunctionCheckQuery() {
    var searchQuery = $('.HeaderPhoneSearch').val();
    if (searchQuery) {
        var count = searchQuery.length;
        if (count > 1) {
            return HeaderPhoneSearchFunction(searchQuery);
        }
        return false;
    }
}

$('.overflowSearchPHoneHeader').click(function () {
    $(this).hide();
    $('.searchPhoneHeaderResutls').hide();
});

function HeaderPhoneSearchFunction(searchQuery) {
    var formdata = new FormData();
    formdata.append('search', searchQuery);
    jQuery.ajax({
        url: '/searchAjax',
        type: 'post',
        contentType: false,
        processData: false,
        dataType: 'html',
        data: formdata,
        beforeSend: function () {
            $(".searchPhoneHeaderResutls").append('<li>loading ... </li>');
        },
        success: function (response) {
            $(".searchPhoneHeaderResutls").html('');
            var returnedData = JSON.parse(response);
            $.each(returnedData, function (k, v) {
                if (k == 'error') {
                    $('.searchPhoneHeaderResutls').html('<li style="text-align:center;">Pas de résultat </li>');
                } else {
                    if (v['name'] == 'RED HELIUM 8K S35' || v['name'] == 'RED GEMINI 5K S35') {
                        $('.searchPhoneHeaderResutls').append('<li data-open="/cameras/' + v['id'] + '" class="list-group-item searchclick" ><img src="' + v['image'] + '" class="searchImg"/><a href="/cameras/' + v['id'] + '">' + v['name'] + '</a></li>');
                    } else {
                        $('.searchPhoneHeaderResutls').append('<li data-open="/product/' + v['id'] + '" class="list-group-item searchclick" ><img src="' + v['image'] + '" class="searchImg"/><a href="/product/' + v['id'] + '">' + v['name'] + '</a></li>');
                    }
                }
            });
        },
        error: function (response) {
            alert('Error , Please Try Again');
        }
    });
    return false;
}


/***************************** Search Sidbar Phone ********************/


$(".sidbarPhoneSearch").bind("keyup", function (e) {

    SidbarPhoneSearchFunctionCheckQuery();
});

function SidbarPhoneSearchFunctionCheckQuery() {
    var searchQuery = $('.sidbarPhoneSearch').val();
    if (searchQuery) {
        var count = searchQuery.length;
        if (count > 1) {
            $('.searchPhoneSidbarResutls').show();
            $('.searchPhoneSidbarResutls').html('');
            return SidbarPhoneSearchFunction(searchQuery);
        } else {
            $('.searchPhoneSidbarResutls').hide();
            $('.searchPhoneSidbarResutls').html('');
        }
        return false;
    }
}

$('.overflowSearchPHoneHeader').click(function () {
    $(this).hide();
    $('.searchPhoneSidbarResutls').hide();
});

function SidbarPhoneSearchFunction(searchQuery) {
    var formdata = new FormData();
    formdata.append('search', searchQuery);
    jQuery.ajax({
        url: '/searchAjax',
        type: 'post',
        contentType: false,
        processData: false,
        dataType: 'html',
        data: formdata,
        beforeSend: function () {
            $(".searchPhoneSidbarResutls").append('<li>loading ... </li>');
        },
        success: function (response) {
            $(".searchPhoneSidbarResutls").html('');
            var returnedData = JSON.parse(response);
            $.each(returnedData, function (k, v) {
                if (k == 'error') {
                    $('.searchPhoneSidbarResutls').html('<li style="text-align:center;">Pas de résultat </li>');
                } else {


                    if (v['name'] == 'RED HELIUM 8K S35' || v['name'] == 'RED GEMINI 5K S35') {
                        $('.searchPhoneSidbarResutls').append('<li data-open="/cameras/' + v['id'] + '" class="list-group-item searchclick" ><img src="' + v['image'] + '" class="searchImg"/><a href="/cameras/' + v['id'] + '">' + v['name'] + '</a></li>');
                    } else {
                        $('.searchPhoneSidbarResutls').append('<li data-open="/product/' + v['id'] + '" class="list-group-item searchclick" ><img src="' + v['image'] + '" class="searchImg"/><a href="/product/' + v['id'] + '">' + v['name'] + '</a></li>');
                    }

                }
            });
        },
        error: function (response) {
            alert('Error , Please Try Again');
        }
    });
    return false;
}


// $( document ).ready(function() {
//     var isMobile = false; //initiate as false
// // device detection
// if(/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|ipad|iris|kindle|Android|Silk|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i.test(navigator.userAgent)
//     || /1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i.test(navigator.userAgent.substr(0,4))) {
//     isMobile = true;

//         $('.under_cover').hide();
//         // var title = '';
//         // $(title).insertAfter('body .coverHeaderWrapper');


//         var title = '<div class="coverHeaderWrapperTitlePhone">'+$('.under_cover').text()+'</div>';
//         $(title).insertAfter('body .coverHeaderWrapper');


//     } else {

//         // Setting height in big screen Resolution
//         var coverHeight = $('body .coverHeaderWrapper').height();
//         var titleHeight = $('.under_cover').height();
//         var headerTitle = ( coverHeight/2 ) - ( titleHeight /2 );
//         $('h1.under_cover').attr('style','position:relative;top:-'+headerTitle+'px !important;');


//         $(window).on('resize', function(){
//             // Setting height in big screen Resolution
//             var coverHeight = $('body .coverHeaderWrapper').height();
//             var titleHeight = $('.under_cover').height();
//             var headerTitle = ( coverHeight/2 ) - ( titleHeight /2 );
//             $('h1.under_cover').attr('style','position:relative;top:-'+headerTitle+'px !important;');
//         });


// }
// });

$('#ajaxSearch').css('width', $('#searchInput').closest('.rounded').width());

$(document).ready(function(){
    if($( window ).width() > 800){
        $(".owl-carousel").owlCarousel({
            margin      : 60,
            loop        : true,
            items       : 6
        });
    }else{
        $(".owl-carousel").owlCarousel({
            loop        : true,
            center      : true,
            nav         : true,
            items       : 1
        });
    }
});

$( ".owl-prev").html('<i class="fa fa-chevron-left"></i>');
$( ".owl-next").html('<i class="fa fa-chevron-right"></i>');


/****** Nav ******/



/* Please ❤ this if you like it! */


(function($) { "use strict";

	$(function() {
		var header = $(".start-style");
		$(window).scroll(function() {    
			var scroll = $(window).scrollTop();
		
			if (scroll >= 10) {
				header.removeClass('start-style').addClass("scroll-on");
			} else {
				header.removeClass("scroll-on").addClass('start-style');
			}
		});
	});		
		
	//Animation
	
	$(document).ready(function() {
		$('body.hero-anime').removeClass('hero-anime');
	});

	//Menu On Hover
		
	$('body').on('mouseenter mouseleave','.nav-item',function(e){
			if ($(window).width() > 750) {
				var _d=$(e.target).closest('.nav-item');_d.addClass('show');
				setTimeout(function(){
				_d[_d.is(':hover')?'addClass':'removeClass']('show');
				},1);
			}
	});	
	
	//Switch light/dark
	
	$("#switch").on('click', function () {
		if ($("body").hasClass("dark")) {
			$("body").removeClass("dark");
			$("#switch").removeClass("switched");
		}
		else {
			$("body").addClass("dark");
			$("#switch").addClass("switched");
		}
	});  
	
  })(jQuery); 


  $("#search").focus(()=>{
      $(".minisearch .field.search .control").addClass("input-focused");
      $(".flashing-cursor").hide();
  })

  $("#search").focusout(()=>{
    if($("#search").val().length == 0){
        $(".minisearch .field.search .control").removeClass("input-focused");
        $(".flashing-cursor").show();
    }
  })

  $(".down-search").click(()=>{
    $(".ox-slideout-top").slideDown(300);
    $(".animated-text--masked:after").css("background-color", "red");
    $("body").css("overflow", "hidden");
  })

  $(".ox-overlay-close-btn").click(()=>{
    $(".ox-slideout-top").slideUp(300);
    $("body").css("overflow", "scroll");
  })


    

    if($(window).width() > 780){
        $("div.dropdown-menu-child").css('display', 'none');

        $("a.dropdown-item").hover(function(){
            $(this).next('div').show(300);
        });

        $("a.dropdown-item").mouseout(function(){
            $(this).next('div').hide(600);
        });

        $(".dropdown-menu").hover(function(){
            $(this).show(300);
        });
    };

    $(".ksksks").hover(function(){
        $(".ksksks span").css('background-color', 'transparent');
        if($(this).siblings("ul.nav").css('opacity') == 1){
            $(this).children("span").css('background-color', 'rgb(187, 12, 27)');
        }else{
            $(this).children("span").css('background-color', 'transparent');
        };
    })

    $("ul.nav").mouseleave(function(){
        if(!$(this).parent(".nav-item").hasClass('show')){
            $(".ksksks span").css('background-color', 'transparent');
        };
    })

    $("nav.nav").mouseleave(function(){
        if(!$(this).parent(".nav-item").hasClass('show')){
            $(".ksksks span").css('background-color', 'transparent');
        };
    })

    $(()=>{
        if($.trim($(".suggestions div:nth-child(2)").text()).length == 0){
            $(".suggestions").attr('style','display:none !important');
        }
    })
    
    $("#show-search-desktop").click(()=>{
        $(".search-input-container").show();
        $(".search-input-container input").focus();
    })

    $('p:empty').remove();