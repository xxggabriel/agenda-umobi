$(function(){
    listagemAgenda()
})

function listagemAgenda(url = null){
    $("tbody").html("")
    $(".pagination").html("")
    getListaAgenda(url)
}

function mascaraTelefone(telefone){
    if(phone.length > 10) {
        telefone.replace(/([0-9]{2})[\s][0-9]{4}-[0-9]{4,5}/, '')
    } else {
        element.mask("(99) 9999-9999?9");
    }
}

function getListaAgenda(url = null){
    if(!url){
        url = '/api/agenda?page=1'
    }
    $.ajax({
        url : url,
        method : "GET",
        success : function(res){
            
            var agenda = res.data
            
            if(agenda.data.length > 0){
                
                agenda.data.forEach(contato => {
                    adicionarContatoTabela(contato)
                });
                adicionarPaginacao(agenda)
            } else {
                $("tbody").html(`
                    <tr> 
                        <td>Nenhum registro na agenda</td>
                    </tr>
                `)
            }
        }
    })
}

function adicionarContatoTabela(contato){
    
    $("tbody").append(`
        <tr id="tr-${contato.id}">
            <td>
                <a href="/agenda/${contato.id}">
                    ${contato.nome}
                </a>
            </td>
            <td>${contato.telefone.replace(/(\d{2})(\d{4,5})(\d{4})/, '($1) $2-$3')}</td>
            <td>
                <a href="/editar/${contato.id}">
                    <button class="btn">Editar</button>
                </a>
                <button class="btn" onclick="deletarContato(${contato.id})">X</button>
            </td>
        </tr>
    `)
}

function adicionarPaginacao(paginacao){
    adicionarLinkPaginacao('Próximo &raquo;', paginacao.first_page_url)
    var totalPorPagina =  Math.ceil(paginacao.total / paginacao.per_page)
    for (let index = 1; index <= totalPorPagina; index++) {
        
        if(paginacao.current_page == index){
            adicionarLinkPaginacao(index, `${paginacao.path}?page=${index}`, 'page-link-active')
        } else {
            adicionarLinkPaginacao(index, `${paginacao.path}?page=${index}`)
        }
        
    }

    adicionarLinkPaginacao('Próximo &raquo;', paginacao.last_page_url)
    

}

function adicionarLinkPaginacao(nomePagina, url, active = ''){

    $(".pagination").append(`
        <li class="page-item"><button class="page-link ${active}" onclick="listagemAgenda('${url}')">${nomePagina}</button></li>
    `) 
   
}


function deletarContato(id){
    if(confirm("Você realmente deseja excluir?")){
        $.ajax({
            url : "/api/agenda/"+id+"/deletar",
            method : "GET",
            success : function(res){
                if(res.error){
                    $("#alert").addClass("alert-danger").html(res.message)
                }
                $("#tr-"+id).remove()
            }
        })
    }
}