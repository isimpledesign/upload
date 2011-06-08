/* Author: 
Samuel East
*/

$(".vote").click(function() 
{

$('.vmessagetest').hide();

var id = $(this).attr("title");
var ud = $(this).attr("id");
var name = $(this).attr("name");

if(name=='up')
{

$.post("http://localhost/votetest/up", { "id": id, "ud": ud },
 function(data){
   if(data.voted){
$(".vmessage-"+data.post_id).fadeIn().html(data.voted); 
 } 
   $("#"+data.ud).text(data.id);
 }, "json");

  
}
else
{


$.post("http://localhost/votetest/down", { "id": id, "ud": ud },
 function(data){
 
 if(data.voted){
$(".vmessage-"+data.post_id).fadeIn().html(data.voted); 
 }
  
    $("#"+data.ud).text(data.id);
 }, "json");



}
  
  
   
 

return false;
	});