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
			walk: { from: 0, to: 32 },
		},
	},
})

const GAME_WIDTH = 1024
const GAME_HEIGHT = 1024
const LANE_WIDTH = 650
const MARGIN = 16

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
	color("#202020"),
	z(-2)
])

const lane1Zombie = add([
	pos(LANE_WIDTH, lane1.pos.y - 20),
	// scale(.75),
	sprite("zombie"),
	move(LEFT, 10)
])

lane1Zombie.play("walk")