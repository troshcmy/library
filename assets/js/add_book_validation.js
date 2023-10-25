// add_book_validation.js

document.addEventListener('DOMContentLoaded', function() {
  const addBookButton = document.getElementById('addBookButton');
  const bookForm = document.getElementById('addBookForm');
  const titleInput = document.getElementById('title');
  const publisherInput = document.getElementById('publisher');
  const authorInput = document.getElementById('author');
  const languageInput = document.getElementById('language');
  const categoryInput = document.getElementById('category');
  const imageInput = document.getElementById('image');
  const errorMessages = document.getElementById('errorMessages');

  addBookButton.addEventListener('click', function(event) {
    event.preventDefault();
    if (validateForm()) {
      // Очищаем див перед отправкой формы
      errorMessages.innerHTML = '';
      bookForm.submit();
    }
  });

  function validateForm() {
    const title = titleInput.value;
    const publisher = publisherInput.value;
    const author = authorInput.value;
    const language = languageInput.value;
    const category = categoryInput.value;

    const maxTitleLength = 30;
    const maxAuthorLength = 30;

    const errors = [];

    if (title.trim() === '' || title.length > maxTitleLength) {
      errors.push(`Invalid book title. Maximum length is ${maxTitleLength} characters.`);
    }

    if (author.trim() === '' || author.length > maxAuthorLength) {
      errors.push(`Invalid author name. Maximum length is ${maxAuthorLength} characters.`);
    }

    // Добавляем проверки для других полей
    if (publisher.trim() === '') {
      errors.push('Publisher is required.');
    }

    if (language.trim() === '') {
      errors.push('Language is required.');
    }

    if (category.trim() === '') {
      errors.push('Category is required.');
    }

    // Проверка изображения (добавьте свои критерии)
    if (!imageInput.files || imageInput.files.length === 0) {
      errors.push('Image is required.');
    }

    if (errors.length > 0) {
      // Отображаем ошибки в диве
      errorMessages.innerHTML = errors.join('<br>');
      return false;
    }

    return true;
  }
});
