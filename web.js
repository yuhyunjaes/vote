const main2_text_ani = document.querySelector('.main2_text_ani');
const frames = ['', '코', '코런', '코', ''];
let index = 0;

function main2_ani() {
  main2_text_ani.textContent = frames[index];

  let delay = (index === 2) ? 5000 : 500;

  index = (index + 1) % frames.length;

  setTimeout(main2_ani, delay);
}

main2_ani();