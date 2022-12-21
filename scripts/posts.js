const postInput = document.getElementById("userspost");
const postError = document.getElementById("postFormError");
const postForm = document.getElementById("postForm");

postInput.addEventListener("blur", validateCharLength);
postForm.addEventListener("submit", validateSubmit);

let postCount = 0;

function validateCharLength(event) {
  postCount = event.target.value.length;
  if (event.target.value.length > 280) {
    postError.style.color = "red";
    postError.innerText =
      "Your post must be 280 characters or less, please reduce your post.";
  } else {
    postError.innerText = "";
  }
}

function validateSubmit(event) {
  if (postCount === 0) {
    postError.style.color = "red";
    postError.innerText = "Your post is empty, please write something.";
    event.preventDefault();
  }
  if (postCount > 280) {
    postError.style.color = "red";
    postError.innerText =
      "Your post must be 280 characters or less, please reduce your post.";
    event.preventDefault();
  }
}
