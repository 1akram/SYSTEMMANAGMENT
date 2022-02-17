 
$(document).ready( _ => {

    
    //  password input icon 
    $('.js-eye-icon').hover(function () {
        $(this).addClass('fa-eye color-third');
        $( this).parent().prev().attr('type','text');
        $(this).removeClass('fa-eye-slash'); 
    }, function () {
        $(this).addClass('fa-eye-slash');
        $( this).parent().prev().attr('type','password');
        $(this).removeClass('fa-eye color-third cursor-pointer');
    });
    // end  password input icon 
    // file input 
     
    $("input[type='file']").change(function() {
      
        filename = this.files[0].name;
    
        $($(this).attr('data-target')).text(filename);
         
      });
    // end file input 
     // alert close 
    $(".js-alert-click").click(event =>{
        
        $($(event.target)).closest('div[data-alert="alert-holder"]').remove();
    })
    // end alert close 
    
   
     

    // sidbar menu active 
    $('.js-menu-btn').click(event =>{
        console.log('dd');
        $('.sidebar').toggleClass('active');
        $(event.target).toggleClass('active');
    });
    // end sidbar menu active 




 
});

