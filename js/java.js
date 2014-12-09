
/*
$(document).ready(function () {
    
   
  

    $(document).on("click", ".row", function (e) {
        $(this).fadeOut("slow");
    });
    $(".button").click(function () {
        var col = vettore[Math.floor((Math.random() * vettore.length))];
		var zoz = vett[Math.floor((Math.random() * vett.length))];
        var $append = $(".result");
		col=$(window).height();
		zoz=$(window).width();
        $append.after("<div class='row'><div class='room'>"+col+"</div><div class='hours'>"+zoz+"</div></div>");
		
    });
    $(document).on("mouseenter", ".row", function (e) {
        $(this).animate({borderSpacing: -360}, {
            step: function (now, fx) {
                $(this).css('-webkit-transform', 'rotate(' + now + 'deg)');
                $(this).css('-moz-transform', 'rotate(' + now + 'deg)');
                $(this).css('transform', 'rotate(' + now + 'deg)');
            },
            duration: 1000
        }, 'linear');
    });
  
});*/
 $(document).ready(function() {
  //Slider
 var mq= window.matchMedia( "(min-width: 601px)" );
  if(mq.matches){
	   $( ".style-select" ).remove();

  }else{
       $( "#slid" ).remove();
	   $(".list").replaceWith("<div class='list'> <ul> <li>Povo</li><li>Mesiano</li> <li>Sociologia</li> </ul>"+
	                        "<ul> <li>Giurisprudenza</li> <li>Psicologia</li> <li>CIBIO</li> </ul></div>");
      
  }
    $( "ui-slider-range ui-widget-header ui-corner-all" ).css('background', 'rgb(0,255,0)');
    $( "#slider-range" ).slider({
      range: true,
      min: 9,
      max: 19,
      values: [ 9, 19 ],
      slide: function( event, ui ) {
        $( "#amount" ).html(  ui.values[ 0 ] + " h - " + ui.values[ 1 ]+" h" );
      }
    });
    $( "#amount" ).html($( "#slider-range" ).slider( "values", 0 )+" h" +
      " - " + $( "#slider-range" ).slider( "values", 1 )+" h" );
  //--------	  
	 $(".list li a").on("click", function(e){  
 e.preventDefault();  
 var hrefval = $(this).attr("href");  
   
 if(hrefval == "#about") {  
  var distance = $('.menu').css('width');  
    
 if(distance == "0px") {   
   openSidepage();  
  } else { 
   closeSidepage();  
 }  
  }
 }); 
  });

function lol(){
   /* var col = vettore[Math.floor((Math.random() * vettore.length))];
	var zoz = vett[Math.floor((Math.random() * vett.length))];
	document.getElementById("az").innerHTML+="<div class='row'><div class='room'>"+col+"</div><div class='hours'>"+zoz+"</div></div>";*/
}




 
 function openSidepage() {  
	$('.menu1').animate({  
		width: '100%'  
		}, 400, 'easeOutBack');   
}  
  
function closeSidepage(){  
 //$("#navigation li a").removeClass("open");  
	$('.menu1').animate({  
	width: '0px'  
	}, 400, 'easeOutQuint');   
}  


















