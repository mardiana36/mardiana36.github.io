function fokusForm() {
  document.getElementById("search").focus();
}

function geserContain(idCheckbox,idElemen) {
  const checkbox = document.getElementById(idCheckbox);
  const container = document.getElementById(idElemen);

  // Fungsi untuk menggeser elemen
  function geserElemen() {
    if (checkbox.checked) {
      // Checkbox dicentang, geser elemen sejauh 240px ke kanan
      container.style.marginLeft = '240px';
    } else {
      // Checkbox tidak dicentang, kembalikan elemen ke posisi semula
      container.style.marginLeft = '0';
    }
  }

  // Panggil fungsi saat halaman selesai dimuat
  geserElemen();

  // Tambahkan event listener pada checkbox
  checkbox.addEventListener('change', geserElemen);
}

function heightNav(navbarId, contentId) {
  var navbarDropdown = document.getElementById(navbarId);
  var contentWrapper = document.getElementById(contentId);

  var totalContentHeight = contentWrapper.offsetHeight + 250;
  navbarDropdown.style.height = totalContentHeight + 'px';
}

function showImg() {
  let img = document.getElementById("img-agt");
  let input = document.getElementById("foto");
  if (input.files[0]) {
    img.src = URL.createObjectURL(input.files[0]);
  }
  
}
function showPassword(idElement) {
  var checkbox = document.getElementById(idElement);
  if (checkbox.type == "password") {
      checkbox.type = "text";
      
  } else {
      checkbox.type = "password";
  }
}
function setActiveLink(link) {
  const menuLinks = document.querySelectorAll('.list li');
  
  menuLinks.forEach(menuLink => {
    menuLink.classList.remove('aktive');
  });
  link.classList.add('aktive');
}

function handleRadioChange() {
  const todayRadio = document.querySelector('input[name="buku"]:checked');

  if (todayRadio.value === "1") {
      let tanggalInput = document.getElementById('tgl-pjm');
      // Jika radio "Peminjaman" dipilih, atur nilai tanggal input ke tanggal hari ini
      if(tanggalInput.value === ''){
          const today = new Date();
          const year = today.getFullYear();
          let month = today.getMonth() + 1;
          if (month < 10) {
              month = '0' + month;
          }
          let day = today.getDate();
          if (day < 10) {
              day = '0' + day;
          }
          const formattedDate = `${year}-${month}-${day}`;
          tanggalInput.value = formattedDate;
      }
      
  } else if (todayRadio.value === "0") {
      let tanggalInput = document.getElementById('tgl-pgl');
      // Jika radio "Pengembalian" dipilih, atur nilai tanggal input ke tanggal hari ini
  
          const today = new Date();
          const year = today.getFullYear();
          let month = today.getMonth() + 1;
          if (month < 10) {
              month = '0' + month;
          }
          let day = today.getDate();
          if (day < 10) {
              day = '0' + day;
          }
          const formattedDate = `${year}-${month}-${day}`;
          tanggalInput.value = formattedDate;
  }
  
}
function showPopupDate(element) {
  const date = element.getAttribute('data-date');
  const popupDate = element.nextElementSibling;
  if (popupDate.style.display === 'none' || popupDate.textContent !== date) {
      popupDate.textContent = date; // Atur tanggal ke elemen popup
      popupDate.style.display = 'block';
  } else {
      popupDate.style.display = 'none';
  }
}
function flipCard(card) {
  card.classList.toggle("flipped");
}


