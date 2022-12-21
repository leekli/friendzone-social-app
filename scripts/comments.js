const commentInput = document.getElementById("userscomment");
const commentError = document.getElementById("commentFormError");
const commentForm = document.getElementById("commentForm");

commentInput.addEventListener("blur", validateCommentCharLength);
commentForm.addEventListener("submit", validateCommentSubmit);

let commentPostCount = 0;

function validateCommentCharLength(event) {
  commentPostCount = event.target.value.length;
  if (event.target.value.length > 280) {
    commentError.style.color = "red";
    commentError.innerText =
      "Your comment must be 280 characters or less, please reduce your comment.";
  } else {
    commentError.innerText = "";
  }
}

function validateCommentSubmit(event) {
  if (commentPostCount === 0) {
    commentError.style.color = "red";
    commentError.innerText = "Your post is empty, please write something.";
    event.preventDefault();
  }
  if (commentPostCount > 280) {
    commentError.style.color = "red";
    commentError.innerText =
      "Your comment must be 280 characters or less, please reduce your comment.";
    event.preventDefault();
  }
}
