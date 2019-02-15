<?php
// Requerimentos

require_once "cabecalho.php";
require_once "logica-usuario.php";

?>

<div class="container">
	<div class="row">

		<!-- começo bem-vindo -->
		<div class="col-md-12">

			<h1 class="display-2">Bem Vindo!</h1>

			<!-- começo está logado como... -->
			<?php if(usuarioEstaLogado()) { ?>
				<p class="text-success">Você está logado como <?= usuarioLogado() ?>
					<a href="logout.php">Deslogar</a>
				</p>

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