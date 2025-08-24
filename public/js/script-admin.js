const flashMessage = (function () {
  const flashMessage = document.querySelectorAll('.flash-message');

  if (flashMessage.length > 0) {
    flashMessage.forEach(flash => {

      const Toast = Swal.mixin({
        toast: true,
        position: "bottom-end",
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,

        didOpen: (toast) => {
          toast.onmouseenter = Swal.stopTimer;
          toast.onmouseleave = Swal.resumeTimer;
          const timer = Swal.getPopup().querySelector("b");
          timerInterval = setInterval(() => {
            timer.textContent = `${Swal.getTimerLeft()}`;
          }, 100);
        },

        willClose: () => {
          clearInterval(timerInterval);
        }

      });
      Toast.fire({
        background: "#f3f4f6",
        icon: flash.getAttribute('data-icon') ?? "question",
        title: flash.getAttribute('data-message') ?? 'Insert the title Alert!',
        showClass: {
          popup: `animate__animated animate__fadeInUp animate__faster`
        },
        hideClass: {
          popup: `animate__animated animate__fadeOutDown animate__slower`
        }
      });

    });
  }
})();

document.querySelectorAll('.confirmation').forEach(button => {

  button.addEventListener('click', function (e) {

    const form = this.closest('form');

    console.log(form);

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

document.getElementById('profile-image').onchange = function () {
  this.closest('form').submit();
}
