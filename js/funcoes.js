function cadastro(){
    document.getElementById("img_pb").classList.add("img_pb_ativo");
    setTimeout(()=>{
        document.querySelector("form").submit();
    }, 1500)
}