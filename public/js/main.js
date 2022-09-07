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