function getXMLHTTP() {
    // vérifie si le module 'xhr' est supporter
   if(window.XMLHttpRequest || window.ActiveXObject) {
       if(window.ActiveXObject) {              
            try {                  
               var xhr = new ActiveXObject("Msxml2.XMLHTTP");
               return xhr;
            } catch(e) {
                var xhr = new ActiveXObject("Microsoft.XMLHTTP");
                return xhr              
            }
        } else {
                var xhr = new XMLHttpRequest();
                return xhr
        }
    } else {
            // sinon alerter l'utilisateur que son navigateur ne le supporte pas                  
            alert("Votre navigateur ne supporte pas l'XMLhttpRequest")
    }
}

var moment = setInterval(pull_message, 2000);

function pull_message() {
    
    var maxid = 'maxid=' + $('.id-message-info')[0].attributes[1].nodeValue;
    
    var xhr = getXMLHTTP();
    
    xhr.onreadystatechange = function() {
        
        if (xhr.readyState == 4 && (xhr.status == 200 || xhr.status == 0)) {
            console.log(xhr.response)
            if (xhr.responseText != '') {
                document.getElementById('chat').innerHTML = xhr.responseText + document.getElementById('chat').innerHTML;
            }
        }
    }
    
    xhr.open("POST", "../module/message-feeding.php");
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.send(maxid + '&id=' + $('#to').val() + '&ids=' + $('#from').val());
    
//    $.ajax({
//        url: "../module/message-feeding.php",
//        type: 'POST',
//        data: maxid + '&id=' + $('#to').val() + '&ids=' + $('#from').val()
//    }).done(function(answer) {
//        $('#chat').html(answer + $('#chat').html());
//    });
//    $('#message').focus();
}

document.getElementById('message').onkeypress = function(event){
    if (event.which == 13) {
        console.log('pass');
        send();
    }
};

function send() {
    var message = $('#message').val();
    if (message === '') return;
    var to = $('#to').val();
    var from = $('#from').val();
    data = 'contenu=' + message + '&to_user_id=' + to + '&from_user_id=' + from;
    $.ajax({
        url: "../module/traitement-message.php",
        type: 'POST',
        data: data
    }).done(function() {
    });
}

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


