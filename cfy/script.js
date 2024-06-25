function sendToWhatsapp(){
  let number = "254701339573";

  let name = document.getElementById('name').value;
  let email = document.getElementById('email').value;
  let message = document.getElementById('message').value;

  var url = "https://wa.me/" + number + "?text="
  + "Name : " +name+ "%0a"
  + "Number : " +email+ "%0a"
  + "Message : " +message+ "%0a%0a";

  if (name === "" || email === "" || message === "") {
    alert("Please fill in all required fields.");
    return;
  }


  alert("Message sent! You will be directed shortly.");
  setTimeout(function() {
    window.open(url, '_blank').focus();
  }, 3000);
  window.open(url, '_blank').focus();
}