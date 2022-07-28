<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0 user-scalable=no">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

  <title>Ensayo</title>

  <style>
    body {
      background-color: #F8F8F8;
    }

    #partitura {
      width: 100%;
      height: calc(100vh - 136px);
    }
    iframe {
      height: 100%;
      width: 100%;
      }

    .player {
      width: 100%;
      height: 60px;
    }

    .botonAtras {
      position: fixed;
      z-index: 9999999;
      top: 20px;
      left: 20px;
      text-align: center;
      background-color: #transparent;
    }
  </style>
</head>
<body>
  <div id="partitura">
    <iframe frameborder="0" src="https://drive.google.com/file/d/{{$_GET['partitura']}}/preview">
    </iframe>
  </div>
  <div class="player">
    <iframe frameborder="0" src="https://drive.google.com/file/d/{{$_GET['audio']}}/preview">
    </iframe>
  </div>
  <div class="botonAtras">
    <button type="button" class="btn btn-primary" aria-label="Left Align" onclick="history.back()">
      <span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span>
      Atrás
    </button>
  </div>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>  
  <script>
    window.setTimeout(function() {
        $(".disclaimer").remove();
        }, 1);

    document.getElementById("partitura").style.cssText="height: " + (window.innerHeight - 65) + "px;"

    // We listen to the resize event
    window.addEventListener('resize', () => {
      document.getElementById("partitura").style.cssText="height: " + (window.innerHeight - 65) + "px;"
    });
x
  </script>
</body>
</html>