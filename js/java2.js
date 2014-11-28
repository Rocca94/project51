
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
	 $(".list li a").on("click", function(e){  
			 e.preventDefault();  
			 var hrefval = $(this).attr("href");  
			   
			 if(hrefval == "#about") {   
			$(".location").html($(this).html());
		
			   closeSidepage();  
		  
			  }
	 }); 
	/* 	 $(".list li").on("click", function(e){  
		 	 e.preventDefault();  
			 var distance = $('.menu1').css('width');  
			$(".location").html($(this).html());
			 if(distance == "0px") {   
			   openSidepage();  
			  } else { 
			   closeSidepage();  
			 }  
			  
			
	 }); */
	  $(".home").on("click", function(e){  
			 e.preventDefault();
			 openSidepage();  
		 
			
	 }); 
  });

function lol(){
   /* var col = vettore[Math.floor((Math.random() * vettore.length))];
	var zoz = vett[Math.floor((Math.random() * vett.length))];
	document.getElementById("az").innerHTML+="<div class='row'><div class='room'>"+col+"</div><div class='hours'>"+zoz+"</div></div>";*/
}




 
 function openSidepage() {  
	//Desktop version
	 var col=$(".mob").css('display');
	 if(col=="none"){
				$('.menu1').animate({  
			width: '20%'  
			}, 400, 'easeOutBack'); 
			$('.menu2').animate({  
				right: '1%'    
			}, 400, 'easeOutBack'); 
	 		}else{//Mobile version
					$('.menu1').animate({  
			width: '100%'  
			}, 400, 'easeOutBack'); 
			
		}
 }
  
function closeSidepage(){  
	//Desktop version 
	var col=$(".mob").css('display');
	
	 if(col=="none"){
		 
		$('.menu1').animate({  
		width: '0px'  
		}, 400, 'easeOutQuint');   
		$('.menu2').animate({  
		right: '11%'  
		}, 400, 'easeOutQuint');
	 
	 }else{//Mobile version
		 	$('.menu1').animate({  
				width: '0px'  
				}, 400, 'easeOutQuint');  
	 }
	
	
	


}  


















