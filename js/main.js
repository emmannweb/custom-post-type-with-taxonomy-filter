$(document).ready( function() {

$('.grid').isotope({
 itemSelector: '.grid-item',
});

// filter items on button click
$('.filter-button-group').on( 'click', 'li', function() {
 var filterValue = $(this).attr('data-filter');
 $('.grid').isotope({ filter: filterValue });
 $('.filter-button-group li').removeClass('active');
 $(this).addClass('active');
});
   })
