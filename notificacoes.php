<!DOCTYPE html>
<html lang="pt-br">
  


<html>
<head>
    <title>Sistema</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link rel="icon" href="images/IF1.png" type="image/gif" />
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Controle de Progressões CPPD</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet" />
    <link href="css/style.css" rel="stylesheet" />
    <link href="css/responsive.css" rel="stylesheet" />
    
    
</head>
<body>
<?php
            session_start();

            include "config.php";
     
            $emaillogado = $_SESSION['email'];



            $sqlNotificacoes = "SELECT * FROM notificacoes WHERE usuario_id=(SELECT id_usuario FROM usuario WHERE email='$emaillogado') ORDER BY data_notificacao DESC LIMIT 1";
            $resultNotificacoes = mysql_query($sqlNotificacoes) or die(mysql_error());
            
            $sqlx = "SELECT * FROM usuario WHERE usuario.email='$emaillogado'";
            
            $query = mysql_query($sqlx) or die (mysql_error());
            $puxa = mysql_fetch_array($query);
            
            $id_usuario = $puxa["id_usuario"];  
            $nome = $puxa["nome"];   
            $mensagem = isset($puxa["mensagem"]) ? $puxa["mensagem"] : '';  
        ?>
        <?php
            $classe = $puxa["membrocppd"];

            if($classe == 1){
                $classe1 = "membrocppd.php";
                $classe2 = "Membro CPPD";
            } else{
              $classe1 = "restrito.php";
              $classe2 = "Professor";
            }
            ?> 
<div class="hero_area">
    <header class="header_section">
      <div class="header_top">
        <div class="cppd-link">
          <span><H1>CPPD</H1></span> Comissão Permanente de Pessoal Docente
        </div>
      <div class="container-fluid">
          <div class="top_nav_container">
            <div class="logo_if" align="right">
              <img src="images/IFFar_logo.png">
            </div>            
          </div>
        </div>
      </div>
      <div class="header_bottom">
        <div class="container-fluid">
          <nav class="navbar navbar-expand-lg custom_nav-container ">
            <div class="fonte-logado">
              <span class="fonte-logado"><span>Olá <b><?php echo $nome; ?></b></span>, <br>você está logado como: <?php echo"$classe2"; ?></span>
            </div>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class=""> </span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav">
                <li class="nav-item ">
                  <a class="nav-link" href="<?php echo"$classe1"; ?>"><i class="fa fa-home"></i> Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item active">
                  <a class="nav-link" href="notificacoes.php"><i class="fa fa-bell"></i> Notificações</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="meu_usuario.php"><i class="fa fa-user"></i> Minhas Informações</a>
                </li>
                <li class="nav-item sair">
                  <a type="button" class="btn btn-danger btn" href="index.php"><i class="fa fa-sign-out"></i> Sair</a>
                </li>
              </ul>
            </div>
          </nav>
        </div>
      </div>
    </header>
    <br>
    <div class="row row-cols-1 row-cols-md-3 mb-3 text-center cards-tela-principal">

        
          <div class="col">
        <div class="card mb-8 rounded-3 shadow-sm">
            <div class="card-header py-4">
                <h4 class="my-0 fw-normal"><i class="fa fa-envelope"></i> Notificação </h4>
            </div>
            <div class="card-body text-center">
                <div align="left">
                  <?php
                   
                   
  
                   $sqlz = "SELECT * FROM notificacoes WHERE notificacoes.usuario_id='$id_usuario'";
            
                   $queryz = mysql_query($sqlz) or die (mysql_error());
                   $puxaz = mysql_fetch_array($queryz); 

          
?>
  <label class="container"><?php 
  if($mensagem >= "1"){
  echo "Mensagem: <br>";
  echo $mensagem = $puxaz["mensagem"];
  echo"<input type='checkbox'>Lido";
  echo"<span class='checkmark'></span>";
  }else{
    echo "Nenhuma notificação disponível!";
  }
  ?> 
  
</label>
<?php
          

       
            
              

            //echo"Seu requerimento já foi avaliado!";

            echo "</div>";
          

          echo "</div>";
          echo "</div>";
        
        ?>
                    
                </div>
                </div>
            </div>
        </div>
    </div>
    </di> 
</div>   
</div>
<!-- FIM DOS CARDS-->

  <section class="client_section layout_padding-bottom">
    <div class="container">
      
        <h2 align="center">
          Qual o objetivo do sistema da CPPD?
        </h2>
      
    </div>
    <div class="client_container ">
      <div id="carouselExample2Controls" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <div class="container">
              <div class="box">
                <div class="detail-box">
                  <p>
                    <i class="fa fa-quote-left" aria-hidden="true"></i>
                  </p>
                  <p>
                    O objetivo desse sistema será calcular a progressão dos professores após 2 anos do progresso de ensino, organizando os arquivos, facilitando a geração de documentos e modernizando o seu acesso e uso.
                  </p>
                </div>              
              </div>
            </div>
          </div>
          <div class="carousel-item">
            <div class="container">
              <div class="box">
                <div class="detail-box">
                  <p>
                    <i class="fa fa-quote-left" aria-hidden="true"></i>
                  </p>
                  <p>
                  Nosso sistema foi feito a fim de modernizar, organizar e facilitar a CPPD, substituindo o sistema antigo onde era manual e agora é em um sistema web. 
                  Nosso sistema web funciona a partir de um cadastro que a comissão da CPPD irá fazer, esse é o primeiro passo.
                  No segundo passo os professores irão ter acesso e vão poder consultar seus processos para ver se tem a possibilidade de "subir de nível".
                  </p>
                </div>
              </div>
            </div>
          </div>
          <div class="carousel-item">
            <div class="container">
              <div class="box">
                <div class="detail-box">
                  <p>
                    <i class="fa fa-quote-left" aria-hidden="true"></i>
                  </p>
                  <p>
                  Eles poderão consultar a planilha onde contém o anexo dos documentos para serem enviados no sistema a partir disso o usuário preenche os campos solicitados e com isso no final é gerado a pontuação necessária para ele ser aprovado, porém após serem enviados (anexados) no sistema os membros da CPPD irão fazer a avaliação e a verificação dos documentos solicitados e ver se a pontuação que foi gerada é acessível com os documentos.
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="carousel_btn-box">
          <a class="carousel-control-prev" href="#carouselExample2Controls" role="button" data-slide="prev">
            <span>
              <i class="fa fa-angle-left" aria-hidden="true"></i>
            </span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselExample2Controls" role="button" data-slide="next">
            <span>
              <i class="fa fa-angle-right" aria-hidden="true"></i>
            </span>
            <span class="sr-only">Next</span>
          </a>
        </div>
      </div>
    </div>
  </section>
  <section class="info_section ">
    <div class="container">
      <div class="row">
        <div class="col-md-3">
          <div class="info_contact">
            <h5>
              <a href="" class="navbar-brand">
                <span>
                  Topo
                </span>
              </a>
            </h5>
            <p>
              <i class="fa fa-map-marker" aria-hidden="true"></i>
              IFFar Campus FW
            </p>
            <p>
              <i class="fa fa-phone" aria-hidden="true"></i>
              +01 123456789
            </p>
            <p>
              <i class="fa fa-envelope" aria-hidden="true"></i>
              cppd2023@iffar.edu.br
            </p>
          </div>
        </div>
        <div class="col-md-3">
          <div class="info_info">
            <h5>
              <i class="fa fa-info"></i> Informações
            </h5>
            <p>
              Sistema ainda em desenvolvimento. Criado para a PPI da turma 34 no ano de 2023
            </p>
          </div>
        </div>
        <div class="col-md-3">
          <div class="info_links">
            <h5>
              Links Úteis
            </h5>
            <ul>
              <li>
                <a href="index.php">
                  Home
                </a>
              </li>
              <li>
                <a href="https://www.iffarroupilha.edu.br/" target="_blank">IFFar</a>
              </li>
              <li>
                <a href="https://sites.google.com/iffarroupilha.edu.br/cppd-fw/progress%C3%A3o-promo%C3%A7%C3%A3o?authuser=0" target="_blank">Site da CPPD</a>
              </li>

            </ul>
          </div>
        </div>
        <div class="col-md-3">
          <div class="info_links">
            <h5>
              <i class="fa fa-users"></i> Membros CPPD
            </h5>
            <ul>
              <li>
                  <span><b>Quandale Dingle:</b></span>
                  <a href="mailto:quandale.dingle@iffarroupilha.edu.br?">quandale.dingle@iffarroupilha.edu.br</a>
              </li>
              <li>
                  <span><b>Quandale Dingle:</b></span>
                  <a href="mailto:quandale.dingle@iffarroupilha.edu.br?">quandale.dingle@iffarroupilha.edu.br</a>
              </li>
              <li>
                  <span><b>Quandale Dingle:</b></span>
                  <a href="mailto:quandale.dingle@iffarroupilha.edu.br?">quandale.dingle@iffarroupilha.edu.br</a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </section>
  <footer class="footer_section">
    <div class="container">
      <p>
        &copy; <span id="displayYear"></span> Todos os direitos reservados pelo
        <a href="https://html.design/">grupo: Davi, Gabriel Brizola e Luan</a>
      </p>
    </div>
  </footer>
  <script src="js/jquery-3.4.1.min.js"></script>
  <script src="js/bootstrap.js"></script>
  <script src="js/custom.js"></script>


</body>

</html>