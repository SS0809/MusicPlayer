  var a = 0;

  function change() {
    //alert("hi");
    a++;
    if (a % 2 != 0) {
      document.getElementById('play').className = "internal-player-pause";
      player.playVideo();
    } else {
      document.getElementById('play').className = "internal-player-play";
      player.pauseVideo();
    }
    // console.log(a);
  }
  function bgchange() {
    const arr = ["#8a1e1e", "#8a301e", "#8a421e", "#8a541e", "#8a661e", "#8a781e",
      "#8a8a1e", "#064d4b", "#788a1e", "#668a1e", "#548a1e", "#428a1e", "#308a1e",
      "#1e8a1e", "#1e8a30", "#1e8a42", "#1e8a54", "#1e8a66", "#1e8a78", "#1e8a8a",
      "#1e788a", "#1e668a", "#1e548a", "#1e428a", "#1e308a", "#1e1e8a", "#301e8a",
      "#421e8a", "#541e8a", "#661e8a", "#781e8a", "#8a1e8a", "#8a1e78", "#8a1e66",
      "#8a1e54", "#8a1e42", "#8a1e30", "#8a1e1e"
    ];
    var i = 0,
      j = 36;
    setInterval(function () {
      //document.body.style.backgroundColor = arr[i];
      document.body.style.background = "linear-gradient(" + i * 5 + "deg,  " + arr[j] + " ,black," + arr[i] + ")";
     //  document.body.style.background = "linear-gradient(135deg,rgba(6,147,227,1) 0%,rgba(155,81,224) 100%)";
      i++;
      j--;
      if (i == 36) {
        bgchange();
      }
    }, 800);

    // console.log(i);
  }

  function httpGet(theUrl) {
    //https://www.w3docs.com/snippets/javascript/how-to-make-http-get-request-in-javascript.html
    let xmlHttpReq = new XMLHttpRequest();
    xmlHttpReq.open("GET", theUrl, false);
    xmlHttpReq.send(null);
    return xmlHttpReq.responseText;
}
function titlechange() {
  //var vid = 'a5BsZ1MrhXc';
  var vidlink = 'https://www.googleapis.com/youtube/v3/videos?part=snippet&id=' + vid + '&key=AIzaSyAekxE11gZ3vPmLD87H7EclGNT44BqkDVE';
  var vidlink2 = 'https://www.googleapis.com/youtube/v3/videos?part=statistics&id=' + vid + '&key=AIzaSyAekxE11gZ3vPmLD87H7EclGNT44BqkDVE';
  const aa2 = JSON.parse(httpGet(vidlink));
  const aa22 = JSON.parse(httpGet(vidlink2));
  var s2 = aa2.items[0].snippet.title;
  var s3 = aa22.items[0].statistics.likeCount;
  //console.log(vid);
  document.getElementById("title").innerHTML = s2;
  document.getElementById("like").innerHTML = s3;
}
function titlechange2(data) {
  //var vid = 'a5BsZ1MrhXc';
  var vidlink = 'https://www.googleapis.com/youtube/v3/videos?part=snippet&id=' + data + '&key=AIzaSyAekxE11gZ3vPmLD87H7EclGNT44BqkDVE';
  const aa2 = JSON.parse(httpGet(vidlink));
  var s2 = aa2.items[0].snippet.title;
  //console.log(vid);
  document.getElementById("title").innerHTML = s2;
}
  function disableScroll() {
    // Get the current page scroll position
    scrollTop =
      window.pageYOffset || document.documentElement.scrollTop;
    scrollLeft =
      window.pageXOffset || document.documentElement.scrollLeft,

      // if any scroll is attempted,
      // set this to the previous value
      window.onscroll = function () {
        window.scrollTo(scrollLeft, scrollTop);
      };
}
var playlistarr = [];
  var playlist = 'PLKw0genvrqvkuwSACwjvroI4I9IlZ9ERz', maxResults = 50;
  var playlistlink = 'https://www.googleapis.com/youtube/v3/playlistItems?part=snippet&maxResults='+maxResults+'&playlistId=' + playlist + '&key=AIzaSyAekxE11gZ3vPmLD87H7EclGNT44BqkDVE';
  const aaa2 = JSON.parse(httpGet(playlistlink));
  for(var i = 0 ,s2;i<maxResults;i++){
   s2 = aaa2.items[i].snippet.resourceId.videoId;
  playlistarr.push(s2);
  //console.log(s2);
}


function bri(){
   console.log( 0.01 * document.getElementById("brightness").value); 
 document.getElementById("preloadr").style.opacity = 1-(0.01 * document.getElementById("brightness").value);
   }
