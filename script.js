const cursor = document.querySelector('.cursor-circle');
const iframes = document.querySelectorAll('iframe');

let mouseX = 0;
let mouseY = 0;
let circleX = 0;
let circleY = 0;

const ease = 0.80;

document.addEventListener('mousemove', (e) => {
  mouseX = e.clientX;
  mouseY = e.clientY;
});

document.addEventListener('touchmove', (e) => {
  if (e.touches.length > 0) {
    mouseX = e.touches[0].clientX;
    mouseY = e.touches[0].clientY;
  }
}, { passive: true }); // passive improves performance

function animateCircle() {
  circleX += (mouseX - circleX) * ease;
  circleY += (mouseY - circleY) * ease;
  cursor.style.transform = `translate(${circleX}px, ${circleY}px) scale(1)`;
  requestAnimationFrame(animateCircle);
}
animateCircle();

document.addEventListener('mousedown', () => {
  cursor.classList.add('clicking');
});

document.addEventListener('mouseup', () => {
  cursor.classList.remove('clicking');
});
document.addEventListener('dragstart', () => cursor.style.display = 'none');
document.addEventListener('dragend', () => cursor.style.display = 'block');

iframes.forEach(iframe => {
  iframe.addEventListener('mouseenter', () => cursor.style.display = 'none');
  iframe.addEventListener('mouseleave', () => cursor.style.display = 'block');
});
document.addEventListener('touchstart', () => {
  cursor.classList.add('clicking');
});

document.addEventListener('touchend', () => {
  cursor.classList.remove('clicking');
});
