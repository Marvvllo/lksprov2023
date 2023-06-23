// initialize kaboom context
kaboom();

// Add background
add([
  pos(0, 0),
  rect(width(), height()),
  area(),
  color("#202020"),
  z(-2)
])

const MARGIN = 60
const KEY_WIDTH = (width() - (MARGIN * 2)) / 4;
const KEY_HEIGHT = 80;
const TILE_SPEED = 200;
const TILE_HEIGHT = KEY_HEIGHT * .8;

const dKey = add([
  "dKey",
  pos(MARGIN, height() - KEY_HEIGHT),
  rect(KEY_WIDTH, KEY_HEIGHT),
  area(),
  outline(1),
  color(WHITE),
  z(0)
])

const fKey = add([
  "fKey",
  pos(MARGIN + KEY_WIDTH, height() - KEY_HEIGHT),
  rect(KEY_WIDTH, KEY_HEIGHT),
  area(),
  outline(1),
  color(WHITE),
  z(0)
])

const jKey = add([
  "jKey",
  pos(MARGIN + (2 * KEY_WIDTH), height() - KEY_HEIGHT),
  rect(KEY_WIDTH, KEY_HEIGHT),
  area(),
  outline(1),
  color(WHITE),
  z(0)
])

const kKey = add([
  "kKey",
  pos(MARGIN + (3 * KEY_WIDTH), height() - KEY_HEIGHT),
  rect(KEY_WIDTH, KEY_HEIGHT),
  area(),
  outline(1),
  color("#ffffff")
])

// Ganti warna vaccine key saat ditekan pada keyboard
// D Key
onKeyDown("d", () => {
  dKey.color = RED
})
onKeyRelease("d", () => {
  dKey.color = WHITE
})

// F Key
onKeyDown("f", () => {
  fKey.color = RED
})
onKeyRelease("f", () => {
  fKey.color = WHITE
})

// J Key
onKeyDown("j", () => {
  jKey.color = RED
})
onKeyRelease("j", () => {
  jKey.color = WHITE
})

// K Key
onKeyDown("k", () => {
  kKey.color = RED
})
onKeyRelease("k", () => {
  kKey.color = WHITE
})

const interval = Math.random()

loop(.5, () => {
  const tileNumber =
    Math.floor(Math.random() * 4) + 1;
  console.log(tileNumber)

  switch (tileNumber) {
    case 1: {
      add([
        "dTile",
        pos(dKey.pos.x, 0),
        move(DOWN, TILE_SPEED),
        rect(KEY_WIDTH, TILE_HEIGHT),
        area(),
        outline(1),
        color(BLUE),
        z(0)
      ])
      break;
    }
    case 2: {
      add([
        "fTile",
        pos(fKey.pos.x, 0),
        move(DOWN, TILE_SPEED),
        rect(KEY_WIDTH, TILE_HEIGHT),
        area(),
        outline(1),
        color(BLUE),
        z(0)
      ])
      break;
    }
    case 3: {
      add([
        "jTile",
        pos(jKey.pos.x, 0),
        move(DOWN, TILE_SPEED),
        rect(KEY_WIDTH, TILE_HEIGHT),
        area(),
        outline(1),
        color(BLUE),
        z(0)
      ])
      break;
    }
    case 4: {
      add([
        "kTile",
        pos(kKey.pos.x, 0),
        move(DOWN, TILE_SPEED),
        rect(KEY_WIDTH, TILE_HEIGHT),
        area(),
        outline(1),
        color(BLUE),
        z(0)
      ])
      break;
    }
  }
})

// Deteksi saat key dan tile bertabrakan
// lalu hapus tile dan tambah skor jika menekan huruf

// D key and tile
onCollideUpdate("dTile", "dKey", (tile) => {
  if (isKeyPressed("d")) {
    destroy(tile)
  }
});

onCollideUpdate("fTile", "fKey", (tile) => {
  if (isKeyPressed("f")) {
    destroy(tile)
  }
});
onCollideUpdate("jTile", "jKey", (tile) => {
  if (isKeyPressed("j")) {
    destroy(tile)
  }
});

onCollideUpdate("kTile", "kKey", (tile) => {
  if (isKeyPressed("k")) {
    destroy(tile)
  }
});