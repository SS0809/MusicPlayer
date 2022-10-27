<?php
/* session_start();
 include "database.php";
    $conn = mysqli_connect($servername,
        $username, $password, $database);
    if($conn) {
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
}*/
?>
    <!DOCTYPE html>
<html>

<head>
    <title>music player</title>
    <h1 class="h11">ROOT</h1>
    <!--<meta http-equiv="refresh" content="100">-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script> 
    <script src="script.js"></script>
        <script>
            document.body.style.background = "linear-gradient(135deg,rgba(155,81,224) 30%,rgba(6,147,227,1) 100%)";
            var  temp = '0';
            var vector = [] , vid = playlistarr[temp]   , too = 0 ;
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
               updateStatus(player.getCurrentTime()+0.468);    
               //updateplay();    
                 setTimeout(recursionn, 100);
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
        //status_val = JSON.stringify({a: status_val, b: username});
    $.ajax({
        type: "POST",
        url: "backend.php",
        data: {timeline: username, status: status_val},
        success: function (result) {
            //result = JSON.parse(result);
         console.log(result);
        }
    });
}
/*function //updateplay() {
    //"a5BsZ1MrhXc";
   // var status_val =   document.getElementById('code').value;
   var status_val =   playlistarr[temp];
    //vector.push(status_val);
    //list(status_val);
    $.ajax({
        type: "POST",
        url: "backend.php",
        data: {play_update: true, status: status_val},
        success: function (result) {
        }
    });
   // location.href = "admin.php"; 
}*/
function updatetemp(status_val) {
    //"a5BsZ1MrhXc";
    $.ajax({
        type: "POST",
        url: "backend.php",
        data: {timeline: username, status: status_val},
        success: function (result) {
                 alert(result);
        }
    });
}
function resetplay() {
  updatetemp('0');
  temp=0;
    var status_val = playlistarr[temp];
    //updateplay();
    redirect();
}
function nextplay() {
  temp = parseInt(temp);
  temp += 1 ;
  updatetemp(temp);
    var status_val =   playlistarr[temp];
    //updateplay();
    redirect();
}
function redirect()
{
  setInterval(() => {
    location.href = "admin.php"; 
  }, 500);
}
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
function readCookie(name) {
    //credit https://stackoverflow.com/q/5639346
    var nameEQ = name + "=";
    var ca = document.cookie.split(';');
    for(var i=0;i < ca.length;i++) {
        var c = ca[i];
        while (c.charAt(0)==' ') c = c.substring(1,c.length);
        if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length);
    }
    return null;
}
function remdiv()
{
   var remdiv = document.getElementById('remdiv');
   remdiv.style.display = "none";
}
function username()
{
if(readCookie("username"))
{
    //alert(readCookie("username"));
    remdiv();
}
else
{
    var username  =  document.getElementById('username').value;
    document.cookie = "username="+username+"";
}
}
    </script>
</head>
<body onload="username();">
    <div id="remdiv">
        <label>USERNAME
        <input type="text" id="username">
        </label>
        <button onclick="username();">CHECK</button>
    </div>
    <div class="player">
    <div id="player" class="internal-player-image"></div>
            <div class="internal-timeline" id = "internal-timeline">----------------------------------------</div>
        <div class="internal-name">
            <h3 class="title" id="title">you are running the music</h3>

        </div>
        <button class="internal-player-left" onclick="resetplay();">RESET
        </button>
            <button class="internal-player-main" onclick="change();"> 
            <div class="internal-player-play" id="play"> 
            </div></button>
            <button class="internal-player-right" id="internal-player-right" onclick="even();">SYNC</button>
            <button class="internal-player-right" id="internal-player-right2" onclick="nextplay();">NEXT</button>
    </div>
    </div>
       <!-- likes: <div id="like"></div>-->
    <!--<div>
        <input type="text" name="code" id="code">

    </div>-->
    <div id="updatedAt" class="hide"></div>
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
  </body>
</html>
<!--
    <div id="player"></div>
<script>
  var tag = document.createElement('script');
  tag.src = "https://www.youtube.com/iframe_api";
  var firstScriptTag = document.getElementsByTagName('script')[0];
  firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);
  var player;
  function onYouTubePlayerAPIReady() {
    player = new YT.Player('player', {
      height: '390',
      width: '640',
     loadPlaylist:{
        listType:'playlist',
        list:['M7lc1UVf-VE','M7lc1UVf-VE'],
        index:0,
        suggestedQuality:'small'
     },
      events: {
        'onReady': onPlayerReady,
        'onStateChange': onPlayerStateChange
      }
    });
  }
  function onPlayerReady(event) {
           event.target.loadPlaylist(['M7lc1UVf-VE','M7lc1UVf-VE']);
  }
  var done = false;
  function onPlayerStateChange(event) {
    if (event.data == YT.PlayerState.PLAYING && !done) {
     // setTimeout(stopVideo, 60000);
      done = true;
    }
  }
  function stopVideo() {
    player.stopVideo();
  }
</script>-->