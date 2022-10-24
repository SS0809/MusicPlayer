<?php
 session_start();
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "music";
    $conn = mysqli_connect($servername,
        $username, $password, $database);
if($_SERVER["REQUEST_METHOD"] == "POST") {
   $id = $_POST["id"];
}
    if($conn) {
    //  echo "success";
           //$sql = "INSERT INTO `player`( `timeline`, `username`, `ytcode`) VALUES ('0:00','saurabhss','M7lc1UVf-VE')";
        $sql= "SELECT * FROM player WHERE id = '2';";
      $result = mysqli_query($conn, $sql); 
        $num = mysqli_num_rows($result);
   while($row = mysqli_fetch_assoc($result)) {
   $name = $row["username"];
   $id = $row["id"];
  $ytcode =  $row["ytcode"];
$timeline =  $row["timeline"];

  }
    }
    else {
        die("Error". mysqli_connect_error());
}
?>
    <!DOCTYPE html>
<html>

<head>
    <title>music player</title>
    <!--<meta http-equiv="refresh" content="100">-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="style.css">
        <script>
// 2. This code loads the IFrame Player API code asynchronously.
      var tag = document.createElement('script');

      tag.src = "https://www.youtube.com/iframe_api";
      var firstScriptTag = document.getElementsByTagName('script')[0];
      firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

      // 3. This function creates an <iframe> (and YouTube player)
      //    after the API code downloads.
      var player;
      function onYouTubeIframeAPIReady() {
        player = new YT.Player('player', {
          height: '250',
          width: '230',
          videoId: '<?php echo $ytcode;?>',
          playerVars: {
            'playsinline': 1,
            'controls':0,
          },
          events: {
            'onReady': onPlayerReady,
            'onStateChange': onPlayerStateChange
          }
        });
      }
                  player.setLoop(true);

      // 4. The API will call this function when the video player is ready.
      function onPlayerReady(event) {
        event.target.playVideo();//play video
        player.seekTo(<?php echo $timeline;?>, true);//seek to a time
      }

      // 5. The API calls this function when the player's state changes.
      //    The function indicates that when playing a video (state=1),
      //    the player should play for six seconds and then stop.
      var done = false;
      function onPlayerStateChange(event) {
        if (event.data == YT.PlayerState.PLAYING && !done) {
          //setTimeout(stopVideo, 6000);
          done = true;
        }
        if(event.data == YT.PlayerState.PAUSED)
        {
             alert(player.getCurrentTime());
        }
      }
      function stopVideo() {
        player.stopVideo();
      }
    </script>
    <script src="script.js"></script>
</head>
<body onload="bgchange();">
    <div class="player">
    <div id="player" class="internal-player-image"></div>
            <div class="internal-timeline">------------------------------------------</div>
        <div class="internal-name">
            <h3 class="username" id="username">some music is running</h3>

        </div>
        <button class="internal-player-left">
        </button>
            <button class="internal-player-main" onclick="change();"> 
            <div class="internal-player-play" id="play"> 
            </div></button>
                <button class="internal-player-right"></button>
    </div>
    </div>
    <div class="hide"></div>
</body>

</html>