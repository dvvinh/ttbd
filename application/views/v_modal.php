<!DOCTYPE html>
<html lang ="">
    <head>
        <title>Modal</title>
        <meta charset = "UTF-8">
        <!-- Bootstrap CSS -->
        <link href="http://localhost/ttbd/bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
        <script type="text/javascript" language="javascript" src="http://localhost/ttbd/javascripts/global.js"></script>
    </head>
    <body>
        <div class="container">
            <div class="h1">
                MODAL
            </div>
        </div>
       <!-- Button trigger modal -->
        <button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
          Launch demo modal
        </button>
       <div class="modal fade" id= "myModal">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">
                  <span aria-hidden="true">&times;</span>
                  <span class="sr-only">Close</span></button>
              <h4 class="modal-title">Modal title</h4>
            </div>
            <div class="modal-body">
              <p>One fine body&hellip;</p>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary">Save changes</button>
            </div>
          </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
      </div><!-- /.modal -->

        <script src="http://localhost/ttbd/jquery/jquery-3.1.0.js"></script>
        <script src="http://localhost/ttbd/bootstrap/js/bootstrap.min.js"></script>
    </body>
</html>