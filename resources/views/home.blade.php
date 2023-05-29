
@extends('adminlte::page')
@section('title', 'Dashboard')
@section('plugins.Datatables', true)
@section('content_header')
    <h1>Teste Laravel</h1>
@stop

@section('content')
<p> <u>Segundo as especificações solicitadas via e-mail.</u> </p>
<p> Foi desenvolvido e com laravel 8 com Template AdminLte disponível </p>
<p> -Tela de login e autocadastro foi gerado atravez de laravel/ui auth </p>
<p> -Account mostra uma listagem com filtro geral para busca dinâmica, contendo o nome da conta e o saldo</p>
<p> -Cada registro conta com as seguintes ações: </p>
<p> -<i class="fa fa-eye"></i> Visualizar - essa ação ira abrir a pagina da conta em questão para que se possa ver todos os lançametos na conta em questão</p>
<p> -<i class="fa fa-edit"></i> Editar - Essa ação serve para que se possa mudar o nome da conta </p>
<p> -<i class="fa fa-trash"></i> Excluir - Essa ação deleta a conta e todos os lançamentos relacionados </p>
<p> -Para Inserir uma nova conta e necessário acessar o formulário através do botão de 'Adicionar Conta', que fica localizado no conto superior direto </p>
<p> -Para Inserir o formulário conta com dados do movimento, mas caso não tenha lançamento inicial os campos não são obrigatórios. </p>
<p> -Para lançar mais movimento a uma conta entre em <i class="fa fa-eye"></i>, no canto superior direito no botão 'Adicionar Movimento'.
A partir disso terá um formulário onde poderá ser adicionado um novo movimento.
<p> -Caso a opção seja editar <i class="fa fa-edit"></i> o movimento .</p>
<p> -Caso a opção seja excluir <i class="fa fa-trash"></i> o movimento .</p>
<p> -A listagem de movimentos conta com filtro geral para uma busca dinâmica. </p>


@stop



