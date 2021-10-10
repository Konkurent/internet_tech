let img = document.querySelector('.container');
let block = document.querySelector('.row');

img.addEventListener('click', (ev) => {
    let positionX = ev.clientX;
    let positionY = ev.clientY;
    let radius = custRand(10, 200);
    let top = positionY - radius;
    let left = positionX - radius;
    let dimeter  = radius * 2;
    let width = block.offsetWidth;
    let height = block.offsetHeight;

    createElement(top, left, dimeter);

    let count = Math.ceil(Math.PI * Math.pow(radius, 2) / (103 * 103)); // прмерное кол-во
    alert(`Окружность цепляет ${count} квадратов`)
})

function createElement(top, left, dimeter) {
    let div = document.createElement('div');
    div.setAttribute('style', `position: absolute; 
    width: ${dimeter}px;
    height: ${dimeter}px;
    border: 1px solid black;
    border-radius: 50%;
    top: ${top}px;
    left: ${left}px;
    z-index: 3;
    `);

    document.querySelector('.container').append(div)
}


function custRand(n, m) {
    if (n == m) return false;

    let max = Math.max(n, m);
    let min = Math.min(n, m);

    let rand = Math.round(Math.random() * (max - min + 1) + min);

    return rand;
}
