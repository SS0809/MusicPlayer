<style>
        .pre-loader.hidden {
            animation: fadeOut 5s; /** change to 1s */
            animation-fill-mode: forwards;
        }

        @keyframes fadeOut {
            100% {
                opacity: 0;
                visibility: hidden;
            }
        }
div.pre-loader{
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  z-index: 100; /** make sure this is the highest value compared to all other divs **/
  background: black;
  display: flex;
  justify-content: center;
  align-items: center;
  height: 100%;
  width: 100%;
}
div.a {
  width: 145px;
  height: 60px;
  background-color:#060617; 
  border-radius: 30px;
  animation-name: logo1;
  animation-duration: 10s;
  box-shadow:0 0 35px blue;
  z-index: 100; /** make sure this is the highest value compared to all other divs **/
}
@keyframes logo1
{
  from {
  -ms-transform: rotate(0deg); /* IE 9 */
  transform: rotate(0deg);
  }
  to {
  -ms-transform: rotate(360deg); /* IE 9 */
  transform: rotate(360deg);
  }
}
.pre-loader.hidden {
    animation: fadeOut 5s; 
    animation-fill-mode: forwards;
}
@keyframes fadeOut {
    100% {
        opacity: 0;
        visibility: hidden;
    }
}
    </style>
</head>
<body>
<div class='pre-loader'>
    <div class="a">
       <div class="a">
              <div class="a">
                     <div class="a"></div>
              </div>
       </div>
  </div>
</div>

<!-- js to hide preloader loading is done -->
<script type='text/javascript'>
    window.addEventListener('load', function () {
        document.querySelector('.pre-loader').className += ' hidden';
    });
</script>
