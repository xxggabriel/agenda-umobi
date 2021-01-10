var behavior = function (val) {
    return val.replace(/\D/g, '').length === 11 ? '(00) 00000-0000' : '(00) 0000-00009';
},
options = {
    onKeyPress: function (val, e, field, options) {
        field.mask(behavior.apply({}, arguments), options);
    }
};

$('#telefone').mask(behavior, options);

$('form').submit(function (e) {
    e.preventDefault()
})

function salvar(id = null) {
    
    var url = "/api/agenda"
    if(id){
        url = "/api/agenda/"+id
    } 

    removerErros()
    $.ajax({
        url : url,
        method : "POST",
        data : {
            nome        : $("#nome").val(),
            telefone    : $("#telefone").val(),
            assunto     : $("#assunto").val(),
        },
        success : function(res){
            
            
            if(res.error){
                $("#alert").show.html(res.message)
            } else {
                window.location.href = "/"
            }
        }, error : function(res){
            var errors = res.responseJSON.errors
            if(errors){
                Object.keys(errors).forEach((key)=>{
                    $("#alert_"+key).addClass('invalid-feedback').html(errors[key])
                    $("#"+key).addClass('is-invalid')
                })

            } else {
                $("#alert").html("Erro inesperado").show()
            }
        }
    })
}

function preencherCampos(id = null){
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
                    $("#nome").val(res.data.nome)
                    $("#telefone").val(res.data.telefone.replace(/(\d{2})(\d{4,5})(\d{4})/, '($1) $2-$3'))
                    $("#assunto").val(res.data.assunto)
                }
            }
        })
    }
}

function removerErros(){
    $("#alert").hide().html("")
    $("#alert_nome").html("").removeClass('invalid-feedback')
    $("#alert_telefone").html("").removeClass('invalid-feedback')
    $("#alert_assunto").html("").removeClass('invalid-feedback')
    $("#nome").removeClass('is-invalid')
    $("#telefone").removeClass('is-invalid')
    $("#assunto").removeClass('is-invalid')
}