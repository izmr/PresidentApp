// variable //
var serverUrl = "";

var template = 
    "<tr>" +
    "<td>" +
    "<img style='width:100px;' src='${imageUrl}' alt=''>" +
    "</td>" +
    "<td>${name}<td>" +
    "<td>${point}<td>" +
    "</tr>";

var data = [{name: 'name', point: 100, imageUrl: 'img/1.jpeg'}, {name: 'name', point: 100, imageUrl: 'img/1.jpeg'}];

var previousObject = false;
var selectId = 0;
var sdColor = '#94144F';
var ckColor = 'red';

// main //

$(function(){
//  table data add
  dataAdd();

//  table click aciton
  $("#box tr").click(function(){
    selectId = $("#box tr").index(this);
    if(previousObject){
      $(previousObject).css("background-color", sdColor);
    }
    previousObject = this;
    console.log(selectId);
    
    $(this).css("background-color", ckColor);
  });
  
//  var t = text.replace("%{name}", "name");
//  t = t.replace("%{point}", 100);
//  $("div#main table").append(t);
  
//  $.ajax({
//    type: 'GET',
//    url: url,
//    dataType: 'json', 
//    success: function(res){
//      
//    },
//  });
  
//  $.get(url, function(res){
//    for(var i in res){
//      $("div#main ul").append(res[i]);
//    }
//  });
});

// funciton //

// data add
function dataAdd() {
  $.template('template', template);
  var a = $.tmpl(template, data).appendTo('div#main table');
}

// click action
function clickForm() {
  location.href = 'add.php?princess_id=' + selectId;
}

