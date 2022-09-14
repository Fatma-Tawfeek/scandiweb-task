//Form
let dvdForm = $('#dvd-form');
let bookForm = $('#book-form');
let furnitureForm = $('#furniture-form');
let submitBtn = document.getElementsByName('submit');

$('#productType').change(function() {
let value = $(this).find('option:selected').val();
let dvdForm = $('#dvd-form');
let bookForm = $('#book-form');
let furnitureForm = $('#furniture-form');
if (value == 'Dvd') {
    dvdForm.removeClass('d-none');
    bookForm.addClass('d-none');
    furnitureForm.addClass('d-none');

} else if (value == 'Book') {
    bookForm.removeClass('d-none');
    dvdForm.addClass('d-none');
    furnitureForm.addClass('d-none');

} else if (value == 'Furniture') {
    furnitureForm.removeClass('d-none');
    dvdForm.addClass('d-none');
    bookForm.addClass('d-none');
}
});