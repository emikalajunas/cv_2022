//------------------------------------jQuery START-------------------------*/
 $(document ).ready(function(){              

/*------------------ Loader start -----------------*/
var div_box = "<div id='load-screen'><div id='loading'></div></div>";
     
$("body").prepend(div_box);
$('#load-screen').delay(1400).fadeOut(700, function(){
$(this).remove();
});  
/*------------------ Loader end -----------------*/     
});
//------------------------------------jQuery END-------------------------*/



//------------------------------------Custom js START-------------------------*/
/*------------- Login page language changer start ----*/
function changeLanguage(){
           document.getElementById('language_form').submit();
}
/*------------- Login page language changer end ------*/

/*------------------ Accordion start -----------------*/
var acc = document.getElementsByClassName("accordion");
var i;

for (i = 0; i < acc.length; i++) {
  acc[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var panel = this.nextElementSibling;
    if (panel.style.display === "block") {
      panel.style.display = "none";
    } else {
      panel.style.display = "block";
    }
  });
}
/*------------------ Accordion end ------------------*/
//------------------------------------Custom js END-------------------------*/
















