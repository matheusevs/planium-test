<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    </head>
    <body>
        <div class="container">
            

            <?php

                include "header.php";

            ?> 

            <div class="p-5">
                <h1 style="text-align: center;">Tabela de propostas</h1>
            </div>

            <table class="table">
                <thead>
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">Idade</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Registro do plano</th>
                    <th scope="col">Valor do plano</th>
                    </tr>
                </thead>
                <tbody>
                <?php 

                    $json = json_decode(file_get_contents('../proposta.json'));        
                    $array = json_decode(json_encode($json), true);

                    foreach($array as $key => $value){
                        if($value['total']){
                            echo '
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>Valor Total</td>
                                <td>R$ ' .$value['total']. '</td>
                            </tr>
                        ';
                        } else {
                            echo '
                                <tr>
                                    <th>' .$key. '</th>
                                    <td>' .$value['dados']['idade']. '</td>
                                    <td>' .$value['dados']['nome']. '</td>
                                    <td>' .$value['plano']. '</td>
                                    <td>R$ ' .$value['faixa']. '</td>
                                </tr>
                            ';
                        }
                    }

                ?>
                </tbody>
            </table>      
        </div>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    </body>
</html>