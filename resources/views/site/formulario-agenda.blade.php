@extends('layouts.default')
@section('title', 'Agendar | ')
@section('content')

    <div class="container">
        
        <form class="form-agenda">
            <div class="col-8" style="margin-left: auto;margin-right: auto;">
                <div class="alert alert-danger" id="alert" style="display: none"></div>
                <div class="form-group">
                    <label for="">Nome:</label>
                    <input type="text" id="nome" class="form-control" required>
                    <div id="alert_nome"></div>
                </div>
            
                <div class="form-group">
                    <label for="">Telefone:</label>
                    <input type="text" id="telefone" class="form-control" required>
                    <div id="alert_telefone"></div>
                </div>
            
            
                <div class="form-group">
                    <label for="">Assunto:</label>
                    <textarea type="text" id="assunto" class="form-control"></textarea>
                    <div id="alert_assunto"></div>
                </div>

                <button class="btn btn-cadastro btn-cadastro-form-agenda" onclick="salvar({{$id}})">Salvar</button>
            </div>

        </form>
    </div>

@endsection
@section('scripts')

    <script src="/js/formulario-agenda.js"></script>
    <script>
        preencherCampos({{$id}})
    </script>
@endsection