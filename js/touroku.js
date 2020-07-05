<script src="js/touroku.html"></script>
document.getElementById('button').onclick = function(){
  var address = document.getElementById('value').value;
  var reg = /^[A-Za-z0-9]{1}[A-Za-z0-9_.-]*@{1}[A-Za-z0-9_.-]{1,}\.[A-Za-z0-9]{1,}$/;
  if (reg.test(address)) {
    console.log("正しい");
  } else {
    console.log("間違っている");
  }
}