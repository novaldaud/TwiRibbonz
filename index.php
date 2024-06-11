<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Twibbon</title>
    <script src = "https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js">
    </script>
    <script src = "https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.js">
    </script>
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
    Twibbon
    <select id = "twibbonimg">
      <option value="img/—Pngtree—twibbonize template red white merah_8370328.png">Teacher Day</option>
      <option value="img/youthchildrenday.png">Youth Children Day</option>
      <option value="img/bicycleday.png">Bicycle Day</option>
    </select>
    <br>
    Photo <input type="file" id="photoimg" value=""> <br>
    Width <input type="text" id = "width" value="100%">
    Height <input type="text" id = "height" value="100%">
    Top <input type="text" id = "top" value="0px">
    Left <input type="text" id = "left" value="0px">

    <hr>

    <div class="card">
      <h2>Pick A Photo</h2>
      <div class="twibbon">
        <img src="" id = "twibbon" alt="">
        <img src="" id = "photo" alt="">
      </div>
      <a href="#" id = "download">Download</a>
    </div>

    <script type="text/javascript">
      var photoimg = "";
      // Upload image to the directory
      $(document).ready(function() {
          $('#photoimg').change(function(){
              var formData = new FormData();
              var files = $('#photoimg')[0].files;
              formData.append('photo', files[0]);
              $.ajax({
                  url: "upload.php",
                  type: "POST",
                  data: formData,
                  contentType: false,
                  processData: false,
                  success: function(response){
                    photoimg = response;
                  }
              });
          });
      });

      // Real time preview twibbon
      setInterval(function(){
        preview();
      }, 0);

      function preview(){
        var twibbonimg = $('#twibbonimg').val();
        var width = $('#width').val();
        var height = $('#height').val();
        var top = $('#top').val();
        var left = $('#left').val();
        $("#photo").attr("src", photoimg);
        $('#twibbon').attr("src", twibbonimg);
        $('#photo').css("width", width);
        $('#photo').css("height", height);
        $('#photo').css("top", top);
        $('#photo').css("left", left);
      }

      // Download twibbon
      var element = $(".twibbon");
      $("#download").on('click', function(){
        html2canvas(element, {
          onrendered: function(canvas) {
            var imageData = canvas.toDataURL("image/png");
            var newData = imageData.replace(/^data:image\/png/, "data:application/octet-stream");
            $("#download").attr("download", "image.png").attr("href", newData);
          }
        });
      });
    </script>

<!-- footer start-->
<footer class="footer">
          <div class="container-fluid">
            <div class="row">
              <div class="col-md-12 footer-copyright text-center">
                <p class="mb-0">&copy <?=date('Y');?> Noval MR. Daud</p>
              </div>
            </div>
          </div>
        </footer>
      </div>
    </div>


  </body>
</html>
