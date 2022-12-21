const mobNumInput = document.getElementById("mobileNumInput");
const mobNumError = document.getElementById("mobNumError");

mobNumInput.addEventListener("blur", validateMobileNumber);

function validateMobileNumber(event) {
  const input = event.target;
  const numRegex = /^\d+$/;

  if (!numRegex.test(input.value)) {
    mobNumError.style.color = "red";
    mobNumError.innerText =
      "Mobile number must only contain numbers, and no spaces.";
  } else {
    mobNumError.innerText = "";
  }
}
