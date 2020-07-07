<script src="js/touroku.html"></script>
function logSubmit(event) {
  var address = document.getElementById('mail');
  var reg = /^[A-Za-z0-9]{1}[A-Za-z0-9_.-]*@{1}[A-Za-z0-9_.-]{1,}\.[A-Za-z0-9]{1,}$/;
  if (reg.test(address)) {
  alert("正しいから佐文ッとします");
  } else {
  alert("間違ってるからキャンセルします");
  event.preventDefault();
  }

}
const form = document.getElementById('tera');
form.addEventListener('submit', logSubmit);