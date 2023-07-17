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



