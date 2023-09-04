import './bootstrap';

$(".edit-form").on( "click tap", function() {
    console.log(this);
    $(".edit-employee").toggleClass('d-none');
});

function editEmployee(varrb) {
    return console.log(varrb);
}
