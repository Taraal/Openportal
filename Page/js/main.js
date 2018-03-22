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


function refresh() {
$.ajax({
    url: "chat.php", // Ton fichier ou se trouve ton chat
    success:
        function(retour){
        $('chat').html(retour); // rafraichi toute ta DIV "bien sur il lui faut un id "
    }
});
 
}
 
setInterval(refresh(), 10000) // Répète la fonction toutes les 10 sec