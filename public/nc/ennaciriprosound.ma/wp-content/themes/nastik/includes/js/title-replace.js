function inittitlereplace () {
jQuery('title').text(function(index,text){
return text.replace('&#8211;','-');
});
jQuery('title').text(function(index,text){
return text.replace('&#039;',"'");
});
}