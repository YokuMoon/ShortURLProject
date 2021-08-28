function saveFunc() {
  var copyText = document.getElementById("input_short_url");
  copyText.select();
  document.execCommand("copy");
  alert("Copied the text: " + copyText.value);
}