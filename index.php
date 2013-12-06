<?php
set_time_limit(600);

require_once 'PasswordGenerator.php';
?>

<html>
    <meta charset="UTF-8">
    <head>
        <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.2/css/bootstrap.min.css" rel="stylesheet">
        <script type="text/javascript" src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
        <script type="text/javascript" src="//netdna.bootstrapcdn.com/bootstrap/3.0.2/js/bootstrap.min.js"></script>
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h1>Password Generator</h1>
                    <p><small>developed by Wildiney Di Masi (<a href="mailto:wildiney@gmail.com">wildiney@gmail.com</a>)</small></p>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <?php if (!filter_input_array(INPUT_POST)): ?>
                        <form action="" method="POST" class="form">
                            <div class="form-group">
                                <label>Quantidade de senhas a serem geradas</label>
                                <input type="text" class="form-control" name="amount" value="1"></textarea>
                            </div>
                            <div class="form-group">
                                <label>Quantidade de caracteres</label>
                                <input type="text" class="form-control" name="length"></textarea>
                            </div>
                            <div class="form-group">
                                <label>Hash base (caracteres que irão compor a senha)</label>
                                <input type="text" class="form-control" name="hash"></textarea>
                            </div>
                            <div class="form-group">
                                <input class="btn btn-success btn-lg" type="submit" value="Enviar">
                            </div>
                        </form>
                    <?php else : ?>
                        <?php
                        $amount  = (trim(filter_input(INPUT_POST, 'amount'))<1)  ? "1" : trim(filter_input(INPUT_POST, 'amount'));
                        $length  = (trim(filter_input(INPUT_POST,'length'))<1)   ? "8" : trim(filter_input(INPUT_POST,'length'));
                        $getHash = (strlen(trim(filter_input(INPUT_POST,'hash')))<1) ? "abcdefghijklmnopqrstuvxyz1234567890":filter_input(INPUT_POST,'hash');
                        $hash    = preg_replace("/\s+/", "", $getHash);
                        ?>
                        <table id="table-of-verification" class="table table-bordered table-hover table-striped">
                            <thead>
                                <tr>
                                    <th data-sort="string" class="center text-center" style="cursor: pointer">URL</th>
                                    <th data-sort="string" class="center text-center" style="cursor: pointer">Hash</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php for ($i = 0; $i < $amount; $i++): ?>
                                    <tr>
                                        <td><?php echo $i+1; ?></td>
                                        <td style="font-family: Courier">
                                            <?php
                                            $password = PasswordGenerator::generate($length,$hash);
                                            echo $password;
                                            ?>
                                        </td>
                                    </tr>
                                <?php endfor; ?>
                            </tbody>
                        </table>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </body>
</html>