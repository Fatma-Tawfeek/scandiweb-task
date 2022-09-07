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

$(document).ready(function(){
$( "#product_form" ).submit(function(event) {

    if( !$('#sku').val() ) {
          alert('Please, submit required data');
    }

    if( !$('#name').val() ) {
        alert('Please, submit required data');
  }

  if( !$('#price').val() ) {
    alert('Please, submit required data');
}

if( !$('#size').val() ) {
    alert('Please, submit required data');
}

if( !$('#weight').val() ) {
    alert('Please, submit required data');
}

if( !$('#height').val() ) {
    alert('Please, submit required data');
}

if( !$('#width').val() ) {
    alert('Please, submit required data');
}

if( !$('#length').val() ) {
    alert('Please, submit required data');
}

    if(!$.isNumeric($('#product_form input[type=number]').val()) ) {
          alert('Please, provide the data of indicated type');
    }

    event.preventDefault();

})
});