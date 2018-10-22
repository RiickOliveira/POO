<?php

//CARREGA UMA CLASSE QUADNO E NECESSARIA, QUANDO É INSTACIADA A PRIMEIRA VEZ
function __autoload($classe){
	if (file_exists("{$classe}.class.php")){
		include_once"{$classe}.class.php";
	}
}

	class inscricaoRecord extends TRecord {

		//metodo get_aluno() executado sempre se for acessada a propriedade aluno
		function get_aluno(){
		//insrancia alunoRecord, carrega na memoria o aluno do codigo $this->ref_aluno
			$aluno = new alunoRecord($this->ref_aluno);

			return $aluno;

		}
	}

	class alunoRecord extends TRecord{

		//metodo get inscricoes executado sempre se for acessada a propriedade 'inscicoes'
		function get_inscricoes(){

			$criteria = new TCriteria;
			$criteria->add(new TFilter('ref_aluno','=',$this->id));

			$repository = new TRepository('inscricao');

			return $repository->load($criteria);
		}
	}

	try {

		TTransaction::open('my_banco');
		TTransaction::setLogger( new TLoggerTXT('C:\Users\Ricardo\Desktop\log8.txt'));

		$inscricao = new inscricaoRecord(2);

		//EXIBE OS DADOS RELACIONADOS DE ALUNO (ASSOCIACAO)

		echo "DADOS DA INSCRICAO";
		echo "===================";

		echo "Nome       :" . $inscricao->aluno->nome . "<br>";
		echo "Endereco   :" . $inscricao->aluno->endereco . "<br>";
		echo "Cidade     :" . $inscricao->aluno->cidade . "<br>";
	
		$aluno = new alunoRecord(2);

		echo "INSCRICAO ALUNOS";
		echo "===================";

		 //EXIBE OS DADOS RELACIONADOS DE INSCRICOES (AGREGACAO)

		foreach ($aluno->inscricoes as $inscricao) {
			
			echo "ID : " . $inscricao->id . "<br>";
			echo "Turma : " . $inscricao->ref_turma . "<br>";
			echo "Nota : " . $inscricao->nota . "<br>";
			echo "Freq. : " . $inscricao->frequencia . "<br>";
		}

		TTransaction::close();
		echo "REGISTROS ALTERADOS COM SUCESSO<br>";

		} catch (Exception $e){
			echo "<b>ERRO</b>".$e->getMessage();
			TTransaction::rollback();
	}

	/*class PessoaRecord extends TRecord{

    function get_cidade(){
        $cidade = new CidadeRecord($this->cidade_id);
        return $cidade->nome;
    }
}

function escreveLinha($texto){
    echo $texto . '<br />';
}

TTransaction::open('my_livro');

$cliente = new PessoaRecord(1);
escreveLinha($cliente->id);
escreveLinha($cliente->nome);
escreveLinha($cliente->cidade_id);
escreveLinha($cliente->cidade);


/**/


?>