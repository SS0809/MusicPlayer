<?php
 session_start();
 include "database.php";
    $conn = mysqli_connect($servername,
        $username, $password, $database);

    if($conn) {
    //  echo "success";
           //$sql = "INSERT INTO `player`( `timeline`, `username`, `ytcode`) VALUES ('0:00','saurabhss','M7lc1UVf-VE')";
        $sql= "SELECT * FROM player WHERE username = 'saurabhss';";
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

<body onload="bgchange();">
  <div class="player">
    <div id="player" class="internal-player-image"></div>
    <div class="internal-timeline" id="internal-timeline">------------------------------------------</div>
    <div class="internal-name">
      <h3 class="title" id="title">you are listenning the music</h3>

    </div>
    <!-- <button class="internal-player-left">
        </button>-->
    <button class="internal-player-main" id="internal-player-main" onclick="change();">
      <div class="internal-player-play" id="play">
      </div>
    </button>
    <button class="internal-player-right" id="internal-player-right" onclick="even();">SYNC</button>
  </div>
  </div>
  likes: <div id="like"></div>
  <div class="hide"></div>

  <script src="script.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
  <script>
    // 2. This code loads the IFrame Player API code asynchronously.
    var tag = document.createElement('script');
var  vid = playlistarr[<?php echo $temp;?>] , temp = '<?php echo $temp;?>' , too = 0 ;
    tag.src = "https://www.youtube.com/iframe_api";
    var firstScriptTag = document.getElementsByTagName('script')[0];
    firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

    // 3. This function creates an <iframe> (and YouTube player)
    //    after the API code downloads.
    var player, value = 0;

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
        location.href = "index.php";

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
        type: "GET",
        url: "backend.php",
        dataType: "html",
        success: function (data) {
               if (vid != playlistarr[data] ) {
                vid = playlistarr[data];
          titlechange2(playlistarr[data]);
    player.loadVideoById(playlistarr[data], "small");
         gettimeline();
            //alert("if");
       }
       else
       {
        gettimeline();
       }
          return data;
        }
      });
    }
        function gettimeline() {
      $.ajax({
        type: "PUT",
        url: "backend.php",
        dataType: "html",
        success: function (dat) {
         player.seekTo(dat, true);
           player.playVideo();
              //alert("else");
              // alert(dat);
          return dat;
        }
      });
    }

    function even() {
      value++;
      if (value % 2 != 0) {
        document.getElementById('internal-player-right').style.background = "green";
        getstatus();
      }
      //document.getElementById('internal-player-right').style.background = "#656565";
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