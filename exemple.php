<?php 

namespace FunilDeVendas;

class FunilDeVendas{

	public static $config = [
		'token' => '', // Insira o seu token
	];

	public static function createOpportunity(){

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://app.funildevendas.com.br/api/Opportunity?IntegrationKey=" . FunilDeVendas::$config['token'],
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => "
            { 'oportunidades':[ 
                {
                    'titulo': 'Novo cliente: João Antonio',
                    'valor': 100,
                    'codigo_vendedor': 1111,
                    'codigo_metodologia': 1,
                    'codigo_etapa': 1,
                    'codigo_canal_venda': 11111,
                    'empresa':{
                        'nome': 'Empresa do Antonio',
                        'cnpj': '99.999.999-9999-99',
                        'ie': '99999999',
                        'segmento': '',
                        'endereco_completo': { 
                            'logradouro': 'Rua do Mar',
                            'numero': '123',
                            'complemento': '',
                            'bairro': 'Mar Aberto',
                            'cidade': 'Oceano',
                            'uf': 'SC',
                            'cep': '99999-999' 
                        }, 
                    }, 
                    'contato': {
                        'nome': 'João Antonio',
                        'email': 'antonio@empresa.com',
                        'telefone1': '(88) 88888888',
                        'telefone2': '(88) 88888888',
                        'cargo': 'Gerente',
                        'cpf': '999.999.999-99',
                    } 
                },
                ] 
            }",
            CURLOPT_HTTPHEADER => array("content-type: application/json"),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
          echo "cURL Error #:" . $err;
        } else {
          echo $response;
        }
	}
}