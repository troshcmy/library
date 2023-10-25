// admin_functions.js

function sendAjaxRequest(url, successCallback, failureCallback) {
  var xhr = new XMLHttpRequest();
  xhr.open("GET", url, true);
  xhr.onreadystatechange = function() {
      if (xhr.readyState == 4) {
          if (xhr.status == 200) {
              var response = JSON.parse(xhr.responseText);
              successCallback(response);
          } else {
              console.error("Error: " + xhr.status + ", " + xhr.statusText);
              failureCallback();
          }
      }
  };
  xhr.send();
}

function handleSuccess(response) {
  if (response.status === 'success') {
      window.location.reload();
  } else {
      alert(response.message);
  }
}

function handleFailure() {
  alert("An error occurred. Please try again.");
}

function borrowBook(bookId) {
  sendAjaxRequest("../backend/process_borrow.php?book_id=" + bookId, handleSuccess, handleFailure);
}

function returnBook(bookId) {
  sendAjaxRequest("../backend/process_return.php?book_id=" + bookId, handleSuccess, handleFailure);
}

function editBook(bookId) {
  window.location.href = "./edit_book.php?book_id=" + bookId;
}

function deleteBook(bookId) {
  if (confirm("Are you sure you want to delete this book?")) {
      sendAjaxRequest("../backend/process_delete_book.php?book_id=" + bookId, handleSuccess, handleFailure);
  }
}
