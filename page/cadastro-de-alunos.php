<?php
        function __autoload($classe){
            require_once '../classes/' .$classe .('.php');
        }
?>
    
<!DOCTYPE>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <title>Cadastro de Aluno</title>
    <link rel="stylesheet" href="../source/css/bootstrap.css">
    <link rel="stylesheet" href="../source/fonts/glyphicons-halflings-regular.svg">
    <link rel="stylesheet" href="../source/css/style.css">
    <link rel="stylesheet" href="../source/fonts/glyphicons-halflings-regular.eot">
    <link rel="stylesheet" href="../source/js/bootstrap.js">
    

</head>
<body>
    
    
    <!--menu-->
    <div class="container">
        <!--metodo inserir-->
        <?php
        
        $usuario= new Usuarios();
        if(isset($_POST['cadastrar'])):
            $nome = $_POST['nome'];
            $email= $_POST['email'];
            $telefone=$_POST['telefone'];
            $usuario->setNome($nome);
            $usuario->setEmail($email);
            $usuario->setTelefone($telefone);
            $usuario->insert();
            
        endif;
    ?>
        <!--Fim metodo inserir-->
        <ul class="nav nav-tabs">
            <li role="presentation" class="active"><a href="../index.php">Home</a></li>
            <li role="presentation"><a href="../page/cadastro-de-alunos.php">Aluno</a></li>
            <li role="presentation"><a href="../page/cadastro-turma.php">Turma</a></li>
            <li role="presentation"><a href="../page/cadastro-disciplina.php">Disciplina</a></li>
        </ul>
    <!--fim menu-->
    <!--Atualização-->
    <?php 
    
        if(isset($_POST['atualizar'])):
            
            $id= $_POST['id'];
            $nome= $_POST['nome'];
            $email= $_POST['email'];
            $telefone= $_POST['telefone'];
            
            $usuario->setNome($nome);
            $usuario->setEmail($email);
            $usuario->setTelefone($telefone);
            
            $usuario->update($id);
            
        endif;
         
    ?>
    <!--Fim Atualização-->
    
    <!--Ação Deletar-->
    <?php 
    
        if(isset($_GET['acao']) && $_GET['acao'] == 'deletar'):
            
            $id= (int)$_GET['id'];
            $usuario->delete($id);
        endif;
        
    ?>
    <!--Fim de Ação Deletar-->
    
    <!--Ação Editar-->
    <?php 
    
        if(isset($_GET['acao']) && $_GET['acao'] == 'editar'){
            
            $id =(int)$_GET['id'];
            $resultado = $usuario-> find($id);
    ?>
    <!--Fim de Ação Editar-->
    
    <!--Formulario de Atualizações-->
    
    <form method="post" action="" class="form">
        <div class="input-prepend">
            <span class="add-on"><i class="glyphicon glyphicon-user"></i></span>
            <input type="text" name="nome" value="<?php echo $resultado->nome; ?>" placeholder="Nome: ">
        </div>
        <div class="input-prepend">
            <span class="add-on"><i class="glyphicon glyphicon-envelope"></i></span>
            <input type="text" name="email" value="<?php echo $resultado->email; ?>" placeholder="Email: ">
        </div>
        <div class="input-prepend">
            <span class="add-on"><i class="glyphicon glyphicon-phone"></i></span>
            <input type="text" name="telefone" value="<?php echo $resultado->telefone; ?>" placeholder="Telefone: ">
        </div>
        <input type="hidden" name="id" value="<?php echo $resultado->id; ?>"
        <br>
        
        <input type="submit" name="atualizar" value="Atualizar" />
       
    </form>
    
    <!--Fim de Atualizações-->
        <?php }else{?>
    
    <!--Formulario de Cadastro-->
    
    <form method="post" action="" class="form">
        <div class="input-prepend">
            <span class="add-on"><i class="glyphicon glyphicon-user"></i></span>
            <input type="text" name="nome" value="" placeholder="Nome: ">
        </div>
        <div class="input-prepend">
            <span class="add-on"><i class="glyphicon glyphicon-envelope"></i></span>
            <input type="text" name="email" value="" placeholder="Email: ">
        </div>
        <div class="input-prepend">
            <span class="add-on"><i class="glyphicon glyphicon-phone"></i></span>
            <input type="text" name="telefone" value="" placeholder="Telefone: ">
        </div>
        <br>
        
        <input type="submit" name="cadastrar" value="Cadastrar" />
       
    </form>
    
    <!--Fim de Cadastro-->
        <?php } ?>
    
    <!--Tabela de Cadastro-->
    
    <table class="table table-hover">
			
	<thead>
            <tr>
		<th>ID:</th>
		<th>Nome:</th>
		<th>E-mail:</th>
                <th>Telefone:</th>
		<th>Ações:</th>
            </tr>
        </thead>
			
	<?php foreach ($usuario->findAll() as $key => $value): ?>		

	<tbody>
            <tr>
                <td><?php echo $value->id; ?></td>
		<td><?php echo $value->nome; ?></td>
		<td><?php echo $value->email; ?></td>
                <td><?php echo $value->telefone; ?></td>
                
            <td>
		<?php echo "<a href='index.php?acao=editar&id=" .$value->id."'>Editar</a>";?>
                <?php echo "<a href='index.php?acao=deletar&id=" .$value->id."'>Deletar</a>";?>
            </td>
            </tr>
	</tbody>

	<?php endforeach; ?>		

        </table>
    <!--Fim de Tabela-->
    
    
    
    
    
    
    <div class="mg footer">
        
        <p>&copy; Todos direitos reservados</p>
        
    </div>

	</div>


</body>
</html> 
    
