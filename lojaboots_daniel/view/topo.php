<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#"><i class="fas fa-shopping-cart text-warning"></i> Etec Vendas</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#conteudoNavbarSuportado" aria-controls="conteudoNavbarSuportado" aria-expanded="false" aria-label="Alterna navegação">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="conteudoNavbarSuportado">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="index.php?classe=HomeController&metodo=abrir_home"><i class="fas fa-home"></i> Início</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-barcode"></i> Produtos
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="index.php?classe=ProdutoController&metodo=abrir_cadastro"> <i class="fas fa-plus"></i> Cadastrar</a>
          <a class="dropdown-item" href="index.php?classe=ProdutoController&metodo=abrir_consulta"><i class="fas fa-search"></i> Consultar</a>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-boxes"></i> Categorias
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="index.php?classe=CategoriaController&metodo=abrir_cadastro"> <i class="fas fa-plus"></i> Cadastrar</a>
          <a class="dropdown-item" href="index.php?classe=CategoriaController&metodo=abrir_consulta"><i class="fas fa-search"></i> Consultar</a>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-users"></i> Usuários
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="index.php?classe=UsuarioController&metodo=abrir_cadastro"> <i class="fas fa-plus"></i> Cadastrar</a>
          <a class="dropdown-item" href="index.php?classe=UsuarioController&metodo=abrir_consulta"><i class="fas fa-search"></i> Consultar</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="index.php?classe=UsuarioController&metodo=sair"><i class="fas fa-sign-out-alt"></i> Sair</a>
      </li>
    </ul>
  </div>
</nav>