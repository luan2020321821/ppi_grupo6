<?php
    $erros = null;
    if (isset($_POST["Enviar"])) {
        $nom = $_POST["user"];
        $rg = $_POST["RG"];
        $siape = $_POST["Siape"];

        if (isset($_POST["gender"])) {
            $genero = $_POST["gender"];
        } else {
            $erros = add_erro($erros, "O seu gênero deve ser selecionado");
        }

        if (trim($nome) == "") {
            $error = add_erro($erros, "O campo nome deve ser preenchido");
        }
        if (trim($rg) == "") {
            $erros = add_erro($erros, "O campo RG deve ser preenchido");
        }
        if (trim($siape) == "") {
            $erros = add_erro($erros, "O campo Siape deve ser preenchido");
        }
        if (trim($nasc) == "") {
            $erros = add_erro($erros, "O campo Data de nascimento deve ser preenchido");
        } else {
            $data = explode("-", $nasc);
            $anos = date("Y") - $data[0];
            if ($anos < 18) {
                $erros = add_erro($erros, "Você deve ter pelo menos 18 anos");
            }
        }

        if ($erros == "") {
            echo "Obrigado $nome, <br>Seus dados foram enviados com sucesso.";
        } else {
            echo $erros;
        }
    }

    function add_erro($erro, $mensagem) {
        if ($erro == "") {
            $retorno = $mensagem;
        } else {
            $retorno = $erro."<br>".$mensagem;
        }
        return $retorno;
    }
?>