<?php

use core\classes\Functions;

 ?>

<div class="container">
    <div class="row" style="margin-bottom: 60px;">
    <div class="col-12">
    <h1 class="text-center">Detalhes do cliente</h1>
    <span>                <div class="text-end">
    <?php if($cliente->ativo == 0  && $cliente->deleted_at == 0):?>
                        <button class="btn btn-warning">Inativo</button>
                        <?php elseif($cliente->ativo == 1 ): ?>
                            <button class="btn btn-success">ativo</button>
                        <?php elseif($cliente->deleted_at != 0 ): ?>
                            <button class="btn btn-danger">Excluido</button>
                        <?php endif; ?>
                    <a class="btn btn-primary" data-bs-toggle="modal" href="#exampleModalToggle" role="button">Alterar status</a>
                </div>
                <!--apresenta modal para o envio do codigo de rastreio-->
                <div class="modal fade" id="exampleModalToggle" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalToggleLabel">Alterar sstatus</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                       <div class="col-4"><a href="?a=cliente_ativo&id_cli=<?=Functions::encriptar($cliente->id_cliente)?>" class="btn btn-success" t>Ativo</a></div> 
                       <div class="col-4"><a href="?a=cliente_inativo&id_cli=<?=Functions::encriptar($cliente->id_cliente)?>" class="btn btn-warning">Inativo</a></div> 
                       <div class="col-4"><a href="?a=cliente_excluido&id_cli=<?=Functions::encriptar($cliente->id_cliente)?>" class="btn btn-danger">Excluido</a></div> 
                       </div>
                            </div>

                            <div class="modal-footer">
                              
                             
                            </div>
                        </div>
                    </div>
                </div></span>
        <br>
    </div>
    <div class="col-6">
        <h3 class="text-center">Dados</h3>
        <hr><br>
        <p>Nome: <?=$cliente->nome?></p>
        <p>Email: <?=$cliente->email?></p>
        <p>Telefone: <?=$cliente->telefone?></p>
        <p>cliente desde: <?=date('d/m/Y - H:i',strtotime($cliente->created_at))?></p>
        <p>Status:   <?php if($cliente->ativo == 0  && $cliente->deleted_at == 0):?>
                            <span class="text-warning">Inativo</span>
                        <?php elseif($cliente->ativo == 1 ): ?>
                            <span class="text-success">Ativo</span>
                        <?php elseif($cliente->deleted_at != 0 ): ?>
                            <span class="text-danger">Excluido</span>
                        <?php endif; ?></p>
        <p>Total de compras: <?=count($compras)?></p>
        <p>Endereços cadastrado: <?=count($endereco)?></p>
        <p> <button class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasWithBothOptions" aria-controls="offcanvasWithBothOptions"><i class="fas fa-address-card"></i> Endereços cadastrados</button>
            <div class="offcanvas offcanvas-start" data-bs-scroll="true" tabindex="-1" id="offcanvasWithBothOptions" aria-labelledby="offcanvasWithBothOptionsLabel">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="offcanvasWithBothOptionsLabel">Endereços</h5>
                    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <?php foreach ($endereco as $ender) : ?>
                        <div>
                            <div class="card w-75">
                                <div class="card-body">
                                    <h5 class="card-title"></b><?= $ender->nome ?></h5>
                                    <p class="card-text"></p>
                                    <p><b>CEP: </b><?= $ender->cep ?></p>
                                    <p><b>Estado: </b><?= $ender->estado ?></p>
                                    <p><b>Cidade: </b><?= $ender->cidade ?></p>
                                    <p><b>Bairro: </b><?= $ender->bairro ?></p>
                                    <p><b>Rua: </b><?= $ender->rua ?></p>
                                    <p><b>Numero: </b><?= $ender->numero ?></p>
                                    <p><b>complemento: </b><?= $ender->complemento ?></p>
                                    <hr>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div></p>
    </div>
    <div class="col-6">
        <h3 class="text-center">Compras do cliente</h3>
        <hr><br>
        <table class="table table-primary">
                <thead>
                    <tr>
                        <th scope="col">Data</th>
                        <th scope="col">Cod. Compra</th>
                        <th scope="col">Status</th>
                        <th scope="col">Detalhes</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($compras as $compra ):?>
                    <tr>
                        <td><?= date('d/m/Y - H:i',strtotime($compra->data_compra))?></td>
                        <td><?=$compra->codigo_compra ?></td>
                        <td><?=$compra->status ?></td>
                        
                        <td><a href="?a=compra_detalhes&id_compra=<?= Functions::encriptar($compra->id_compra) ?>&id_cli=<?= Functions::encriptar($cliente->id_cliente)?>&cod_compra=<?= Functions::encriptar($compra->codigo_compra) ?>">Detalhes</a></td>

                    </tr>
                    <?php endforeach; ?>
                  
                </tbody>
            </table>
    </div>

    
        
</div>
</div>
