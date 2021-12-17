$(document).ready(function() {
    $('.btn-primary').on('click', function() {
        var email = $('#inputEmail').val();
        if (email == '') {
            alert("Informe seu e-mail!");
            return false;
        }
    })
});

var getUrlParameter = function getUrlParameter(sParam) {
    var sPageURL = window.location.search.substring(1),
        sURLVariables = sPageURL.split('&'),
        sParameterName,
        i;

    for (i = 0; i < sURLVariables.length; i++) {
        sParameterName = sURLVariables[i].split('=');

        if (sParameterName[0] === sParam) {
            return sParameterName[1] === undefined ? true : decodeURIComponent(sParameterName[1]);
        }
    }
};

$(function() {
    $(document).ready(function() {
        if (getUrlParameter('erro') == 'email') {
            alert("Endereço de e-mail não encontrado! Somente quem esteve presente por mais de 60% poderá gerar o certificado. Quaisquer dúvidas entre em contato pelo site.");
        }
    });
});