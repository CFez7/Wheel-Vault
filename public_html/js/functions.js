// js function to control the toggle up/down of the login/register box.
$(document).ready(function(){
  $('#login-trigger').click(function(){
    $(this).next('#login-content').slideToggle();
    $(this).toggleClass('active');          
    
    if ($(this).hasClass('active')) $(this).find('span').html('&#x25B2;')
      else $(this).find('span').html('&#x25BC;')
    })
});

/////////////////////////////////////////////
    
$( "#canceledit" ).click(function() {
  $( "#editting" ).fadeToggle( "slow" );
  $( "#noedit" ).delay( 700 ).fadeToggle( "slow" );
});

$( "#startedit" ).click(function() {
  $( "#editting" ).delay( 700 ).fadeToggle( "slow" );
  $( "#noedit" ).fadeToggle( "slow" );
});

/////////////////////////////////////////////



////////////////////////////////////////////

$( document ).ready(function() {

    $( ".thumbnail" ).click(function() {
        removeSelectedClass();
        $(this).toggleClass( "selectedthumb" );
        var imageName = $(this).attr('src');
        console.log(imageName);
        $('#mainimage').attr('src', imageName);

    });

    function removeSelectedClass() {
        $('.thumbnail').removeClass("selectedthumb");   
    }

}); 

////////////////////////////////////////////

$( "#deleteAccountBttn" ).click(function() {
  $( "#deleteAccount" ).fadeToggle( "slow" );
});

$( "#cancelDelete" ).click(function() {
  $( "#deleteAccount" ).fadeToggle( "slow" );
});

////////////////////////////////////////////

$( "#deletePostBttn" ).click(function() {
  $( "#deletepost" ).fadeToggle( "slow" );
});

$( "#cancelPostDelete" ).click(function() {
  $( "#deletepost" ).fadeToggle( "slow" );
});

////////////////////////////////////////////