// Location selection logic
const locationsChoose = document.querySelectorAll('.locationsChoose');
const locationsPictures = document.querySelectorAll('.locationsPicture');
const locations = [
  { name: "playground", id: "playgroundPicture", img: "./img/Pictures/playground.jpg" },
  { name: "swimming pool", id: "swimmingPoolPicture", img: "./img/Pictures/swimming_pool.jpg" },
  { name: "gym", id: "gymPicture", img: "./img/Pictures/gym.jpg" },
  { name: "hall", id: "hallPicture", img: "./img/Pictures/hall.jpg" }
];

locationsChoose.forEach((location, index) => {
  location.addEventListener('click', () => {
    locationsChoose.forEach(loc => loc.classList.remove('active'));
    location.classList.add('active');
    locationsPictures.forEach(picture => picture.classList.add('hidden'));
    const chosenPicture = document.getElementById(locations[index].id);
    if (chosenPicture) {
      chosenPicture.classList.remove('hidden');
    }
  });
});

// Exercise timer logic
const exerciseImage = document.getElementById("exerciseImage");
const exerciseOverlay = document.getElementById("exerciseOverlay");
const overlayTimer = document.getElementById("overlayTimer");
const stopExercise = document.getElementById("stopExercise");

let timerInterval;
let timeLeft = 300; // 5 minutes

function startExerciseTimer() {
  exerciseOverlay.classList.remove("hidden");
  timeLeft = 300;
  updateTimerDisplay();
  timerInterval = setInterval(() => {
    timeLeft--;
    updateTimerDisplay();
    if (timeLeft <= 0) {
      clearInterval(timerInterval);
      overlayTimer.textContent = "Done!";
    }
  }, 1000);
}

function updateTimerDisplay() {
  const minutes = String(Math.floor(timeLeft / 60)).padStart(2, '0');
  const seconds = String(timeLeft % 60).padStart(2, '0');
  overlayTimer.textContent = `${minutes}:${seconds}`;
}

if (exerciseImage) {
  exerciseImage.onclick = startExerciseTimer;
}
if (stopExercise) {
  stopExercise.onclick = function() {
    exerciseOverlay.classList.add("hidden");
    clearInterval(timerInterval);
  };
}