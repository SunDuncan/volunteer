$(function(){
          $("#nav span").each(function(){
          	   $(this).hover(function(){
                     $(this).css({
                         "background-color":"#c1282d",
                         "color":"#ffffff"
                     });

          	   },function(){
                      $(this).css({
                         "background-color":"#ffffff",
                         "color":"#000000"

                     });
          	   })
          })

	});