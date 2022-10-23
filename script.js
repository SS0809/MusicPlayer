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
 const arr=["red","blue","#1C2A3D","green","pink","yellow","black"];
   var i=0;
  setInterval(function () {
  //document.body.style.backgroundColor = arr[i];
  document.body.style.background = "linear-gradient(110deg,  black,"+arr[i]+")";
  i++;
  if(i==6){bgchange();}
  }, 1200); 
 // console.log(i);
}
