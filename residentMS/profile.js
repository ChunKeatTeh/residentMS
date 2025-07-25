const profileMenu = document.querySelector('.profileMenu');

const navProfilePicture = document.querySelector('.navProfilePicture');
const profileCloseButton = document.querySelector('.profileCloseButton');

navProfilePicture.addEventListener('click', () => {
  profileMenu.style.right = "0";

  console.log("open");
});

profileCloseButton.addEventListener('click', () => {
  profileMenu.style.right = "-32vw";

  console.log("close");
});