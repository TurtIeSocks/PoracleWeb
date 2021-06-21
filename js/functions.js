
function areas(type) {
   var distance = "distance_".concat(type);
   var label = "distance_label_".concat(type);
   var value = document.querySelector('input[id="use_areas_' + type + '"]:checked').value;
   if(value == "areas"){
      document.getElementById(distance).style.display = "none";
      document.getElementById(label).style.display = "none";
      document.getElementById(distance).value = 0;
   } else {
      document.getElementById(distance).style.display = "block";
      document.getElementById(label).style.display = "block";
   }
}

function areas_add() { 
   var value = document.querySelector('input[name="use_areas"]:checked').value;
   if(value == "areas"){
      document.getElementById('distance').style.display = "none";
      document.getElementById('distance_label').style.display = "none";
      document.getElementById('distance').value = 0;
   } else {
      document.getElementById('distance').style.display = "block";
      document.getElementById('distance_label').style.display = "block";
   }
}

function setnoiv(type) { 
   var min_iv = "min_iv_".concat(type);
   if(document.getElementById("noiv_".concat(type)).checked){ 
      document.getElementById(min_iv).disabled = true;
      document.getElementById(min_iv).value = "";
   } else { 
      document.getElementById(min_iv).disabled = false;
   }
}

function setpvp(type) { 
   var value = document.querySelector('input[id="league_' + type + '"]:checked').value;
   var divblock = "league_".concat(value).concat("_").concat(type); 
   var divgreat = "league_great_".concat(type); 
   var divultra = "league_ultra_".concat(type); 

   document.getElementById("great_league_ranking_".concat(type)).value = "";
   document.getElementById("ultra_league_ranking_".concat(type)).value = "";
   document.getElementById("great_league_ranking_min_cp_".concat(type)).value = "";
   document.getElementById("ultra_league_ranking_min_cp_".concat(type)).value = "";

   if(value == "none"){
      document.getElementById(divgreat).style.display = "none";
      document.getElementById(divultra).style.display = "none";
   } else {
      document.getElementById(divgreat).style.display = "none";
      document.getElementById(divultra).style.display = "none";
      document.getElementById(divblock).style.display = "block";
   }
}


$(document).ready(function() {
    $("input[type='checkbox']").change(function() {
        var maxAllowed = 100;
        var cnt = $("input[type='checkbox']:checked").length;
        if (cnt > maxAllowed) {
            $(this).prop("checked", "");
            alert('Sorry, you cannot select more than ' + maxAllowed + ' Pokemons at a time!');
        }
    });
});

$(document).ready(function() {
    $(window).keydown(function(event) {
        if (event.keyCode == 13) {
            event.preventDefault();
            return false;
        }
    });
});

$(function() {
    $("#mon_0").click(function() {
        if ($(this).is(":checked")) {
            $("#dvSearchBox").hide();
            $("#dvMonsList").hide();
            $("#dvAlertTypeAll").hide();
        } else {
            $("#dvSearchBox").show();
            $("#dvMonsList").show();
            $("#dvAlertTypeAll").show();
        }
    });
});

