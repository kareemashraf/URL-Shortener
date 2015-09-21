   
   <!-- Mindvalley Test "URL Shortener" fully created using native PHP simply with no framework used -->
<html>
  <head> 
    <title>URL Shortener</title>
    <!--use the CDN to save time as its a test-->
      <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css" rel="stylesheet">
       <style type="text/css">
        input.form-control {
          width: 300px;

         }
          .input-group {
            width: 500px;
          }
        img.img {
           margin-top: 50px;
          }            
       </style>
        </head>
          <body>
            <center>
            <img src="<?php echo base_url(); ?>/logo.jpg" alt="Mindvalley" class="img">
              <h3>Please Insert your Long URL : </h3></br>
          <form method="post">
                 <div class="input-group">
                   <input type="text" name="link" class="form-control" placeholder="Enter your Link here ...">
                   <span class="input-group-btn">
                   <input class="btn btn-success" name="submit" type="submit">Go!</button>
                   <?php //echo $info; ?>
                 </span>

                </div>

          </form>
         
        </center>
       </body>
</html>
