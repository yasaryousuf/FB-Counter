jQuery(function ($) {
	"use strict";

    jQuery(document).ready(function(){

        setTimeout(function(){
            $('.alert').slideUp(2000); 
        }, 3000);

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

        // $('#editButton').click(function(event) {
        //     var adPage_id = $(this).data("adPageId");
        //     console.log(adPage_id);
        //     $.ajax({
        //         url: '/my-account/ad-page/getPageInfo',
        //         type: 'POST',
        //         data: {_token: '<?php echo csrf_token() ?>'},
        //     })
        //     .done(function() {
        //         console.log("success");
        //     });
            
        // });


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

   //  $('.cancel-alert').on('click', function(){
   //     swal({
   //      title: "Are you sure?",
   //      text: "You will not be able to recover this imaginary file!",
   //      type: "warning",
   //      showCancelButton: true,
   //      confirmButtonColor: "#DD6B55",
   //      confirmButtonText: "Yes, delete it!",
   //      closeOnConfirm: false
   //  }, function () {
   //      swal("Deleted!", "Your imaginary file has been deleted.", "success");
   //  });
   // });

    $('.tutorial-delete').on('click', function(){
        var href = $(this).attr('href');

        swal({
            title: "Are you sure?",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Yes, delete it!",
            cancelButtonText: "No, cancel plx!",
            closeOnConfirm: true,
            closeOnCancel: true
        },
            function (isConfirm) {
                if (isConfirm) {
                    window.location.href = href;
                }
            });

        return false;
   });

   //  $('.active-alert').on('click', function(){
   //     swal({
   //      title: "Are you sure?",
   //      text: "You will not be able to recover this imaginary file!",
   //      type: "warning",
   //      showCancelButton: true,
   //      confirmButtonColor: "#CF053A",
   //      confirmButtonText: "Yes, delete it!",
   //      closeOnConfirm: false
   //  }, function () {
   //      swal("Deleted!", "Your imaginary file has been deleted.", "success");
   //  });
   // });
            
     
 //    $('.tbl-action-delete').on('click', function(){
 //     swal({
 //        title: "Are you sure?",
 //        text: "You will not be able to recover this imaginary file!",
 //        type: "warning",
 //        showCancelButton: true,
 //        confirmButtonColor: "#CF053A",
 //        confirmButtonText: "Yes, delete it!",
 //        closeOnConfirm: false
 //    }, function () {
 //        swal("Deleted!", "Your imaginary file has been deleted.", "success");
 //    });
 // });   




        });
    
    // window load function start here
    jQuery(window).load(function(){

        
    });// end document


}(jQuery));	