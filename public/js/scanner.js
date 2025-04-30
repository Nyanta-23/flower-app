
import { Html5QrcodeScanner, Html5Qrcode, Html5QrcodeSupportedFormats } from "html5-qrcode";

let currentCameraId = null;
let html5QrCode = new Html5Qrcode('reader');
let isScannerPaused = false;
let countingCamera = 0;

const textScanner = document.getElementById('error-scanner');
const scanNav = document.getElementById('scan-navbar');
const navbar = document.getElementById('navbar');
const headingBack = document.getElementById('heading-back');
const reader = document.getElementById('reader');
const token = localStorage.getItem('token');
const scanUrl = "/api/scan";

if (html5QrCode.isScanning) {
  reader.classList.toggle('z-3');
} else {
  reader.classList.toggle('z-3');
}

textScanner.innerText = "Klik scan di bawah!";

const rand = (min, max) => Math.floor(Math.random() * (max - min)) + min;

function onScanSuccess(decodedText, decodedResult) {
  console.log(decodedText)
  try {
    console.log(`Code matched = ${decodedText}`, decodedResult);
    pauseScanning();

    const results = response[rand(1, 2)]

    return valueScanNav(results.img, results.description, results.slug, toggleNav);

  } catch (error) {
    onScanFailure(error);
  }
}

function onScanFailure(error) {
  console.log(error)
  // console.warn(`Code scan error = ${error}`);
}


function startScanner(cameraId) {
  const width = window.innerWidth;
  const height = window.innerHeight;

  const size = Math.floor(Math.min(width, height) * 0.7);

  // console.log(size)

  html5QrCode.start(
    cameraId,
    {
      fps: 60,
      qrbox: { width: size, height: size }
    },
    // onScanSuccess,
    // onScanFailure
    (decodedText, decodedResult) => {
      console.log(decodedText, decodedResult);
    },
    (errorMessage, error) => {
      console.log(error);
    }
  ).then(() => {
    console.log(`Started scanning with camera id ${cameraId}`);
    textScanner.innerText = "Scanning...";
    isScannerPaused = false;
  }).catch(err => {
    textScanner.innerText = "Something went wrong.";
    console.error("Error starting scanner:", err);
  });

}

async function flipCamera() {

  if (html5QrCode.isScanning) {
    await html5QrCode.stop();
  }

  try {

    const cameras = await Html5Qrcode.getCameras();


    if (cameras && cameras.length > 1) {


      if ((cameras.length - 1) <= countingCamera) {
        countingCamera = 0;
      } else {
        countingCamera += 1;
      }

      const newCameraId = cameras[countingCamera].id;

      currentCameraId = newCameraId;

      setTimeout(() => {
        startScanner(newCameraId);
      }, 300);

    } else {
      console.warn("No alternate camera found");

    }

  } catch (err) {
    console.error(`Error accessing cameras:`, err);
  }
}

async function scanImage(file) {

  try {
    const decodedText = await html5QrCode.scanFile(file, true);
    console.log(`QR Code Found: ${decodedText}`);

    if (decodedText) {
      const response = await fetch(`${scanUrl}`, {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json'
        },
        body: JSON.stringify({
          plant_id: decodedText,
          device_id: token
        }),
      });

      const results = await response.json();
      const data = results?.data
      const name = `${data.name}(${data.scientific_name})`
      const urlDetail = `/show-plant/${data.slug}`

      return valueScanNav(data.images.length ? data.images[0].image : "/images/tanaman-1.png", name, urlDetail, toggleNav);
    } else {
      console.error("No QR Code found in the image.");
      alert("No QR Code found in the image.");
    }
  } catch (err) {
    console.error(`Error scanning file: ${err}`);
    alert("No QR Code found in the image.");
  }
}


document.getElementById("access-camera-btn")
  ?.addEventListener("click", () => {
    Html5Qrcode.getCameras().then(cameras => {

      if (isScannerPaused && html5QrCode.isScanning == true) {
        resumeScanning();
      } else {
        if (cameras && cameras.length > 0) {
          currentCameraId = cameras[0].id;
          startScanner(currentCameraId);
        } else {
          textScanner.innerText = "No cameras found.";
          console.error("No cameras found.");
        }
      }
    }).catch(err => {
      textScanner.innerText = "Error accessing cameras. Please allow camera permissions.";
      console.error("Error accessing cameras:", err);
    });
  });

document.getElementById('flip-camera-btn')?.addEventListener('click', flipCamera);

document.getElementById('select-image-btn')?.addEventListener('click', () => {

  if (!html5QrCode.isScanning) {
    document.getElementById('file-input-scanner').click();
  } else {
    html5QrCode.stop().then(() => {
      document.getElementById('file-input-scanner').click();

    }).catch(err => {
      console.error(`Error: ${err}`)
    });

  }

});

document.getElementById('file-input-scanner')?.addEventListener('change', (event) => {
  const file = event.target.files[0];
  if (file) {
    scanImage(file);
  }
});

function pauseScanning() {
  html5QrCode.pause();
  isScannerPaused = true;
}

function resumeScanning() {
  html5QrCode.resume();
  isScannerPaused = false;
}


function valueScanNav(img, detail, link, toggleNav) {
  const imageEl = document.getElementById('scan-nav-img');
  const detailEl = document.getElementById('scan-nav-detail');
  const linkEl = document.getElementById('scan-nav-link');

  imageEl.setAttribute('src', img);
  detailEl.textContent = detail;
  linkEl.setAttribute('href', link);

  toggleNav();
}

function toggleNav() {
  if (window.location.pathname == '/') {
    headingBack.classList.add('d-none');

    scanNav.classList.toggle('d-none');
    navbar.classList.toggle('d-none');
    headingBack.classList.toggle('d-none');
  }
}


headingBack.getElementsByTagName('a')[0].addEventListener('click', (e) => {
  scanNav.classList.toggle('d-none');
  navbar.classList.toggle('d-none');
  headingBack.classList.toggle('d-none');
})


