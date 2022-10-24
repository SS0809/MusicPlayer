  var a=0;
function change()
{
    //alert("hi");
 a++;
 if(a%2!=0){
    document.getElementById('play').className = "internal-player-pause";
    }
    else
{
    document.getElementById('play').className = "internal-player-play";
}
   // console.log(a);
}
function bgchange(){
 const arr=["#4d0606","#4d0622","#4d063e","#40064d","#29064d","#0c064d","#06304d","#064d4b","#064d2c","#0e4d06","#394d06","#4d4206","#4d2506","#4d0606","#340e47"];
   var i=0,j=14;
  setInterval(function () {
  //document.body.style.backgroundColor = arr[i];
  document.body.style.background = "linear-gradient("+i*15+"deg,  "+arr[j]+" ,black,"+arr[i]+")";
  i++;j--;
  if(i==14){bgchange ();}
  }, 800); 
  
 // console.log(i);
}


/*


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
          height: '0',
          width: '0',
          videoId: 'M7lc1UVf-VE',
          playerVars: {
            'playsinline': 1,
            'autoplay':1
          },
          events: {
            'onReady': onPlayerReady,
            'onStateChange': onPlayerStateChange
          }
        });
      }

      // 4. The API will call this function when the video player is ready.
      function onPlayerReady(event) {
        event.target.playVideo();//play video
        player.seekTo(230, true);//seek to a time
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
      }
      function stopVideo() {
        player.stopVideo();
      }*/
