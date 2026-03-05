function vw_cloud_kitchen_open_tab(evt, cityName) {
    var vw_cloud_kitchen_i, vw_cloud_kitchen_tabcontent, vw_cloud_kitchen_tablinks;
    vw_cloud_kitchen_tabcontent = document.getElementsByClassName("tabcontent");
    for (vw_cloud_kitchen_i = 0; vw_cloud_kitchen_i < vw_cloud_kitchen_tabcontent.length; vw_cloud_kitchen_i++) {
        vw_cloud_kitchen_tabcontent[vw_cloud_kitchen_i].style.display = "none";
    }
    vw_cloud_kitchen_tablinks = document.getElementsByClassName("tablinks");
    for (vw_cloud_kitchen_i = 0; vw_cloud_kitchen_i < vw_cloud_kitchen_tablinks.length; vw_cloud_kitchen_i++) {
        vw_cloud_kitchen_tablinks[vw_cloud_kitchen_i].className = vw_cloud_kitchen_tablinks[vw_cloud_kitchen_i].className.replace(" active", "");
    }
    document.getElementById(cityName).style.display = "block";
    evt.currentTarget.className += " active";
}

jQuery(document).ready(function () {
    jQuery( ".tab-sec .tablinks" ).first().addClass( "active" );
});