<?php 

$qtd = $_POST['quantidade'];
$json_data = json_decode(file_get_contents('../tabelas/plans.json'));

?>

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
            <h3 class="display-4 text-center col">Informe os dados dos <?php echo $qtd ?> benificiarios</h3>
            <form id="testeprioca" action="retorno.php" method="POST">
            <input type="text" hidden name="qtd" value="<?php echo $qtd ?>">

            <?php for($i = 0; $i < $qtd; $i++){ ?>

                <div class="form-group input-group">
                    <label for="Idade">Idade</label>
                    <input required="required" class="form-control" type="text" id="idade" name="idade_<?php echo $i ?>">
                </div>
                <div class="form-group input-group">
                    <label for="nome">Nome</label>
                    <input required="required" class="form-control" type="text" id="nome" name="nome_<?php echo $i ?>">
                </div>

                <div class="form-group input-group">
                    <label for="plano">Plano</label>
                    <select name="plano_<?php echo $i ?>" id="plano" class="form-control">
                        <?php foreach($json_data as $key => $value){?>
                            
                        <option value="<?php echo $value->codigo ?>">
                            <?php echo $value->nome; ?>
                        </option>

                        <?php } ?>
                    </select>
                </div>

            <?php } ?>

            <div id="botoes">
                <button id="botao" class="btn btn-custom btn-branco" type="submit" value="Enviar"">Enviar</button>
            </div>   
            </form>
                        
        </div>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
        <script src="script.js"></script>
    </body>
</html>