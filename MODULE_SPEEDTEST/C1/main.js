window.onload = function () {
  // Dekalasi variabel dan elemen canvas
  const canvas = document.getElementById("canvas")
  const ctx = canvas.getContext('2d')
  const CANVAS_WIDTH = (canvas.width = 400)
  const CANVAS_HEIGHT = (canvas.height = 320)

  const CIRCLE_SIZE = 15
  let x = CIRCLE_SIZE

  // Fungsi animasi yang akan dijalanjan di setiap animation frame
  const animate = () => {
    ctx.clearRect(0, 0, CANVAS_WIDTH, CANVAS_HEIGHT)
    ctx.beginPath();
    ctx.arc(x, 150, CIRCLE_SIZE, 0, 2 * Math.PI);
    ctx.fillStyle = '#ffffff';
    ctx.fill();
    x++
    requestAnimationFrame(animate)
  }
  animate()
}