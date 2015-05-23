window.onscroll = function() {
        if (window.pageYOffset >= 200){
            jQuery('.share-bar').css({position: 'fixed'});
            $("#sb-search").addClass("logo");

        }
        else {
            jQuery('.share-bar').css({position: '', right: '', top: ''});
          $( "#sb-search" ).removeClass( "logo" )
        }
    }