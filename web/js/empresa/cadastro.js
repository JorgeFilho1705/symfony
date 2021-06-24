$(document).ready(function(){
    $('#empresa_cep').mask('99999-999');
    $('#empresa_telefone').mask('(00) 0000-0000');
});

function buscaCEP(cep){

    var cep = cep.replace(/\D/g, '');
    if (cep != "") {
        var validacep = /^[0-9]{8}$/;
        if(validacep.test(cep)) {
            $.getJSON("https://viacep.com.br/ws/"+ cep +"/json/?callback=?", function(dados) {
                if (!("erro" in dados)) {
                    $("#empresa_endereco").val(dados.logradouro);
                    $("#empresa_cidade").val(dados.localidade);
                    $("#empresa_estado").val(dados.uf);
                }
                else{
                    alert('CEP não encontrado.');
                }
            });
        }
        else {
            alert('Formato de CEP inválido.');
        }
    }
}
