$(document).ready(function(){
    $(document).bind("contextmenu", function(e) {
        return false;
    });
});
$(document).bind('selectstart',function() {return false;});
$(document).bind('dragstart',function(){return false;});