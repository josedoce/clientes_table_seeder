<?php

use Illuminate\Database\Seeder;

class ClientesTableSeeder extends Seeder{

    public function run(){	

    	$numeroDeRegistros = 50; //numero de registros
		$anoInicial = 1950; //ano base
		$anoLimite = 2005; 	//ano limiyador

       	$baseNomes =["Giovanna","Valentina","Hugo","Mirella","Elza","Fabiana","Luana","Tania","Joana","Eliane","Bruno","Tomas","Sergio","Mateus","Alexandre","Rafael","Roberto","Raquel","Ian","Giovana","Luana","Camila","Antonio","Alessandra","Nicole","Lucia","Sebastiao","Sebastiao","Maite","Caio","Gabriel","Giovana","Liz","Ruan","Antonia","Luna","Benicio","Breno","Calebe","Emilly","Danilo","Flavia","Lorenzo","Eduarda","Clara","Ian","Andreia","Benedito","Rodrigo","Aline","Benicio","Brenda","Martin","Carlos","Cesar","Thiago","Eduarda","Julio","Felipe","Joao"];
       	$baseSobrenomes = ["Rocha","Nunes","Nunes","Dias","Moreira","Santos","Moura","Moraes","Mendes","Moreira","Souza","Melo","Bernardes","Real","Sales","Aparicio","Barros","Fernandes","Cunha","Silva","Ribeiro","Assuncao","Fernandes","Barbosa","Fogaca","Moreira","Moraes","Lima","Pinto","Carvalho","Nascimento","Aparicio","Souza","Pereira","Fogaca","Barros","Ramos","Rocha","Alves","Bernardes","Paz","Monteiro","Carvalho","Figueiredo","Costa","Fernandes","Galvao","Santos","Goncalves","Rezende","Real","Nogueira","Galvao","Fogaca","Moraes","Porto","Luz","Melo","Viana","Barros"];
       	$baseCidade = ["São José", "Uruguaiana", "Palmas", "Cotia", "Petrópolis", "Campina Grande", "Porto Alegre", "Fortaleza", "Caruaru", "Aracaju", "Jataí", "Teresina", "Castanhal", "Manaus", "São Luís", "Campina Grande", "Belém", "Rio Branco", "Curitiba", "Rio de Janeiro", "Ponta Porã", "Franca", "Maracanaú", "Aracaju", "Linhares", "Manaus", "Cacoal", "São Luís", "Boa Vista", "São Paulo","Rio Branco", "Luziânia", "Blumenau", "Tucuruí", "Porto Velho", "Boa Vista", "Santa Cruz do Sul", "Santarém", "Macapá", "João Pessoa", "Rio de Janeiro", "Campina Grande", "Maceió", "Manaus", "Ilhéus", "Governador Valadares", "Macapá", "João Pessoa", "Caxias do Sul", "Sarandi", "Sinop", "Cidade Ocidental", "São Luís", "Macapá", "Palmas", "Salvador", "Aracaju", "Arujá", "Brasília", "Brasília"];
       	for($i =1; $i <= $numeroDeRegistros;$i++){
        	$chaveNome = rand(0, count($baseNomes)-1);
            $chaveSobreNome = rand(0, count($baseSobrenomes)-1);
            $ano = rand(1954, $anoLimite);
            $mes = rand(1, 12);
                if($mes === 2){
                	$dia = rand(1, 29);
	            }else if($mes === 4 || $mes === 6 || $mes === 9 || $mes === 11){
	               	$dia = rand(1, 30);
		        }else{
		            $dia = rand(1, 31);
		        }
                if($dia<10){
                	$dia = '0'.$dia;
                }
                if($mes<10){
                	$mes = '0'.$mes;
                }
                $nome = $baseNomes[$chaveNome];
                $sobrenome = $baseSobrenomes[$chaveSobreNome];
                $cidade = $baseCidade[rand(0, count($baseCidade)-1)];
                $email = strtolower($baseNomes[$chaveNome].'_'.rand(1, 1000).$baseSobrenomes[$chaveSobreNome].'@gmail.com');
            	$nascimento = $ano."-".$mes."-".$dia; // formato Y/M/D
                $dados = [
                	'nome'=>$nome,
                	'sobrenome'=>$sobrenome,
                	'cidade'=>$cidade,
                	'email'=>$email,
                	'data_nascimento'=>$nascimento
                ];
                DB::table('clientes')->insert($dados);
        };

    }
}
