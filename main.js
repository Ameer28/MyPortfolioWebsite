$('#writeToMeModal').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget)
  var recipient = button.data('whatever')
  var modal = $(this)
  modal.find('.modal-title').text('New message to ' + recipient)
  modal.find('.modal-body input').val(recipient)
})

const writeToMeForm = document.getElementById('writeToMeForm');
const nameField = document.getElementById('nameField');
const emailField = document.getElementById('emailField');
const submitButton = document.getElementById('submitButton');

nameField.addEventListener('keyup', function () {
  isValidName = nameField.checkValidity();

  if (isValidName) {
    submitButton.disable = false;
  } else {
    submitButton.disable = true;
  }
});

emailField.addEventListener('keyup', function (event) {
  isValidEmail = emailField.checkValidity();

  if (isValidEmail) {
    submitButton.disable = false;
  } else {
    submitButton.disable = true;
  }
});

submitButton.addEventListener('click', function (event) {
  writeToMeForm.submit();
});

