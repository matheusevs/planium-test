
<?php 
    
class Funcoes {

    public function formatarDados($dados) {
        $arr = [];

        for($i = 0; $i < $dados['qtd']; $i++){
            array_push($arr, array(
                'idade' => $dados['idade_'.$i], 
                'nome' => $dados['nome_'.$i],
                'plano' => $dados['plano_'.$i]));
        }

        $this->validaInformacoes($arr, $dados['qtd']);
    }

    public function validaInformacoes($dados, $qtd){
        
        $json_data_prices = json_decode(file_get_contents('../tabelas/prices.json'));        
        $data_prices = json_decode(json_encode($json_data_prices), true);

        $arr = [];
        $arrNew = [];

        foreach($dados as $d){
            
            foreach($data_prices as $precos){
                
                if($d['plano'] == $precos['codigo']){

                    if($precos['minimo_vidas'] <= $qtd){

                        if($d['idade'] >= 0 && $d['idade'] <= 17){
                            array_push($arr, array(
                                'dados' => $d,
                                'plano' => $precos['codigo'],
                                'faixa' => 'R$' . $precos['faixa1'] 
                            ));
                        } else if($d['idade'] >= 18 && $d['idade'] <= 40){
                            array_push($arr, array(
                                'dados' => $d,
                                'plano' => $precos['codigo'],
                                'faixa' => 'R$' . $precos['faixa2'] 
                            ));
                        } else if($d['idade'] > 40){
                            array_push($arr, array(
                                'dados' => $d,
                                'plano' => $precos['codigo'],
                                'faixa' => 'R$' . $precos['faixa3'] 
                            ));
                        }

                    }

                }
            }
        }

        $arrNew = $this->validaPlanoBeneficiario($arr);
        $this->criaJson($arrNew, 'beneficiarios.json');

        $arrProposta = $this->validaProposta($arrNew);

    }

    public function validaPlanoBeneficiario($arr){
        $json_data_planos = json_decode(file_get_contents('../tabelas/plans.json'));
        $data_planos = json_decode(json_encode($json_data_planos), true);

        foreach($arr as $key => $a){

            foreach($data_planos as $planos){
                if($planos['codigo'] == $a['plano']){
                    $arr[$key]['plano'] = $planos['nome'];
                }
            }
        }

        return $arr;
            
    }

    public function validaProposta($arr){
        
    }

    public function criaJson($arr, $nomeArq){
        $arquivo = __DIR__ . '/../' . $nomeArq;
        $json_formatado = json_encode($arr, JSON_PRETTY_PRINT);
        file_put_contents($arquivo, $json_formatado);
    }
}



if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $funcao = new Funcoes;
    $funcao->formatarDados($_POST);
}


?>