let usernameRef = document.getElementById("username");
let loginBtn = document.getElementById("login");

let isUsernameValid = () => {
  /* Username should be more than 2 characters. Should begin with alphabetic character , can contain numbers */
  const usernameRegex = /^[a-zA-Z][a-zA-Z0-9]{2,20}/gi;
  return usernameRegex.test(usernameRef.value);
};

usernameRef.addEventListener("input", () => {
  if (!isUsernameValid()) {
    messageRef.style.visibility = "hidden";
    usernameRef.style.cssText =
      "border-color: #fe2e2e; background-color: #ffc2c2";
  } else {
    usernameRef.style.cssText =
      "border-color: #34bd34; background-color: #c2ffc2";
  }
});

loginBtn.addEventListener("mouseover", () => {
  //If username is empty, then do this..
  if (!isUsernameValid()) {
    //Get the current position of login btn
    let containerRect = document
      .querySelector(".container")
      .getBoundingClientRect();
    let loginRect = loginBtn.getBoundingClientRect();
    let offset = loginRect.left - containerRect.left;
    console.log(offset);
    //If the button is on the left hand side.. move it to the the right hand side
    if (offset <= 100) {
      loginBtn.style.transform = "translateX(16.25em)";
    }
    //Vice versa
    else {
      loginBtn.style.transform = "translateX(0)";
    }
  }
});