// console.log(window.location.pathname);

if (window.location.pathname == '/') {
  document.getElementById('heading-back').classList.toggle('d-none');
}

// if (window.location.pathname == '/detail') {
//   const detailImg = document.getElementById('detail-img');
//   const headingBack = document.getElementById('heading-back');

//   // console.log('Test')

//   // console.log(detailImg.getElementsByTagName('img')[0]);

//   detailImg.addEventListener('click', () => {

//     console.log('test')

//     detailImg.getElementsByTagName('img')[0].classList.toggle('zoom-image');
//     detailImg.getElementsByTagName('img')[0].classList.toggle('unzoom-image');
//     detailImg.classList.toggle('z-0');
//     detailImg.classList.toggle('z-3');
//     headingBack.classList.toggle('d-none');


//     // detailImg.getElementsByTagName('img')[0].classList.toggle('position-absolute');
//     // detailImg.getElementsByTagName('img')[0].classList.toggle('position-relative');
//   });
// }


// console.log(window.innerHeight)
// document.getElementById('navbar').style.marginTop = (window.innerHeight / 4) + 'px';