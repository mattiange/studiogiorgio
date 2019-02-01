/******************************************
 * JQuery photogallery
 * ---------------------------
 * Fotogallery basata su jQuery.
 * Funzionalità:
 *      - Slideshow automatico
 *      - Pulsanti next e prev
 *      - Thumbnail
 * 
 * @author  Mattia Leonardo Angelillo
 * @copy    Mattia Leonardo Angelillo (C)
 * @package photogallery.jquery
 * @version 0.0.1
 * @date    30/5/2018
 * @license GNU GPL v3
 * 
 * @param {jQuery} $
 * @returns {void} Photogallery
******************************************/
(function ($){
    $.fn.photogallery = function (options){
        var settings = $.extend({
            /**
             * Avvia autoplay slideshow: 
             * 
             * true|false
             */
            autoplay : true
        }, options||{});
        
        /**
         * Plugin
         */
        this.each(function (){
            //ELEMENTI
            var _this    = this;
            var images   = $('.images', _this);
            var image    = $('img', images);
            var thumb    = $('.thumb', _this);
            var n_images = nImages(image);
            
            //OPZIONI
            var autoplay_ = settings.autoplay;
            
            //Visualizzo il primo elemento
            showFirstElement(images, image);
            
            //Aggiungo la thumbnail
            addThumbnail(thumb, n_images, image);
            
            //Autoplay slideshow
            if(autoplay_ === true){
                slide(image, thumb);
            }
            
            //Immagine successiva
            $(".next").click(function (){
                next(images, thumb);
            });
            //Immagine precedente
            $(".prev").click(function (){
                prev(images, thumb);
            });
            //Cambio immagine cliccando sulla thumbnail
            $('div', thumb).click(function (){
                var item = $(this).attr('data-item');
                
                $('div', thumb).removeClass('selected');
                $(this).addClass('selected');
                
                showItem(parseInt(item), image);
            });
            
            //Resize window
            $(window).resize(function (){
                //Centro la thumbnail
                center(thumb.parent(), thumb);
            });
        });
        
        return this;
    };
    
    /**
     * Visualizza l'immagine dato
     * 
     * @param {int} i Posizione dell'elemento
     * @param {objectHtmlImageObject} image
     * @returns {undefined}
     */
    function showItem(i, image){
        $(image).fadeOut(500);
        image.each(function (k, el){
            if(k===i){
                $(el).fadeIn(800);
            }
        });
    }
    
    /**
     * Immagine precedente
     * 
     * @param {Object} father Contenitore
     * @returns {void}
     */
    function prev(father, thumb){
        var this_pos = $("[data-show='true']", father).attr("data-item"),
            prev = parseInt(this_pos)-1;
        
        $('div', thumb).removeClass('selected');
        
        $("[data-item='"+this_pos+"']", father).fadeOut(500).attr("data-show", "false");
        if(prev < 0){
            prev = nImages($("img", father))-1;
        }
        
        $('[data-item="'+prev+'"]', thumb).addClass('selected');
        
        $("[data-item='"+prev+"']", father).fadeIn(800).attr("data-show", "true");
    }
    
    /**
     * Immagine successiva
     * 
     * @param {Object} father Contenitore
     * @returns {void}
     */
    function next(father, thumb){
        var this_pos = $("[data-show='true']", father).attr("data-item"),
            next = parseInt(this_pos)+1;
        
        $('div', thumb).removeClass('selected');
        
        $("[data-item='"+this_pos+"']", father).fadeOut(500).attr("data-show", "false");
        if(next === nImages($("img", father))){
            next = 0;
        }
        
        $('[data-item="'+next+'"]', thumb).addClass('selected');
        
        $("[data-item='"+next+"']").fadeIn(800).attr("data-show", "true");
    }
    
    /**
     * Slideshow automatico delle immagini
     * 
     * @param {object HtmlObject} el   Immagini da ciclare
     * @param {object HtmlObject} thumb Contenitore delle thumbnail
     * @returns
     */
    function slide(el, thumb){
        var i = 0;//Puntatore dell'immagine da nascondere/visualizzare
        var parent_width = $(el[i]).parent().width();
        var image_width = $(el[0]).width();
         
        $(el[i]).css({
            'margin-left' : ((parent_width-image_width)/2)
        });
        
        //Ciclo infinito
        setInterval(function (){
            $('div', thumb).removeClass('selected');
            $(el[i]).fadeOut(500).attr('data-show', 'false');
            
            i ++;
            
            if((i) === nImages(el)){
                i = 0;
            }
            
            $('[data-item="'+i+'"]').addClass('selected');
            
            image_width = $(el[i]).width();
            
            $(el[i]).css({
                'margin-left' : ((parent_width-image_width)/2)
            });
            
            $(el[i]).fadeIn(800).attr('data-show', 'true');
            
            $(window).resize(function (){
                parent_width = $(el[i]).parent().width();
                image_width  = $(el[i]).width();
                
                $(el[i]).css({
                    'margin-left' : ((parent_width-image_width)/2)
                });
            });
        }, 5000/*Tempo di attesa per la prossima esecuzione*/);
    }
    
    /**
     * Aggiunge le thumbnail
     * 
     * @param {object Object} thumb Elemento contenitore delle thumbnail
     * @param {int} n Numero di thumbnail da aggiungere
     * @param {object Object} obj Oggetto contenente le immagini
     * @returns {void}  Non ritorna nulla
     */
    function addThumbnail(thumb, n, obj){
        for(var i=0;i<n;i ++){
            var el = '<div class="tp-bullet ';
            if(parseInt(getSelected(obj))===i){
                el += " selected ";
            }
            el += '" data-item="'+i+'"></div>';
            
            thumb.append(el);
        }
        //Centro la thumbnail
        center(thumb.parent(), thumb);
    }
    
    /**
     * Centra un elemento rispetto al contenitore
     * 
     * @param {type} f  Contenitore padre
     * @param {type} el Elemento da centrare rispetto al contenitore padre
     * @returns {void}
     */
    function center(f, el){
        var f_width = f.width(),
            el_width = el.width();
        
        el.css({
            left : (f_width-el_width)/2
        });
    }
    
    /**
     * Restiuisce l'immagine attualmente visualizzata
     * 
     * @param {type} obj Contenito contenente le immagini
     * @returns {int}   Numero dell'immagine attualmente visualizzata
     */
    function getSelected(obj){
        var this_item;
        obj.each(function (i, el){
            if($(el).attr('data-show')==="true"){
                this_item = $(el).attr('data-item');
            }
        });
        
        return this_item;
    }
    
    /**
     * Visualizza solo il primo elemento
     * 
     * @param {type} container
     * @param {type} i
     * @returns {undefined}
     */
    function showFirstElement(container, i){
        var item_start = getFirstElement(container);
        
        i.hide();//Nascondo tutte le immagini
        i.each(function(i, el){
            //Visualizzo la prima immagine
            if(i===parseInt(item_start)){
                $(el).show().attr("data-show", "true");
            }
        });
    }
    
    /**
     * Restituisce la prima immagine da visualizzare
     * 
     * @param {type} container
     * @returns {unresolved}
     */
    function getFirstElement(container){
        return container.attr('data-start');;
    }
    
    /**
     * Numero di immagini dello slidershow
     * 
     * @param {type} i
     * @returns {Number}
     */
    function nImages(i){
        return (i.length);
    }
})(jQuery);