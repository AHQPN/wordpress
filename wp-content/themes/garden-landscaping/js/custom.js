jQuery(document).ready(function () {
	window.garden_landscaping_currentfocus=null;
  	garden_landscaping_checkfocusdElement();
	var garden_landscaping_body = document.querySelector('body');
	garden_landscaping_body.addEventListener('keyup', garden_landscaping_check_tab_press);
	var garden_landscaping_gotoHome = false;
	var garden_landscaping_gotoClose = false;
	window.garden_landscaping_responsiveMenu=false;
 	function garden_landscaping_checkfocusdElement(){
	 	if(window.garden_landscaping_currentfocus=document.activeElement.className){
		 	window.garden_landscaping_currentfocus=document.activeElement.className;
	 	}
 	}
 	function garden_landscaping_check_tab_press(e) {
		"use strict";
		// pick passed event or global event object if passed one is empty
		e = e || event;
		var activeElement;

		if(window.innerWidth < 999){
		if (e.keyCode == 9) {
			if(window.garden_landscaping_responsiveMenu){
			if (!e.shiftKey) {
				if(garden_landscaping_gotoHome) {
					jQuery( ".main-menu ul:first li:first a:first-child" ).focus();
				}
			}
			if (jQuery("a.closebtn.mobile-menu").is(":focus")) {
				garden_landscaping_gotoHome = true;
			} else {
				garden_landscaping_gotoHome = false;
			}

		}else{

			if(window.garden_landscaping_currentfocus=="responsivetoggle"){
				jQuery( "" ).focus();
			}
			}
		}
		}
		if (e.shiftKey && e.keyCode == 9) {
		if(window.innerWidth < 999){
			if(window.garden_landscaping_currentfocus=="header-search"){
				jQuery(".responsivetoggle").focus();
			}else{
				if(window.garden_landscaping_responsiveMenu){
				if(garden_landscaping_gotoClose){
					jQuery("a.closebtn.mobile-menu").focus();
				}
				if (jQuery( ".main-menu ul:first li:first a:first-child" ).is(":focus")) {
					garden_landscaping_gotoClose = true;
				} else {
					garden_landscaping_gotoClose = false;
				}
			
			}else{

			if(window.garden_landscaping_responsiveMenu){
			}
			}

			}
		}
		}
	 	garden_landscaping_checkfocusdElement();
	}
});

jQuery(document).ready(function () {
	jQuery( ".tablinks" ).first().addClass( "active" );
});

function garden_landscaping_project_tab(evt, cityName) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  jQuery('#'+ cityName).show()
  evt.currentTarget.className += " active";
}

jQuery(document).ready(function () {
	jQuery('.tabcontent').hide();
	jQuery('.tabcontent:first').show();
});