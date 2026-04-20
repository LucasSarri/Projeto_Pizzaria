<?php
    include_once("process/conn.php");
    include_once("templates/header.php");
?>

<div id="main-container-dashboard">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>Gerenciar pedidos:</h2>
            </div>
            <div class="col-md-12 table-container">
                 <table class="table">
                    <thead>
                        <tr>
                            <th scope="col"><span>Pedido</span>#</th>
                            <th scope="col"><span>Borda</span>#</th>
                            <th scope="col"><span>Massa</span>#</th>
                            <th scope="col"><span>Sabores</span>#</th>
                            <th scope="col"><span>Status</span>#</th>
                            <th scope="col"><span>Ações</span>#</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>#1</td>
                            <td>Cheddar</td>
                            <td>Tradicional</td>
                            <td>4 Queijos</td>
                            <td>
                                <form action="process/orders.php" method="POST" class="form-group update-form">
                                    <input type="hidden" name="type" id="update">
                                    <input type="hidden" name="id" id="bbb">
                                    <select name="status" class="form-control status-input">
                                        <option value="">Entrega</option>
                                    </select>
                                    <button type="submit" class="update-btn">
                                        <i class="fa-solid fa-rotate"></i>
                                    </button>
                                </form>
                            </td>
                            <td>
                                <form action="process/orders.php" method="POST">
                                    <input type="hidden" name="type" id="delete">
                                    <input type="hidden" name="id" id="aaa">
                                    <button type="submit" class="delete-btn">
                                        <i class="fa-solid fa-times"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    </tbody>
                 </table>   
            </div>
        </div>
    </div>
</div>

<?php
    include_once("templates/footer.php")
?>