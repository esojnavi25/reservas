<html>
<!doctype html>
<head>
  <meta charset="utf-8">
  <title><?php echo $this->getTitle(); ?></title>
  <link href="//netdna.bootstrapcdn.com/bootswatch/3.1.1/cosmo/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="<?php echo $this->themePath."/css/bootstrap-dialog.min.css"; ?>">
  <link rel="stylesheet" href="<?php echo $this->themePath."/css/style.css"; ?>">

</head>
<body>
  <!-- Fixed navbar -->
      <div class="navbar navbar-default navbar-fixed-top" role="navigation">
        <div class="container">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Teatro</a>
          </div>
          <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
              <li class="active"><a href="#">Reservaciones</a></li>
              <li><a href="#">Cancelaciones</a></li>  
          </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>
  <div class="container">
