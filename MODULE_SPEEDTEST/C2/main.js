const xInput = document.querySelector("#xInput")
const yInput = document.querySelector("#yInput")
const btn = document.querySelector("#submit")
const grid = document.querySelector(".grid")


btn.addEventListener('click', () => {
  let gridCells = document.querySelectorAll(".grid-cell")
  if (gridCells) {
    gridCells.forEach(gridCell => {
      gridCell.remove();
    });
  }

  grid.style.setProperty('--gridX', xInput.value);
  grid.style.setProperty('--gridY', yInput.value);

  const totalCells = xInput.value * yInput.value
  for (var i = 0; i < totalCells; i++) {
    let gridCell = document.createElement('div');
    gridCell.className = 'grid-cell';
    grid.appendChild(gridCell);
  }
})