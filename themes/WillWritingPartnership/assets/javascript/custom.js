$(document).ready(function(){
    $(".nav-button a").click(function(){
        $(".nav-overlay").fadeToggle(200);
        $(this).toggleClass('nav-btn-open').toggleClass('nav-btn-close');
    });
});
$('.nav-overlay').on('click', function(){
    $(".nav-overlay").fadeToggle(200);
    $(".nav-button a").toggleClass('nav-btn-open').toggleClass('nav-btn-close');
    open = false;
});

$(document).ready(function(){
    $('input[name="twpYesNo"]').on('change', function() {
        if($(this).val() == true){

            $('input[name="firmName"]').val('TheWillWritingPartnership');
            $('input[name="address-line1"]').val('Cool Street');
            $('input[name="city"]').val('Bolton');
            $('input[name="postal-code"]').val('BLT 9W9');
            $('input[name="homeNum"]').val('BLT 9W9');
        }
        else
        {
            $('input[name="firmName"]').val('');
            $('input[name="address-line1"]').val('');
            $('input[name="city"]').val('');
            $('input[name="postal-code"]').val('');
            $('input[name="homeNum"]').val('');
        }
        console.log('val changed');
    });
});