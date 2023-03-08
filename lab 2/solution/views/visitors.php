<?php 

$visitors = get_visitors();
?>


<html>
    <head>
        <title> Visitors </title>
    </head>

    <body>
        <div>
          <h1 style="text-decoration:underline;text-align:center">Visitors</h1>
        </div>

        <div>
          
          <?php foreach($visitors as $visitor): ?>
            <div>
              <p style="margin: 2px 0;">Visit Date: <?= $visitor[0]?></p>
              <p style="margin: 2px 0;">IP Address: <?= $visitor[1]?></p>
              <p style="margin: 2px 0;">Email: <?= $visitor[2]?></p>
              <p style="margin: 2px 0;">Name: <?= $visitor[3]?></p>
    </div>
            <hr style="margin: 20px 0px;">
          <?php endforeach ?>
        </div>

    </body>

</html>