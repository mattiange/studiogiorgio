(function ($){
    $.fn.counterWords = function (options){
        var settings = $.extend({
        }, options||{});
        
        var _this      = $(this);
        
        _this.each(function (i, el){
            var thisLength = $(el).val().length;
            var maxLength  = $(el).attr("data-max-length");
            var thisText   =  stripHTML($(el).val());
            var text       = "";
            
            if(thisLength>maxLength){
                maxLength -= 3;
                //alert("["+i+"]" + thisLength+">"+maxLength);
                for(var k=0;k<= maxLength;k ++){
                    //alert(k+"<="+maxLength);
                    text += thisText[k];
                }
                text += "...";
                
                $(el).parent().html($.trim(text));
            }
        });
        
        return this;
    };
    
    function stripHTML(text){
        var regex = /(<([^>]+)>)/ig;
        
        return text.replace(regex, "");
     }
})(jQuery);