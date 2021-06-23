$( document ).ready(function() {
    $(".iframe").colorbox({iframe:true, width:"99%", height:"99%"});
});

function DeletarEmpresa(nome){
  if(confirm("Deseja realmente excluir empresa: "+nome+"?")){
    return true;
  }
  return false;
}

function abreFiltro(){
    if(document.getElementById("idFiltro").style.display == 'none'){
        $("#idFiltro").show('10');
    }else{
        $("#idFiltro").hide('10');
    }
}

function aButtonPressed(url, id){
    if(document.getElementById("td_"+id).style.display == 'none') {
        $.post(url, null, function (data) {
            $("#tr_" + id).css('background-color', '#F0E68C');
            $("#detalhes_" + id).html(data.saida);
            $("#td_"+ id).show('10');
        });
    }else{
        $("#td_"+ id).hide('10');
        $("#tr_" + id).css('background-color', '#fff');
    }
}
