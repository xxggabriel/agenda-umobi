function preencherCampos(id){
    if(id){
        $.ajax({
            url : "/api/agenda",
            method : "GET",
            data : {
                id : id
            },
            success : function(res) {
                
                if(res.error){
                    alert(res.message)
                } else {
                    if(res.data == null){
                        window.location.href = "/" 
                    }
                    $("#nome").html(res.data.nome)
                    $("#telefone").html(res.data.telefone.replace(/(\d{2})(\d{4,5})(\d{4})/, '($1) $2-$3'))
                    $("#assunto").html(res.data.assunto)
                }
            }
        })
    }
}