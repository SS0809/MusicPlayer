  var a=0;
function change()
{
    //alert("hi");
 a++;
 if(a%2!=0){
    document.getElementById('play').className = "internal-player-pause";
    player.playVideo();
    }
    else
{
    document.getElementById('play').className = "internal-player-play";
    player.pauseVideo();
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
