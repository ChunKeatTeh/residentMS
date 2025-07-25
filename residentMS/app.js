const locationsChoose = document.querySelectorAll('.locationsChoose');
const locationsPictures = document.querySelectorAll('.locationsPicture');
const locations = [
  {
    name: "playground",
    id: "playgroundPicture",
    img: "./img/Pictures/playground.jpg"
  },
  {
    name: "swimming pool",
    id: "swimmingPoolPicture",
    img: "./img/Pictures/swimming_pool.jpg"
  },
  {
    name: "gym",
    id: "gymPicture",
    img: "./img/Pictures/gym.jpg"
  },
  {
    name: "hall",
    id: "hallPicture",
    img: "./img/Pictures/hall.jpg"
  }
];

locationsChoose.forEach((location, index) => {
  // Set clicked button to active
  location.addEventListener('click', () => {
    locationsChoose.forEach((loc) => {
      loc.classList.remove('active');
    });
    location.classList.add('active');

    // Change the picture based on the clicked button
    locationsPictures.forEach((picture) => {
      picture.classList.add('hidden');
    });
    const locationPictureChosen = document.getElementById(locations[index].id);
    locationPictureChosen.classList.remove('hidden');
  });
});