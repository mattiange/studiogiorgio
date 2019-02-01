/**
 * Gestione Photogallery.
 * I dati vengono caricati con il caricamento della pagina.
 * 
 * ----------- AGGIUDSTARE ---------------
 * • cambio posizione con nuova immagine
 * 
 * @type type
 */
jQuery(document).ready(function ($){
    var slideshow  = $("#slideshow");//ID Slideshow
    var b_aggiungi = $(".ico-aggiungi", slideshow);//Pulsante aggiungi
    
    //Trovo il massimo
    var max = max_value(slideshow);
    
    /**
     * Visualizza la nuova immagine da inserire nello slideshow.
     * 
     * @type $
     */
    b_aggiungi.click(function (){
        var n_elements = ($(".row.item", slideshow).length);//Numero di immagini
        var new_el = $(".copy", slideshow).clone(true);//Nuoo elemento immagine da aggiungere
        
        max         = max_value(slideshow);
        var max_id  = parseInt(data_id(slideshow))+1;
        
        ///Inserisco l'immagine e aggiungo tutti gli attributi necessari
        new_el.insertAfter('#slideshow .add').removeClass('copy').show();
        $("input[type='number']", new_el)
            .attr('value', n_elements)
            .attr('max', parseInt(max)+1)
            .attr('data-old_value', n_elements)
            .attr('data-position', parseInt(n_elements)-1)
            .attr('data-id', max_id);
        // $("input[type='hidden']", new_el).attr('value', max_id);
        
        $("#slideshow input[type='number']").attr('max', parseInt(max)+1);
    });
    
    $('.row.item [type="number"]', slideshow).change(function (){
        var this_val = $(this).val();
        var old_val = $(this).attr('data-old_value');
        var position = $(this).attr('data-position');
        
        $(this).attr('data-old_value', this_val);
        
        $('.row.item [type="number"]', slideshow).each(function (i, el){
            if((this_val == $(el).val()) && (position != i)){
                $("[data-position="+i+"]").val(old_val).attr('value', old_val).attr('old_value', old_val);
            }
        });
        
        $(this).val(this_val);
    });
    
    /**
     * 
     * @returns {Number}
     */
    function max_value(slideshow){
        var max = 0;
        
        $('.row.item [type="number"]', slideshow).each(function (i, el){
            if(max<$(el).val()){
                max = $(el).val();
            }
        });
        
        return max;
    }
    
    /**
     * Trovo l'id più alto
     * 
     * @param {type} slideshow
     * @returns {window.$|$}
     */
    function data_id(slideshow){
        var max_id = 0;
        
        $('.row.item [type="number"]', slideshow).each(function (i, el){
            if(max_id < $(el).attr('data-id') && $(el).attr('data-id') != 'undefined'){
                max_id = $(el).attr('data-id');
            }
        });
        
        return max_id;
    }
});