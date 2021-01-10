@extends('layouts.default')
@section('title', 'Agenda | ')
@section('content')
    <div class="container">
        <div class="table-contatos">
            <a href="/cadastro">
                <button class="btn btn-cadastro">Cadastar</button>
            </a>
            <table class="table table-dark">
                <div class="alert" id="alert"></div>
                <thead>
                <tr>
                    <th scope="col">Nome</th>
                    <th scope="col">Telefone</th>
                    <th scope="col"></th>
                </tr>
                </thead>
                <tbody>
                
                </tbody>
            </table>
            <nav>
                <ul class="pagination  justify-content-center">
                    
                </ul>
            </nav>
        </div>
    </div>
@endsection
@section('scripts')
<script src="/js/index.js"></script>
@endsection