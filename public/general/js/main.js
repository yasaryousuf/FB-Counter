jQuery(function ($) {
	"use strict";
    jQuery(document).ready(function(){

        

        // $('#email').on('blur', function(){
        //     $('.email-span').text("");
        //     $('#reg-submit').prop('disabled', false);
        //     var email = $('#email').val();
        //     if (email == '') {
        //         return;
        //     }
        //         $.ajax({
        //                 url: "/validateEmail",
        //                 type: "POST",
        //                 datatype: "html",
        //                 data: {
        //                     email: email,
        //                     _token: $('[name="_token"]').val(),
        //                 },
        //             })
        //             .done(function (result) {
        //                 if (result == 'email_found' ) 
        //                 {
        //                     $('.email-span').text("Email address already taken.");
        //                     $('#reg-submit').prop('disabled', true);
        //                 }
        //                 else if (result == 'invalid_email') 
        //                 {
        //                     $('.email-span').text("Invalid email address!");
        //                     $('#reg-submit').prop('disabled', true);
        //                 }     
        //             });
        //     });

            $("#reg-submit").click(function(e) {
                    e.preventDefault(); 
                    $.ajax({
                        url: "/registration",
                        type: "POST",
                        datatype: "html",
                        data: $("#reg-form").serialize(),
                        error: function( json )
                    {
                        console.log(json);
                    }

                    })
                    .done(function (data) {
                        console.log(data.status);
                        if (data.status != false) {
                            window.location = "/order-form";
                        }

                        else{
                            $('.email-span').text(data.msg);
                        }


                        
                    }).fail(function(result){
                        var data = $.parseJSON(result.responseText);
                        console.log(result.responseText);
                        var error = data.errors;
                        $('.help-block strong').text("");
                        for(var i in error){
                            console.log(i);
                            $('.error-'+i).text(error[i][0]);
                        }
                       // $('.email-span').text(data.errors);
                    })
                    ;
                });
   
        
            $("#login-submit").click(function(e) {
                e.preventDefault();
                $.ajax({
                    url: "/signin",
                    type: "POST",
                    datatype: "html",
                    data: {
                            _token: $('[name="_token"]').val(),
                            email: $("#login-email").val(),
                            password: $("#login-password").val(),
                        },
                })
                .done(function (data) {
                    // var data = jQuery.parseJSON(result);
                    console.log(data.status);
                    if (data.status==true) {
                        window.location = "/my-account"; 
                    } else {
                        $("#error-message").html(data.message).show(); 
                        $('#error-message').delay(1000).fadeOut('slow');
                    }
                })


            });   

    $("#cradite").click( function(){
        if( $(this).is(':checked') ){
            $('.card-position ').addClass('active');
            $('#paypal').prop( 'checked', false );
        }else{
            $('.card-position ').removeClass('active');
        }
    });

    $("#paypal").click( function(){
        if( $(this).is(':checked') ){
            $('.card-position ').removeClass('active');
            $('#cradite').prop( 'checked', false );
        }
    });
    

    $('.faq-collapse .panel-title a').on('click', function(){
        $(this).toggleClass('active');
    });

    $(".search-icon").click(function(){
        $(".search-btn").toggle("slow");
    });
    
    $(".menu-stick").sticky({topSpacing:0});
    

    //owl-carousel
    $('.testimonal-item-carouse-active').owlCarousel({
            items: 1,
            loop: true,
            nav:true,
            navText: ["<i class='fa fa-angle-left'></i>","<i class='fa fa-angle-right'></i>"],
            dots: false,
            autoplay:true,
            autoplayTimeout:5000,
            autoplayHoverPause:true,
            smartSpeed: 2500
        });//owl-carousel end

    
    $('a.page-scroll').bind('click', function(event) {
        var $anchor = $(this);
        $('html, body').stop().animate({
            scrollTop: $($anchor.attr('href')).offset().top
        }, 1500, 'easeInOutExpo');
        event.preventDefault();
    });

    new WOW().init();			

     



  });// document end tag

}(jQuery));	