<script src="js/touroku.html">

var address = "test123@test.com";
  var reg = /^[A-Za-z0-9]{1}[A-Za-z0-9_.-]*@{1}[A-Za-z0-9_.-]{1,}\.[A-Za-z0-9]{1,}$/;
  if (reg.test(address)) {
    console.log("正しい");
  } else {
    console.log("間違っている");
  }
  
</script>