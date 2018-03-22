(function($) {

    $('#categoryfilter').focus().keyup(function(event){
        var e = $(this);
        var val = e.val();
        if (event.keyCode == 13) {
            
        }
        if(val == ''){
            $('#filter li').show();
            $('#filter span').removeClass('highlighted');
            return true;
        }
        var regexp = '\\b(.*)';
        for(i in val){
            regexp += '('+val[i]+')(.*)';
        }
        regexp += '\\b';

        $('#filter a span').each(function(){
            var span = $(this);
            var string = '';
            resultat = span.text().match(new RegExp(regexp, 'i'));
            if (resultat) {
                for(i in resultat){
                        if (i%2 !=0 && i>0) {
                            string+=resultat[i];
                        }else if(i>0){
                            string+='<span class="highlighted">'+resultat[i]+'</span>';
                        }
                    }
                    span.parent().parent(string);
                } else{
                    string = span.text();
                    span.parent().parent().hide();
            }
            span.html(string);
        });

    });

})(jQuery);


/*$(obj).sortable({
    axis: "y", // Le sortable ne s'applique que sur l'axe vertical
    containment: ".shoppingList", // Le drag ne peut sortir de l'élément qui contient la liste
    handle: ".item", // Le drag ne peut se faire que sur l'élément .item (le texte)
    distance: 10, // Le drag ne commence qu'à partir de 10px de distance de l'élément
    // Évènement appelé lorsque l'élément est relâché
    stop: function(event, ui){
        // Pour chaque item de liste
        $(obj).find("li").each(function(){
            // On actualise sa position
            index = parseInt($(this).index()+1);
            // On la met à jour dans la page
            $(this).find(".count").text(index);
        });
    },
    update: function()
    {
        // On prépare la variable contenant les paramètres
        var order = $(this).sortable("serialize")+'&action=updateListeOrder';
        // $(this).sortable("serialize") sera le paramètre "element", un tableau contenant les différents "id"
        // action sera le paramètre qui permet éventuellement par la suite de gérer d'autres scripts de mise à jour
 
        // Ensuite on appelle notre page updateListe.php en lui passant en paramètre la variable order
        $.post("/updateListe.php", order, function(theResponse)
        {
            // On affiche dans l'élément portant la classe "reponse" le résultat du script de mise à jour
            $(".reponse").html(theResponse).fadeIn("fast");
            setTimeout(function()
            {
                $(".reponse").fadeOut("slow");
            }, 2000);
        });
    }
});*/