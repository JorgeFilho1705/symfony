$( document ).ready(function() {
    $(".iframe").colorbox({iframe:true, width:"99%", height:"99%"});
});

function DeletarUsuario(nome){
  if(confirm("Deseja realmente excluir usuário: "+nome+"?")){
    return true;
  }
  return false;
}

function AlteraStatus(url, id, status){
    if(confirm("Deseja alterar o status deste usuário?")){
        $.post(url, null, function (data) {
            if(data.status == 0){
                $("#img_"+id).attr("src", "../images/inativo-icon.png");
                $("#img_"+id).attr("title", "Usuário inativo");
            }else{
                $("#img_"+id).attr("src", "../images/ativo-icon.png");
                $("#img_"+id).attr("title", "Usuário ativo");
            }
        });
    }
}