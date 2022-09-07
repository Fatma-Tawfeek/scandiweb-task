//Form
let submitBtn = document.getElementsByName('submit');

$('#productType').change(function() {
let value = $(this).find('option:selected').val();
let dvdForm = $('#dvd-form');
let bookForm = $('#book-form');
let furnitureForm = $('#furniture-form');
if (value == 'Dvd') {
    dvdForm.removeClass('hidden');
    bookForm.addClass('hidden');
    furnitureForm.addClass('hidden');

} else if (value == 'Book') {
    bookForm.removeClass('hidden');
    dvdForm.addClass('hidden');
    furnitureForm.addClass('hidden');

} else if (value == 'Furniture') {
    furnitureForm.removeClass('hidden');
    dvdForm.addClass('hidden');
    bookForm.addClass('hidden');
}
});

$(function() {
    // Initialize form validation on the registration form.
    // It has the name attribute "registration"
    $("#product_form").validate({
      // Specify validation rules
      rules: {
        // The key name on the left side is the name attribute
        // of an input field. Validation rules are defined
        // on the right side
        sku: "required",
        name: "required",
        price: {
          required: true,
          // Specify that email should be validated
          // by the built-in "email" rule
          number: true
        }
      },
      // Specify validation error messages
      messages: {
        sku: "Please enter your firstname",
        name: "Please enter your lastname",
        price: {
          required: "Please provide a password",
          number: "Your password must be at least 5 characters long"
        }
      },
      // Make sure the form is submitted to the destination defined
      // in the "action" attribute of the form when valid
      submitHandler: function(form) {
        form.submit();
      }
    });
  });