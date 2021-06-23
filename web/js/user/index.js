$( document ).ready(function() {
    $(".iframe").colorbox({iframe:true, width:"99%", height:"99%"});
});

function DeletarUsuario(nome){
  if(confirm("Deseja realmente excluir usuário: "+nome+"?")){
    return true;
  }
  return false;
}