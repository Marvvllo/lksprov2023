import kaboom from "kaboom"

const k = kaboom()

k.loadSprite("bean", "sprites/bean.png")
k.loadSprite("bg", "sprites/General/Background.jpg")

loadSpriteAtlas("sprites/Zombie/spritesheet.png", {
	"zombie": {
		x: 0,
		y: 0,
		width: 2048,
		height: 90,
		sliceX: 34,
		anims: {
			walk: { from: 0, to: 33 },
		},
	},
})

loadSpriteAtlas("sprites/PeaShooter/spritesheet.png", {
	"pea": {
		x: 0,
		y: 0,
		width: 2048,
		height: 71,
		sliceX: 31,
		anims: {
			idle: { from: 0, to: 30 },
		},
	},
})

const GAME_WIDTH = 1024
const GAME_HEIGHT = 1024
const LANE_WIDTH = 650
const LANE_HEIGHT = 125
const MARGIN = 16
const PLANT_SLOTS = 8

// Add background
add([
	pos(0, 0),
	sprite("bg"),
	scale(.825),
	area(),
	z(-2)
])

const lane1 = add([
	'lane1',
	pos(100, 125),
])

const lane1Zombie = add([
	'zombie',
	health(5),
	pos(LANE_WIDTH, lane1.pos.y - 20),
	// scale(.75),
	sprite("zombie"),
	move(LEFT, 12),
	area(),
	z(1)
])

// triggers when hp reaches 0
lane1Zombie.on("death", () => {
	destroy(lane1Zombie)
})

const lane1PeaShooter = add([
	'peaShooter',
	pos(lane1.pos.x, lane1.pos.y),
	scale(1.1),
	sprite("pea"),
	area(),
	z(2)
])

const shootPea = (peaShooter) => {
	add([
		'pea',
		pos(peaShooter.pos.x + 20, peaShooter.pos.y + 20),
		circle(10, 10),
		color(GREEN),
		move(RIGHT, 80),
		offscreen({ destroy: true }),
		area(),
		z(1)
	])
}

loop(1, () => {
	shootPea(lane1PeaShooter)
})

loop(4, () => {
	lane1PeaShooter.play("idle")
	lane1Zombie.play("walk")
})

onCollideUpdate('zombie', 'pea', (zombie, pea) => {
	zombie.hurt(1)
	destroy(pea)
	console.log("hit")
})