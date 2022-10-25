<?php
 session_start();
 include "database.php";
    $conn = mysqli_connect($servername,
        $username, $password, $database);
    $dsn = 'mysql:dbname='.$database.';host='.$servername.'';
$db = new PDO($dsn, $username, $password);
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['timeline_update'])) {
        $update = $db->prepare("UPDATE `player` SET `timeline` = ? WHERE `id` = '2' LIMIT 1;");
        $update->execute([$_POST['status']]);
        echo json_encode($_POST);
    }
}
 else {
    //echo json_encode(array());
}
    if($conn) {
    //  echo "success";
           //$sql = "INSERT INTO `player`( `timeline`, `username`, `ytcode`) VALUES ('0:00','saurabhss','M7lc1UVf-VE')";
        $sql= "SELECT * FROM player WHERE username = 'saurabhss';";
      $result = mysqli_query($conn, $sql); 
        $num = mysqli_num_rows($result);
   while($row = mysqli_fetch_assoc($result)) {
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
    <h1>ROOT</h1>
    <!--<meta http-equiv="refresh" content="100">-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script> 
        <script>
// 2. This code loads the IFrame Player API code asynchronously.
      var tag = document.createElement('script');

      tag.src = "https://www.youtube.com/iframe_api";
      var firstScriptTag = document.getElementsByTagName('script')[0];
      firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

      // 3. This function creates an <iframe> (and YouTube player)
      //    after the API code downloads.
      var player , value = 0;
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
      // 4. The API will call this function when the video player is ready.
      function onPlayerReady(event) {
        setPlaybackRate(small);
        event.target.playVideo();//play video
                  player.setLoop(true);          
      }

      // 5. The API calls this function when the player's state changes.
      //    The function indicates that when playing a video (state=1),
      //    the player should play for six seconds and then stop.
      var done = false;
      function onPlayerStateChange(event) {
        if (event.data == YT.PlayerState.PLAYING && !done) {
          //setTimeout(stopVideo, 6000);
          
            updateStatus(player.getCurrentTime()); 
          done = true;
        }
        if(event.data == YT.PlayerState.PAUSED)
        {
                 //updateStatus(player.getCurrentTime()); 
             //alert(player.getCurrentTime());

        }
        else if(event.data == YT.PlayerState.ENDED)
        {
                  location.href = "admin.php";

        }
      }
            function recursionn(){
                if (value%2!=0) {
                 //console.log("hi");
                 document.getElementById('internal-player-right').style.background="green";
                 updateStatus(player.getCurrentTime());         
                 setTimeout(recursionn, 80);
             }
      }
           function even()
      {
            value++;
       document.getElementById('internal-player-right').style.background="#656565";
            recursionn();
      }
      function stopVideo() {
        player.stopVideo();
      }
function updateStatus(status_val) {
    $.ajax({
        type: "POST",
        url: "admin.php",
        data: {timeline_update: true, status: status_val},
        success: function (result) {
        }
    });
}

    </script>
    <script src="script.js"></script>
</head>
<body onload="bgchange();">
    <div class="player">
    <div id="player" class="internal-player-image"></div>
            <div class="internal-timeline">------------------------------------------</div>
        <div class="internal-name">
            <h3 class="username" id="username">you are running the music</h3>

        </div>
        <button class="internal-player-left">
        </button>
            <button class="internal-player-main" onclick="change();"> 
            <div class="internal-player-play" id="play"> 
            </div></button>
                <button class="internal-player-right" id="internal-player-right" onclick="even();">SYNC</button>
    </div>
    </div>
    <div id="updatedAt" class="hide"></div>
</body>

</html>
