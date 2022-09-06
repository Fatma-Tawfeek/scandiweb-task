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

    if(!$('#size').val()){
        alert('Please, submit required data');
    }
    $('#size').attr('required', '');
    $('#weight').removeAttr("required");
    $('#height').removeAttr("required");
    $('#width').removeAttr("required");
    $('#length').removeAttr("required");

} else if (value == 'Book') {
    bookForm.removeClass('hidden');
    dvdForm.addClass('hidden');
    furnitureForm.addClass('hidden');

    $('#size').removeAttr("required");
    $('#weight').attr('required', '');
    $('#height').removeAttr("required");
    $('#width').removeAttr("required");
    $('#length').removeAttr("required");
} else if (value == 'Furniture') {
    furnitureForm.removeClass('hidden');
    dvdForm.addClass('hidden');
    bookForm.addClass('hidden');

    $('#size').removeAttr("required");
    $('#weight').removeAttr("required");
    $('#height').attr('required', '');
    $('#width').attr('required', '');
    $('#length').attr('required', '');

}
});