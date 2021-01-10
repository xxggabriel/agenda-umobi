@extends('layouts.default')
@section('title', 'Agenda | ')
@section('content')
    <div class="container">
        <div class="table-contatos">
            <table class="table table-dark">
                <div class="alert" id="alert"></div>
                <thead>
                    
                </thead>
                <tbody>
                    <tr>
                        <td class="th-tbody">Nome</td>
                        <td class="td-tbody" id="nome"></td>
                    </tr>
                    <tr>
                        <td class="th-tbody">Telefone</td>
                        <td class="td-tbody" id="telefone"></td>
                    </tr>
                    <tr>
                        <td class="th-tbody">Assunto</td>
                        <td class="td-tbody" id="assunto"></td>
                    </tr>
                </tbody>
            </table>
            <a href="/editar/{{$id}}">
                <button class="btn btn-cadastro">Editar</button>
            </a>
        </div>
    </div>

@endsection
@section('scripts')
    <script src="/js/agenda.js"></script>
    <script>
        preencherCampos({{$id}})
    </script>
@endsection