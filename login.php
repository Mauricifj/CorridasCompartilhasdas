<?php
    require_once("jsandcss.php");
?>
<body>
<div class="container col-xs-12 col-sm-offset-2 col-sm-8 col-md-offset-3 col-md-6 col-lg-offset-4 col-lg-4">
    <br />
    <div class="panel panel-default">
        <div class="panel-heading">
            <h1>Login</h1>
        </div>
        <div class="panel-body">
            <div class="form-group">
                <div class="input-group">
                            <span class="input-group-addon">
                                <i class="glyphicon glyphicon-user" style="width: auto"></i>
                            </span>
                    <input id="txtUsuario" runat="server" type="text" class="form-control" name="user" placeholder="Usuário" required="" />
                </div>
            </div>
            <div class="form-group">
                <div class="input-group">
                            <span class="input-group-addon">
                                <i class="glyphicon glyphicon-lock" style="width: auto"></i>
                            </span>
                    <input id="txtSenha" runat="server" type="password" class="form-control" name="password" placeholder="Senha" required="" />
                </div>
            </div>
            <button id="btnLogin" runat="server" class="btn btn-default" style="width: 100%">
                ENTRAR <i class="glyphicon glyphicon-off"></i>
            </button>
        </div>
    </div>
</div>


</body>
</html>