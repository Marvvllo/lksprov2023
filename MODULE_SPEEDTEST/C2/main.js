// Seleksi elemen pada html
const xInput = document.querySelector("#xInput")
const yInput = document.querySelector("#yInput")
const btn = document.querySelector("#submit")
const grid = document.querySelector(".grid")

// Deteksi klik tombol submit
btn.addEventListener('click', () => {
  // Hapus sel grid jika ada
  let gridCells = document.querySelectorAll(".grid-cell")
  if (gridCells) {
    gridCells.forEach(gridCell => {
      gridCell.remove();
    });
  }

  // Masukkan input user kepada variabel css
  grid.style.setProperty('--gridX', xInput.value);
  grid.style.setProperty('--gridY', yInput.value);

  // tambahkan sel grid berdasarkan input
  const totalCells = xInput.value * yInput.value
  for (var i = 0; i < totalCells; i++) {
    let gridCell = document.createElement('div');
    gridCell.className = 'grid-cell';
    grid.appendChild(gridCell);
  }
})