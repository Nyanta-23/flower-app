
console.log('test');
const popUp = function () {
  const popupMessage = document.querySelectorAll('.popup');

  if (popupMessage.length > 0) {
    popupMessage.forEach(popup => {
      Swal.fire({
        title: popup.getAttribute('data-title') ?? 'Insert the title!',
        text: popup.getAttribute('data-text') ?? 'Insert the text!',
        icon: popup.getAttribute('data-icon') ?? "question",
        confirmButtonText: 'Close'
      })
    })
  }
}

document.querySelectorAll('.confirmation').forEach(button => {

  console.log(button);

  button.addEventListener('click', function (e) {

    const form = this.closest('form');

    if (!form.reportValidity()) {
      return;
    }

    e.preventDefault();

    console.log(this.getAttribute('data-text'));

    Swal.fire({
      title: this.getAttribute('data-title') ?? "Are you sure?",
      text: this.getAttribute('data-text') ?? 'You wont be able to revert this!',
      icon: this.getAttribute('data-icon') ?? "warning",
      showCancelButton: true,
      confirmButtonColor: "#057a55",
      cancelButtonColor: "#d33",
      confirmButtonText: "Yes",
      cancelButtonText: "Cancel"
    }).then((result) => {
      if (result.isConfirmed) {
        form.submit();
      }
    });

  });

});
