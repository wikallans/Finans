<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <!-- Meta tags Obrigatórias -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <!-- Font awesome -->
    
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <!-- Estilo customizado -->
    <link rel="stylesheet" href="css/estilo.css">
    <title>Finans - Finanças Pessoais</title>
  </head>
  <body>
    <header>
      <nav class="navbar navbar-expand-sm navbar-light bg-warning">
        <div class="container">
          <a href="#" class="navbar-brand">
            <img src="imagem/logo.png" width="142">
          </a>
          <button class="navbar-toggler" data-toggle="collapse" data-target="#nav">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="nav-principal">
            <ul class="navbar-nav ml-auto">
              <li class="nav-item">
                <a href="" class="nav-link">Home</a>
              </li> 
              <li class="nav-item">
                <a href="" class="nav-link">Recursos</a>
              </li> 
              <li class="nav-item">
                <a href="" class="nav-link">Beneficios</a>
              </li> 
              <li class="nav-item">
                <a href="" class="nav-link">Preços</a>
              </li> 
              <li class="nav-item">
                <a href="" class="btn btn-outline-light ml-4">Entrar</a>
              </li> 
            </ul>

          </div>
        </div>
      </nav>
    </header>
    <?php
// Verifica se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Configurações para a conexão ao PostgreSQL (substitua com suas configurações)
    $host = "localhost";
    $port = "5432";
    $dbname = "nome_do_banco";
    $user = "usuario";
    $password = "senha";
    
    // Conecta ao banco de dados PostgreSQL
    $conexao = pg_connect("host=$host port=$port dbname=$dbname user=$user password=$password");

    // Verifica a conexão
    if (!$conexao) {
        die("Conexão falhou: " . pg_last_error());
    }

    // Obtém dados do formulário
    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $senha = password_hash($_POST["senha"], PASSWORD_DEFAULT); // Recomendado: armazenar senhas criptografadas

    // Insere dados no banco de dados
    $sql = "INSERT INTO usuarios (nome, email, senha) VALUES ('$nome', '$email', '$senha')";
    $resultado = pg_query($conexao, $sql);

    if ($resultado) {
        echo "Cadastro realizado com sucesso!";
    } else {
        echo "Erro no cadastro: " . pg_last_error($conexao);
    }

    // Fecha a conexão
    pg_close($conexao);
}
?>
    <div class="container">
        <h2 class="mt-4">Cadastro de Cliente</h2>
    
        <form action="/processar_cadastro.php" method="post">
          <div class="form-group">
            <label for="nome">Nome:</label>
            <input type="text" class="form-control" id="nome" name="nome" required>
          </div>
    
          <div class="form-group">
            <label for="email">E-mail:</label>
            <input type="email" class="form-control" id="email" name="email" required>
          </div>
    
          <div class="form-group">
            <label for="telefone">Telefone:</label>
            <input type="tel" class="form-control" id="telefone" name="telefone" required>
          </div>
    
          <div class="form-group">
            <label for="endereco">Endereço:</label>
            <input type="text" class="form-control" id="endereco" name="endereco" required>
          </div>
    
          <div class="form-group">
            <label for="senha">Senha:</label>
            <input type="password" class="form-control" id="senha" name="senha" required>
          </div>
    
          <button type="submit" class="btn btn-primary">Cadastrar</button>
        </form>
      </div>
    
      <!-- Adicione os scripts do Bootstrap -->
      <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    
      <footer class="mt-4 mb-4">
        <div class="container">
          <div class="row">
            <div class="col-md-8">
              <p>
                <a href="">HOME</a>
                <a href="">RECURSOS</a>
                <a href="">BENEFÍCIOS</a>
                <a href="">PREÇOS</a>
              </p>
            </div>
              <div class="col-md-4 d-flex justify-content-end">
                <a href="https://www.instagram.com/" class="text-secondary ml-3">
                  <i class="fab fa-instagram"></i> <!-- Ícone do Instagram -->
                </a>
              
                <a href="https://www.facebook.com/" class="text-secondary ml-3">
                  <i class="fab fa-facebook"></i> <!-- Ícone do Facebook -->
                </a>
                             
                <a href="https://twitter.com/" class="text-secondary ml-3">
                  <i class="fab fa-twitter"></i> <!-- Ícone do Twitter -->
                </a>
    
                <a href="https://www.youtube.com/"  class="text-secondary ml-3">
                  <i class="fab fa-youtube"></i> <!-- Ícone do YouTube -->
                </a>
              
              </div>
          </div>
        </div>
    </footer>
  <script>
    // Adicionando validação de formulário Bootstrap
    (function() {
      'use strict';
      window.addEventListener('load', function() {
        var forms = document.getElementsByClassName('needs-validation');
        var validation = Array.prototype.filter.call(forms, function(form) {
          form.addEventListener('submit', function(event) {
            if (form.checkValidity() === false) {
              event.preventDefault();
              event.stopPropagation();
            }
            form.classList.add('was-validated');
          }, false);
        });
      }, false);
    })();
  </script>

 
    <!-- JavaScript (Opcional) -->
    <!-- jQuery primeiro, depois Popper.js, depois Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
 
<!-- Code injected by live-server -->
<script>
	// <![CDATA[  <-- For SVG support
	if ('WebSocket' in window) {
		(function () {
			function refreshCSS() {
				var sheets = [].slice.call(document.getElementsByTagName("link"));
				var head = document.getElementsByTagName("head")[0];
				for (var i = 0; i < sheets.length; ++i) {
					var elem = sheets[i];
					var parent = elem.parentElement || head;
					parent.removeChild(elem);
					var rel = elem.rel;
					if (elem.href && typeof rel != "string" || rel.length == 0 || rel.toLowerCase() == "stylesheet") {
						var url = elem.href.replace(/(&|\?)_cacheOverride=\d+/, '');
						elem.href = url + (url.indexOf('?') >= 0 ? '&' : '?') + '_cacheOverride=' + (new Date().valueOf());
					}
					parent.appendChild(elem);
				}
			}
			var protocol = window.location.protocol === 'http:' ? 'ws://' : 'wss://';
			var address = protocol + window.location.host + window.location.pathname + '/ws';
			var socket = new WebSocket(address);
			socket.onmessage = function (msg) {
				if (msg.data == 'reload') window.location.reload();
				else if (msg.data == 'refreshcss') refreshCSS();
			};
			if (sessionStorage && !sessionStorage.getItem('IsThisFirstTime_Log_From_LiveServer')) {
				console.log('Live reload enabled.');
				sessionStorage.setItem('IsThisFirstTime_Log_From_LiveServer', true);
			}
		})();
	}
	else {
		console.error('Upgrade your browser. This Browser is NOT supported WebSocket for Live-Reloading.');
	}
	// ]]>
</script>
</body>
</html>