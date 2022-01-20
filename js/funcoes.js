// FUNÇÃO PARA APLICAR ZOOM E COR A LOGO DO PROJETO AO EFETUAR UMA AÇÃO
function cadastro(){
    document.getElementById("img_pb").classList.add("img_pb_ativo");
    setTimeout(()=>{
        document.querySelector("form").submit();
    }, 1500)
}