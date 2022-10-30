<?php
session_start();
if($_SERVER["REQUEST_METHOD"] == "POST") {
  $_SESSION['username'] =  $_POST["user"];
}
if (empty($_SESSION['username'])) {
    header("Location:root.html");
}
 include "database.php";
    $conn = mysqli_connect($servername,
        $username, $password, $database);
    $user_name  = $_SESSION['username'] ;
    if($conn) {
        $sql= "SELECT * FROM player WHERE username = '$user_name';";
      $result = mysqli_query($conn, $sql); 
        $num = mysqli_num_rows($result);
   while($row = mysqli_fetch_assoc($result)) {
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
    <h1 class="h11">ROOT</h1>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script> 
    <script src="script.js"></script>
        <script>
            document.body.style.background = "linear-gradient(135deg,rgba(155,81,224) 40%,rgba(6,147,227,1) 100%)";
            var  temp = '<?php echo $temp;  ?>';
            var vector = [] , vid = playlistarr[temp]   , too = 0 ;
      var tag = document.createElement('script');
      tag.src = "https://www.youtube.com/iframe_api";
      var firstScriptTag = document.getElementsByTagName('script')[0];
      firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);
      var player , value = 0;
      function onYouTubeIframeAPIReady() {
        player = new YT.Player('player', {
          height: '250',
          width: '230',
          videoId: vid,
          playerVars: {
            'playsinline': 1,
            'controls':0,
            suggestedQuality:'small',
          },
          events: {
            'onReady': onPlayerReady,
            'onStateChange': onPlayerStateChange
          }
        });
      }
      function onPlayerReady(event) {
      player.setPlaybackRate("small");
        event.target.playVideo();//play video
                  player.setLoop(true);          
      }
      var done = false;
      function onPlayerStateChange(event) {
        if (event.data == YT.PlayerState.PLAYING && !done) {
          //setTimeout(stopVideo, 6000);
          //console.log(player.getCurrentTime());
          //console.log(player.getDuration());
           // updateStatus(player.getCurrentTime()+1); 
          done = true;
        }
        if(event.data == YT.PlayerState.PAUSED)
        {
                 //updateStatus(player.getCurrentTime()); 
             //alert(player.getCurrentTime());
        }
        else if(event.data == YT.PlayerState.ENDED)
        {
    
              updatetemp(temp);
              //updateplay();
        }
      }
            function recursionn(){
                if (value%2!=0) {
                 //console.log("hi");
                 document.getElementById('internal-player-right').style.background="green";
               updateStatus(player.getCurrentTime()+0.32);    
               //updateplay();    
                 setTimeout(recursionn, 100);
             }
      }
      function tr10()
      {
             updateStatus(player.getCurrentTime()+0.32-10);  
             player.seekTo(player.getCurrentTime()+0.32-10, true);
             player.playVideo(); 
      }
      function tf10()
      {
             updateStatus(player.getCurrentTime()+0.32+10);  
             player.seekTo(player.getCurrentTime()+0.32+10, true);
             player.playVideo(); 
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
        //status_val = JSON.stringify({a: status_val, b: username});
          //  var username = readCookie("username");
                var username = '<?php echo $user_name  ?>';
         console.log(status_val);
    $.ajax({
        type: "POST",
        url: "backend.php",
        data: {timeline: username, status: status_val},
        success: function (result) {
            //result = JSON.parse(result);
       // alert(result);
        }
    });
}

function updatetemp(status_val) {
    //"a5BsZ1MrhXc";
    //var username = readCookie("username");
    var username = '<?php echo $user_name  ?>';
    $.ajax({
        type: "POST",
        url: "backend.php",
        data: {temp_update: username, statuss: status_val},
        success: function (result) {
                // alert(result);
        }
    });
}
function resetplay() {
  updatetemp('0');
  updateStatus('0');
  temp=0;
    var status_val = playlistarr[temp];
    //updateplay();
    redirect();
}
function nextplay() {
  temp = parseInt(temp);
  temp++;
  updatetemp(temp);
    var status_val =   playlistarr[temp];
    //updateplay();
    redirect();
}
function redirect()
{
  setInterval(() => {
    location.href = "root.php"; 
  }, 500);
}
let s = '';
function timeline()
{
  too = player.getCurrentTime()/player.getDuration();
  too = too * 100 ;
  too = parseInt(too, 10); 
      document.getElementById("timeline").value = too;
}
setInterval(() => {
  timeline();
}, 2000);
       document.getElementById('volume').value = player.getVolume();
       
function chng(){
       var volume =   document.getElementById('volume').value;
       //console.log(volume);
       player.setVolume(volume);
     }
     </script>
</head>
<body>
    <div class="grid-player">
    <div class="grid-player-child">
     <div id="player" class="internal-player-image"></div>
     <div class="internal-timeline" id="internal-timeline">
           <input type="range" value="100" min="0" max="100" id="timeline" style="width:100%;"disabled>
     </div>
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
    <button class="internal-player-right" id="internal-player-right" onclick="even();" style="background-color:#e8e872;">SYNC</button>
   </div>
   <div class="grid-child">
       <button class="internal-player-right" onclick="resetplay();" style="background-color:#f70a4d;">RESET
        </button>
   </div>
   <div class="grid-child">
    <button class="internal-player-right" id="internal-player-right2" onclick="nextplay();">NEXT</button>
   </div>
    <div class="grid-child">
       <button class="internal-player-right" onclick="tr10();"><<10
        </button>
   </div>
   <div class="grid-child">
    <button class="internal-player-right" id="internal-player-right2" onclick="tf10();">10>></button>
   </div>
</div>
<div class ="range">
      <label>VOLUME<br>
      <input type="range" value="100" min="0" max="100" id="volume" style="width:100%;" onchange="chng();">
      </label>
      <br>
      <label>BRIGTHNESS<br>
      <input type="range" value="100" min="20" max="100" style="width:100%;" id="brightness" onchange="bri();">
      </label>
</div>
  <div class="hide"></div>
  <script type="text/javascript">
    function list(textnode){
  const newDiv = document.createElement("div");
  const newContent = document.createTextNode(textnode);
  newDiv.appendChild(newContent);
  const currentDiv = document.getElementById("updatedAt");
  document.body.insertBefore(newDiv, currentDiv);
  }
  titlechange();
  </script>
</head>
<body>
<div class='preloadr' id='preloadr'></div>
  </body>
</html>
