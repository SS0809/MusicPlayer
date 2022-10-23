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
