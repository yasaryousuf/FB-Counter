jQuery(function ($) {

	"use strict";

    jQuery(document).ready(function(){

 
        function readURL(input, imageselecter) {

            
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                
                reader.onload = function (e) {
                    $(imageselecter).attr('src', e.target.result);
                }
                
                reader.readAsDataURL(input.files[0]);
            }
        }
    
    

        $("#ad-img-upload").change(function(){
            console.log(this.files);
            readURL(this, '#uploaded-image');
        });

        $("#logo_upload").change(function(){
            console.log(this.files);
            readURL(this, '#uploaded-logo');
        });

        $("#profile_upload").change(function(){
            console.log(this.files);
            readURL(this, '#profile-uploaded-img');
        });


        setTimeout(function() {
            $(".alert").remove();
        }, 4000);
        


        $('#addPaage').click(function (event) {
            console.log("YES");
            $('#page_form')[0].reset();
            $("#page_form").trigger('reset');
            $("#uploaded-logo").attr("src", "/image/default1.jpg");
            $("#uploaded-image").attr("src", "/image/default2.jpg");
            // $('#select_page_name option:contains("Please select one option")').prop('disabled', false);
            $('#select_page_name').val('0');
            $('#select_page_name').prop('disabled', false);
            $('#adpage_id').val('');
        });


        $('.editButton').click(function (event) {
            var adpageid = $(this).data("adpageid");
            console.log(adpageid);
            $.ajax({
                    url: "/my-account/ad-page/getPageInfo",
                    type: "POST",
                    datatype: "html",
                    data: {
                        adpageid: adpageid,
                        _token: $('[name="_token"]').val(),
                    },
                })
                .done(function (adpage) {
                    // $('#page_name').val(adpage.page_name);
                    // $('#page_id').val(adpage.page_id);
                    // $('#select_page_name').val(adpage.page_id);
                    $('#adpage_id').val(adpage.adpage_id);
                    $("#uploaded-logo").attr("src",  adpage.banner_one);
                    $("#uploaded-image").attr("src",  adpage.banner_two);
                    $('#select_page_name option[value='+adpage.page_id+']').attr('selected','selected');
                    $('#select_page_name').prop('disabled', 'disabled');
                    // $("#theSelect option:selected").attr('disabled', 'disabled');
                    // $('#mySelect option').not(':selected');
                    // $('select#select_page_name option:not(:selected)').prop('disabled', 'disabled');
                    // $('#select_page_name').attr('readonly', true);
                });
        });


        $(".drop li a")
        .on('click', function (e) {
            e.stopPropagation();
        });

        $('.profile-image-uploaded').on('click', function(){
            $('#profile_upload').trigger('click');
        });

        $('.img-editor, .img-edit').on('click', function(){
            $('#logo_upload').trigger('click');
        });

        $('.img-editor2, .img-edit2').on('click', function(){
            $('#ad-img-upload').trigger('click');
        });

        $('[data-toggle="tooltip"]').tooltip({
            animated: 'fade',
            placement: 'bottom',
            html: true
        }); 
        
    $(".search-icon").click(function(){
            $(".search-btn").toggle("slow");
        });
        
    $(".popup-input").focusin(function(){
    	$(".popup-position").addClass('active');
    });
    $(".popup-input").focusout(function(){
    	$(".popup-position").removeClass('active');
    });

    $('.cancel-alert').on('click', function(){
          swal({   
          title: "Are you sure?",   
          text: "Your subscription will be cancelled!",
           type: "warning",   
           showCancelButton: true,   
           confirmButtonColor: "#DD6B55",   
           confirmButtonText: "Yes, delete it!",   
           closeOnConfirm: false 
         }, function(){   
            swal({
                title: "Deleted!",
                text: "Your subscription is cancelled.",
                type: "warning",
                //timer: 3000
            }, 
            function(){
              window.location.href = "/my-account/subscription/cancel";
            })
      });
   });

    $('.active-alert').on('click', function(){
          swal({   
          title: "Are you sure?",   
          text: "Your subscription will be resumed!",
           type: "warning",   
           showCancelButton: true,   
           confirmButtonColor: "#DD6B55",   
           confirmButtonText: "Yes, resume it!",   
           closeOnConfirm: false 
         }, function(){   
            swal({
                title: "Success!",
                text: "Your subscription is resumed.",
                type: "success",
                //timer: 3000
            }, 
            function(){
              window.location.href = "/my-account/subscription/resume";
            })
      });
   });


            
        });
    
    // window load function start here
    jQuery(window).load(function(){

        
    });// end document


}(jQuery));	


function setCookie(cname, cvalue, exdays) {
    var d = new Date();
    d.setTime(d.getTime() + (exdays*24*60*60*1000));
    var expires = "expires="+ d.toUTCString();
    document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}


function getCookie(cname) {
    var name = cname + "=";
    var decodedCookie = decodeURIComponent(document.cookie);
    var ca = decodedCookie.split(';');
    for(var i = 0; i <ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' ') {
            c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
            return c.substring(name.length, c.length);
        }
    }
    return "";
}
