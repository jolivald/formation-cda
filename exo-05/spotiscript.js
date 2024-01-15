// https://www.youtube.com/watch?v=dQw4w9WgXcQ
document
  .getElementById('clickable')
  .addEventListener('click', () => {
    const audio = new Audio('demo.mp3');
    audio.play();
  });