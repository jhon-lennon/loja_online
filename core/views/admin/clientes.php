

<div class="container">
    <div class="row mt-5 " style="margin-bottom: 60px;">
        <h4 class="text-center my-2"><?= $titulo ?></h4>
        <hr>
        <div class="col-3">
            <div class="alert alert-primary text-center" role="alert">Todos  <a href="?a=clientes">ver</a></div>
            <div class="alert alert-success text-center" role="alert">Ativos  <a href="?a=clientes_ativos">ver</a></div>
            <div class="alert alert-warning text-center" role="alert">Inativos <a href="?a=clientes_inativos">ver</a></div>
            <div class="alert alert-danger text-center" role="alert">Excluidos <a href="?a=clientes_excluidos">ver</a> </div>
            


        </div>

        <div class="col-9 ">
            <?php if(count($clientes) == 0):?>
                <h4 class="text-center">Nenhum resultado</h4>
            <?php else: ?>
        <table class="table table-primary" id="tabela-vendas">
            <thead>
                <tr>
                    <th scope="col">Nome</th>
                    <th scope="col">Email</th>
                    <th scope="col">Telefone</th>
                    <th scope="col">Status</th>
                    <th scope="col">Detalhes</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($clientes as $cliente) : ?>
                    <tr>
                        <td><?= $cliente->nome ?></td>
                        <td><?= $cliente->email ?></td>
                        <td><?= $cliente->telefone ?></td>
                        <td>
                        <?php if($cliente->ativo == 0  && $cliente->deleted_at == 0):?>
                            <span class="text-danger">Inativo</span>
                        <?php elseif($cliente->ativo == 1 ): ?>
                            <span class="text-success">Ativo</span>
                        <?php elseif($cliente->deleted_at != 0 ): ?>
                            <span class="text-danger">Excluido</span>
                        <?php endif; ?>
                        </td>
                        <td><a href="?a=compra_detalhes&cod_c=<? $compra->codigo_compra ?>">Detalhes</a></td>
                    </tr>
                <?php endforeach; ?>

            </tbody>
        </table>
        <?php endif; ?>


           

            <pre>

<?php print_r($clientes); ?>
</pre>
        </div>