<html>
<head>

  <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.0/jquery.min.js"></script>
  <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.9/jquery-ui.min.js"></script>

  <style>
  #makeMeDraggable { margin: 50px; }

  #makeMeDraggable2 { margin-top: -123px; margin-left: 50px }

  </style>
  <script type="text/javascript">

$(init);

function init() {
  $('#makeMeDraggable').draggable({
             containment: '#content',
             cursor: 'move',
             drag: function() {
               var offset = $(this).offset();
               var xPos = offset.left;
               var yPos = offset.top;
               $('#posXa').attr({ value: xPos });
               $('#posYa').attr({ value: yPos });
             }
           }
    );

    $('#makeMeDraggable2').draggable({
               containment: '#content',
               cursor: 'move',
               drag: function() {
                 var offset = $(this).offset();
                 var xPos = offset.left;
                 var yPos = offset.top;
                 $('#posX').attr({ value: xPos });
                 $('#posY').attr({ value: yPos });
               }
             }
      );
}

  </script>

</head>

<body>
  <div id="content" style="margin: 200px; height: 173px;width: 173px; background: gray">
    <img id="makeMeDraggable" src="origin13280545623901.jpeg" />
    <img id="makeMeDraggable2" src="item12910194505103.png" />
  </div>

<?php

if(isset($_REQUEST['posX'])) {
  echo $_REQUEST['posX'];

  //MERGE IMAGES
  $icon     = imagecreatefrompng("item12910194505103.png");
  $original = imagecreatefromjpeg("origin13280545623901.jpeg");

  imagecopy($original, $icon, 0, 0, 0,0, 73, 73, 100);

  header('Content-Type: image/jpeg');

  imagejpeg($original,'merged.jpeg');

  header('Location: drag.php');

  imagedestroy($icon);
  imagedestroy($original);

} ?>
  <br/><br/>
    <form method='POST' action='merge.php' id='imgForm' enctype='multipart/form-data'>
      <input id="posX" name="posX" type="hidden" value="0" />
      <input id="posY" name="posY" type="hidden" value="0" />
      <input id="posXa" name="posXa" type="hidden" value="0" />
      <input id="posYa" name="posYa" type="hidden" value="0" />

      <input type='submit' name='upload_form_submitted' />
    </form>
</body>
</html>
