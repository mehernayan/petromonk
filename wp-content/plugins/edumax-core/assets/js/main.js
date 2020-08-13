/*global $:false
  _____ _
 |_   _| |__   ___ _ __ ___   ___ _   _ _ __ ___
   | | | '_ \ / _ \ '_ ` _ \ / _ \ | | | '_ ` _ \
   | | | | | |  __/ | | | | |  __/ |_| | | | | | |
   |_| |_| |_|\___|_| |_| |_|\___|\__,_|_| |_| |_|

*  --------------------------------------
*         Table of Content
*  --------------------------------------
*  01. Edumax Course Tab
*  02. Edumax Search On Change
*  --------------------------------------
*  -------------------------------------- */
jQuery(document).ready(function($){
	'use strict';

    var dir = $("html").attr("dir");
    var rtl = false;
    if (dir == 'rtl') {
        rtl = true;
    }

    /*
     * 01. Edumax Course Tab
     */

    $('.edumax-course-custom-tab').each(function () {
        var $that = $(this);
        $(this).find('button').on('click', function () {
            $that.find('button').removeClass('active');
            $(this).addClass('active');
            $that.find("[data-tab-content]").hide();
            $that.find('[data-tab-content="'+ $(this).data('tab-toggle') +'"]').fadeIn(400);
        });
    });

    $('.edumax-login-tab-toggle').on('click', function (e) {
        e.preventDefault();
        var $tab_item = $(this).attr('href');
        $("[data-edumax-login-tab]").hide(0);
        $("[data-edumax-login-tab='"+ $tab_item.replace('#', '') +"']").fadeIn();
    });

    $('.edumax-modal-overlay, .edumax-login-modal-close').on('click',function () {
        $(".edumax-signin-modal-popup").fadeOut();
    });

    $(document).keyup(function(e) {
        if (e.keyCode === 27) {
            $(".edumax-signin-modal-popup").fadeOut();
        }
    });

    $('.login-popup').on('click', function (e) {
        e.preventDefault();
        $(".edumax-signin-modal-popup").fadeToggle();
    });


    /* --------------------------------------------
    ---------- 02 Edumax Search On Change --------
    ----------------------------------------------- */
    $('.edumax-ajax-search').on('keyup', function (e) {
    
        var $that = $(this);
        $that.addClass('search-active');
        var raw_data = $that.val(), // Item Container
            ajaxUrl = $that.data('url')
            
        $.ajax({
                url: ajaxUrl,
                type: 'POST',
                data: {
                    raw_data: raw_data
                },
                beforeSend: function () {
                    if (!$that.parent().find('.fa-spinner').length) {
                        $('<i class="fa fa-spinner fa-spin"></i>').appendTo($that.parent()).fadeIn(100);
                    }
                },
                complete: function () {
                    $that.parent().find('.fa-spinner ').remove();
                }
            })
            .done(function (data) {
                if (e.type == 'blur') {
                    $that.parent().find('.edumax-course-search-results').html('');
                } else {
                    $that.parent().find('.edumax-course-search-results').html(data);
                }
            })
            .fail(function () {
                console.log("error");
            });

    });

    var $header_search = $(".header-search-wrap .edumax-ajax-search");	
    $(window).on("click", function(event){	
        if($(this).length){
            if ( $header_search.has(event.target).length == 0 && !$header_search.is(event.target) ){
                $('.header-search-wrap .edumax-course-search-results').hide();
            }else {
                $('.header-search-wrap .edumax-course-search-results').show();
            }
        }
    });

    var $banner_search = $(".wppb-addon .edumax-ajax-search");	
    $(window).on("click", function(event){	
        if($(this).length){
            if ( $banner_search.has(event.target).length == 0 && !$banner_search.is(event.target) ){
                $('.wppb-addon .edumax-course-search-results').hide();
            }else {
                $('.wppb-addon .edumax-course-search-results').show();
            }
        }
    });
    //End Search.


});


