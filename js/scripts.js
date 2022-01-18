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