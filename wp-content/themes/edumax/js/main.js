/*global $:false
  _____ _                                         
 |_   _| |__   ___ _ __ ___   ___ _   _ _ __ ___  
   | | | '_ \ / _ \ '_ ` _ \ / _ \ | | | '_ ` _ \ 
   | | | | | |  __/ | | | | |  __/ |_| | | | | | |
   |_| |_| |_|\___|_| |_| |_|\___|\__,_|_| |_| |_|

*  --------------------------------------
*         Table of Content
*  --------------------------------------
*  1. Sticky Nav
*  5. Social Share
*  3. Ajax login register
*  4. Coming Soon Page
*  5. Nice select
*  6. Course Archive Search Filter
*  -------------------------------------- 
*  -------------------------------------- */

jQuery(document).ready(function($){
    'use strict';


    /* --------------------------------------
    *       1. Sticky Nav
    *  -------------------------------------- */
    jQuery(window).on('scroll', function(){'use strict';

        if($(window).width() > 767){
            if ( jQuery(window).scrollTop() > jQuery('#masthead').height() + jQuery('#wpadminbar').height() ) {
                jQuery('#masthead.fixed_header').addClass('sticky');
                jQuery('#page').css('padding-top', jQuery('#masthead').outerHeight());
            } else {
                jQuery('#masthead.fixed_header').removeClass('sticky');
                jQuery('#page').css('padding-top', 0);
            }
        }

    });

    /* --------------------------------------
    *       2. Social Share
    *  -------------------------------------- */
    $('.social-share-wrap a').prettySocial();


    /* --------------------------------------
    *      3. ajax login register
    *  -------------------------------------- */

    $('form#login').on('submit', function(e){
        'use strict';
        e.preventDefault();

        $('form#login p.status').show().text(ajax_object.loadingmessage);

        $.ajax({
            type: 'POST',
            dataType: 'json',
            url: ajax_object.ajaxurl,
            data: {
                'action': 'ajaxlogin', //calls wp_ajax_nopriv_ajaxlogin
                'username': $('form#login #username2').val(),
                'password': $('form#login #password2').val(),
                'rememberme': $('form#login #rememberme').val(),
                'security': $('form#login #security2').val() },
            success: function(data){
                if (data.loggedin == true){
                    $('form#login p.status').removeClass('text-danger').addClass('text-success');
                    $('form#login p.status').text(data.message);
                    document.location.href = ajax_object.redirecturl;
                }else{
                    $('form#login p.status').removeClass('text-success').addClass('text-danger');
                    $('form#login p.status').text(data.message);
                }
                if($('form#login p.status').text() == ''){
                    $('form#login p.status').hide();
                }else{
                    $('form#login p.status').show();
                }
            }
        });
    });

    if($('form#login .login-error').text() == ''){
        $('form#login  p.status').hide();
    }else{
        $('form#login  p.status').show();
    }

    // Register New User
    $('.register_button').click(function(e){
        e.preventDefault();
        var form_data = $(this).closest('form').serialize()+'&action=ajaxregister';
        $.ajax({
            type: 'POST',
            dataType: 'json',
            url: ajax_object.ajaxurl,
            data: form_data,
            success: function(data){
                //var jdata = json.parse(data);
                $('#registerform  p.status').show();
                if (data.loggedin){
                    $('#registerform  p.status').removeClass('text-danger').addClass('text-success');
                    $('#registerform  p.status').text(data.message);
                    $('#registerform')[0].reset();
                }else{
                    $('#registerform  p.status').removeClass('text-success').addClass('text-danger');
                    $('#registerform  p.status').text(data.message);
                }

            }
        });
    });
    if($('form#registerform  p.status').text() == ''){
        $('form#registerform  p.status').hide();
    }else{
        $('form#registerform  p.status').show();
    }


    /* --------------------------------------
    *       4. Coming Soon Page
    *  -------------------------------------- */
   if (typeof loopcounter !== 'undefined') {
    loopcounter('counter-class');
    }


    /* --------------------------------------
    *       5. Nice select
    *  -------------------------------------- */

    $(document).ready(function() {
        $('select').niceSelect();
    });


    /* --------------------------------------
    *       6. Course Archive Search Filter
    *  -------------------------------------- */
    $('.header-cat-menu ul.children').closest('li.cat-item').addClass('category-has-childern');

    $(".edumax-archive-single-cat .category-toggle").on('click', function () {
        $(this).next('.edumax-archive-childern').slideToggle();
        if($(this).hasClass('fa-plus')){
            $(this).removeClass('fa-plus').addClass('fa-minus');
        }else{
            $(this).removeClass('fa-minus').addClass('fa-plus');
        }
    });


    $('.edumax-archive-childern input').each(function () {
        if($(this).is(':checked')){
            var aChild =  $(this).closest('.edumax-archive-childern');
            aChild.show();
            aChild.siblings('.fas').removeClass('fa-plus').addClass('fa-minus');
        }
    });

    $('.edumax-sidebar-filter input').on('change', function () {
        $('.edumax-sidebar-filter').submit();
    });

    $(document).on('change', '.edumax-course-filter-form', function(e){
        e.preventDefault();
        $(this).closest('form').submit();
    });

    $('.edumax-pagination ul li a.prev, .edumax-pagination ul li a.next').closest('li').addClass('pagination-parent');


});


