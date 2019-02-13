<?php 
require_once "cabecalho.php";
require_once "logica-usuario.php";
?>

<?php 
	if(isset($_GET["login"]) && $_GET["login"] == true) { ?>
		<p class="alert-success">Logado com sucesso!</p>
<?php } ?>

<?php
	if(isset($_GET["login"]) && $_GET["login"] == false) { ?> 
		<p class="alert-danger">Usuário ou senha invalido(a)!</p>
<?php } ?>

<?php
	if(isset($_GET["falhaDeSeguranca"])) {?>
		<p class="alert-danger">Você não tem acesso a essa funcionalidade!</p>
<?php } ?>
	



<div class="container">
	<div class="row">

		<!-- começo bem-vindo -->
		<div class="col-md-12">

			<h1 class="display-2">Bem Vindo!</h1>

			<!-- começo está logado como... -->
			<?php if(usuarioEstaLogado()) { ?>
				<p class="text-success">Você está logado como <?= usuarioLogado() ?></p>

		<!-- começo sem usuário logado -->
			<?php } else { ?>
			<!-- fim está logado como...-->

				</div>
				<!-- fim bem-vindo -->

				<!-- começo login -->
				<div class="col-md-12">
					<h2>Login</h2>
					<form action="login.php" method="post">
						<table class="table">
							<tr>
								<td>Email: </td>
								<td><input class="form-control" type="email" name="email"></td>
							</tr>

							<tr>
								<td>Senha: </td>
								<td><input class="form-control" type="password" name="senha"></td>
							</tr>
							<tr>
								<td>
									<button class="btn btn-primary">Login</button>
								</td>
							</tr>
						</table>
					</form>
				</div>
				<!-- fim login -->
	<?php } ?>
	<!-- fim sem usuário logado -->
	</div>
</div>


<?php require_once "rodape.php" ?>