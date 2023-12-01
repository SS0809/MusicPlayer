<?php
session_start();
include "preload.php";
if($_SERVER["REQUEST_METHOD"] == "POST") {
  $_SESSION['username'] = $_POST["user"];
}
if (empty($_SESSION['username'])) {
    header("Location:leaf.html");
}
 include "database.php";
   $user_name = $_SESSION['username'];
 $conn = mysqli_connect($servername,
        $username, $password, $database);
    if($conn) {
        $sql= "SELECT * FROM player WHERE username = '$user_name';";
      $result = mysqli_query($conn, $sql); 
        $num = mysqli_num_rows($result);
   while($row = mysqli_fetch_assoc($result)) {
$timeline =  $row["timeline"];
$temp =  $row["temp"];
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
  <h1 class="h11">LEAF</h1>
  <!--<meta http-equiv="refresh" content="100">-->
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
<div class="grid-player">
    <div class="grid-player-child">
     <div id="player" class="internal-player-image"></div>
     <div class="internal-timeline" id="internal-timeline">------------------------------------------</div>
     <div class="internal-name">
      <h3 class="title" id="title">you are listenning the music</h3>
     </div>
    </div>
</div>
<div class="grid-container">
  <div class="grid-child">
    <button class="internal-player-main" id="internal-player-main" onclick="change();">
      <div class="internal-player-play" id="play">
      </div>
    </button>
  </div>
  <div class="grid-child">
    <button class="internal-player-right" id="internal-player-right" onclick="even();">SYNC</button>
   </div>
</div></div>
  <div class="hide"></div>
  <script src="script.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
  <script>
     document.body.style.background = "linear-gradient(135deg,#cc2b5e 0% , #753a88 60% )";
    // 2. This code loads the IFrame Player API code asynchronously.
    var tag = document.createElement('script');
var  vid = playlistarr[<?php echo $temp;?>] , temp = '<?php echo $temp;?>' , too = 0 ;
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
        videoId: vid,
        playerVars: {
          'playsinline': 1,
          'controls': 0,
        },
        events: {
          'onReady': onPlayerReady,
          'onStateChange': onPlayerStateChange
        }
      });
    }
    // 4. The API will call this function when the video player is ready.
    function onPlayerReady(event) {
      player.setPlaybackRate("small");
      event.target.playVideo(); //play video
      player.setLoop(true);
    }

    // 5. The API calls this function when the player's state changes.
    //    The function indicates that when playing a video (state=1),
    //    the player should play for six seconds and then stop.
    var done = false;

    function onPlayerStateChange(event) {
      if (event.data == YT.PlayerState.PLAYING && !done) {
        //setTimeout(stopVideo, 6000);     
        document.getElementById('play').className = "internal-player-pause";
        a++;
        done = true;
      }
      if (event.data == YT.PlayerState.PAUSED) {
        //getstatus();
        // alert(player.getCurrentTime());
        //alert(player.getDuration());
      } else if (event.data == YT.PlayerState.ENDED) {
        location.href = "leaf.php";

      }
    }

    function seeek(data,dat) {
     if (vid != playlistarr[data] ) {

    }
    else
    {
      alert("else");
      alert(dat);
     player.seekTo(dat, true);
           player.playVideo();
    }
    }
    function getstatus() {
      $.ajax({
        type: "POST",
        url: "backend.php",
        //data: {timeline_update: true, status: "saurabhss"},
        success: function (data) {
         console.log(data);
          data = JSON.parse(data);
               if (vid != playlistarr[data.a] ) {
                vid = playlistarr[data.a];
          titlechange2(playlistarr[data.a]);
    player.loadVideoById(playlistarr[data.a], "small");
             player.seekTo(data.b, true);
           player.playVideo();
            //alert("if");
       }
       else
       {
            player.seekTo(data.b, true);
           player.playVideo();
       }
          return data;
        }
      });
    }
    function even() {

        document.getElementById('internal-player-right').style.background = "green";
        getstatus();
        setInterval(wait, 500);
    }
    function wait()
    {
        document.getElementById('internal-player-right').style.background = "#656565";
    }
    function stopVideo() {
      player.stopVideo();
    }
    disableScroll();
    let s = '';
function timeline()
{
  too = player.getCurrentTime()/player.getDuration();
  too = too * 100 ;
  too = parseInt(too, 10); 
   //console.log(too); 
      let ss = '' ,  bo = false;;
   for(var i = 0 ;i<40;i++)
   {
    if(i*3 == too)
    {
      ss += '*+*';
      bo = true;
    }
    else
    {
      ss += '-';
    }
   }
   if (bo) {
    s=ss;
   }
   //console.log(s);
     bo = false;
   document.getElementById("internal-timeline").innerHTML = s;
}
setInterval(() => {
  timeline();
}, 2000);
  titlechange();
    </script>
</body>

</html>