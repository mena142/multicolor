// JavaScript Document
$(document).ready(function(){
    var currentURL = window.location.pathname.toLowerCase();
    
    
    
    //HIDE LOAD BUTTON IF IDEAS ARE LESS THAN 9
    if($(".container .post").length>=9){$("#load").show();}
    
    //JUMP MENU FUNCTIONS
        $("#jump-button").click(function(event){
            event.preventDefault();
        });
     $("#jump .up, #jump .down").on("click",function(event){event.preventDefault(); return false;});
    
    $("#jump .down").on("mousedown",function(e){
     e.preventDefault();
       scroller = setInterval(function(){ window.scrollBy(0,25);},100);
        return false;
    });

    $("#jump .up").on("mousedown",function(e){
     e.preventDefault();
       scroller = setInterval(function(){ window.scrollBy(0,-25);},100);
        return false;
    });
    
    $("#jump .up, #jump .down").on("mouseup",function(event){event.preventDefault(); clearInterval(scroller); return false;});
    
    $("#jump .up, #jump .down").on("mouseleave",function(e){e.preventDefault(); clearInterval(scroller); return false;});
    
    var scroller;
    
    $("#menu a").each(function(){
        itemURL = $(this).get(0).pathname+"/";
        if(itemURL == currentURL){$(this).addClass("active");}
    });
    
    $(".arel .content h3,.arel .post-type").css({lineHeight:$(".arel .content h3").height()+"px"})
    $(".hh-post .post-type").css({lineHeight:$(".hh-post .post-type").height()+"px"})
    
    
    
    
	$("#menuBtn").click(function(event){
		event.preventDefault();
	
	$("#menu").slideToggle(300);
	$(".mobile-menu").toggleClass('active');
	
		});
    
    $("#commentform textarea").focusin(function(){$(this).html(""); $("#commentform #author").val("Nombre o Apodo"); $("#commentform #email").val("Correo Electronico");$("#commentform input").show(250);$("#submit").show(250);});
    
    $("#commentform #author, #commentform #email").focusin(function(){$(this).val("");});
		
scrolling = false;
    
    /*
	if($(window).width()<=550){$('.tagline').delay(2500).fadeOut(400);
	$(window).delay(2500).scroll(function(){
		if(!scrolling){$('.tagline').fadeIn(400).delay(2500).fadeOut(400, function(){scrolling=false;});scrolling = true;}
		});}
    */
    
            var count = 5;
					
            //$(window).scroll(function(){if($(window).scrollTop() == $(document).height() - $(window).height()){}}); 
			
			$("#load").click(function(){
                $(this).addClass("loading");
                loadArticle(count);
                       count++;});
 
            function loadArticle(pageNumber){ 
					$.ajax({
                        url: "/wp-admin/admin-ajax.php",
                        type:'POST',
                        data: "action=infinite_scroll&page_no="+ pageNumber + '&loop_file=loop&category='+cat_id, 
                        success: function(html){
							$('#load').removeClass("loading");
                            if($(html).find(".post").length <3){$("#load").addClass("disabled");}
                            $("#extra").append(html);   // This will be the div where our content will be loaded
							;
                        }
                    });
                return false;
            }
});
function subFocus(){
	var field = document.getElementById("email"); 
	field.value = ""; field.style.color = "#000";
}

