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

$( "#product_form" ).submit(function( event ) {

    if( !$('#product_form input').val() ) {
          alert('Please, submit required data');
    }

    if(!$.isNumeric($('#product_form input[type=number]').val()) ) {
          alert('Please, provide the data of indicated type');
    }
});