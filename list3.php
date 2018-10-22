<?php

function __autoload($classe)
{
    $pastas = array('app.widgets', 'app.ado');
    foreach ($pastas as $pasta)
    {
        if (file_exists("{$pasta}/{$classe}.class.php"))
        {
            include_once "{$pasta}/{$classe}.class.php";
        }
    }
}

/*
 * função conv_data_to_br()
 * converte uma data para o formato dd/mm/yyyy
 * @param $data = data no formato yyyy/mm/dd
 */
function conv_data_to_br($data)
{
    // captura as partes da data
    $ano = substr($data,0,4);
    $mes = substr($data,5,2);
    $dia = substr($data,8,4);
    // retorna a data resultante
    return "{$dia}/{$mes}/{$ano}";
}

/*
 * função get_sexo()
 * converte um caractere (M,F) para extenso
 * @param $sexo = M ou F (Masculino/Feminino)
 */

function get_sexo($sexo){
   
    switch ($sexo)
    {
        case 'm':
            return 'Masculino';
            break;
        case 'f':
            return 'Feminino';
            break;
    }
}

// declara a classe Pessoa
class PessoaRecord extends TRecord{}

// instancia objeto DataGrid
$datagrid = new TDataGrid;
//instancia as colkunas da datagrid
$codigo = new TDataGridColumn('id','Codigo','center',50);
$nome = new TDataGridColumn('nome','Nome','left',160);
$endereco = new TDataGridColumn('endereco','Endereço','left',140);
$datanasc = new TDataGridColumn('datanasc','Data Nasc','left',100);
$sexo = new TDataGridColumn('sexo','Sexo','center',100);
//aplica as funcoes para transformas as colunas
$nome->setTransformer('strtoupper');
$datanasc->setTransformer('conv_data_to_br');
$sexo->setTransformer('get_sexo');
//adiciona as coluinas a datagrid
$datagrid->addColumn($codigo);
$datagrid->addColumn($nome);
$datagrid->addColumn($endereco);
$datagrid->addColumn($datanasc);
$datagrid->addColumn($sexo);
//cria o modelo da datagrid  montando sua estrutura
$datagrid->createModel();

//obtem objetos do banco de dados
    try { 
        //inicia a transacao com o bd
        TTransaction::open('my_livro');
        //instancia um repositorio para pessoa
        $repository = new TRepository('Pessoa');
        //cria um criterio definindo a ordenacao
        $criteria = new TCriteria;
        $criteria->setProperty('order','id');
        //carrega os objbetos pessoa
        $pessoas = $repository->load($criteria);
        foreach ($pessoas as $pessoa) {
            //adiciona o objeto na data grid
            $datagrid->addItem($pessoa);
        }
        //finaliza a instrucao
        TTransaction::close();

    } catch (Exception $e) {
        //exibe a mensagem gerada pela execucao
        new TMessage('error',$e->getMessage());
        //desfaz todas altercaoes no banco
        TTransaction::rollback();
    }

    //instancia uma pagina TPAge
    $page = new TPage;
    //adicioona  a datagrid a pagina
    $page->add($datagrid);
    $page->show();

?>
