import kaboom from "kaboom"

const k = kaboom()

k.loadSprite("bean", "sprites/bean.png")
k.loadSprite("bg", "sprites/General/Background.jpg")
k.loadSprite("lawnMowerIdle", "sprites/General/lawnmowerIdle.gif")
k.loadSprite("lawnMowerActive", "sprites/General/lawnmowerActivated.gif")

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
const LANE_HEIGHT = 80
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

// Lanes
const lane1 = add([
	'lane1',
	pos(100, 125),
])

const lane2 = add([
	'lane1',
	pos(100, 140 + LANE_HEIGHT),
])

const lane3 = add([
	'lane1',
	pos(100, 145 + (2 * LANE_HEIGHT)),
])

const lane4 = add([
	'lane1',
	pos(100, 150 + (3 * LANE_HEIGHT)),
])

const lane5 = add([
	'lane1',
	pos(100, 150 + (4 * LANE_HEIGHT)),
])

// Lawn Mower
add([
	pos(lane1.pos.x - 100, lane1.pos.y),
	sprite('lawnMowerIdle')
])

const spawnLawnMower = () => {

}

// Zombie
const spawnZombie = (lane) => {
	const zombie = add([
		'zombie',
		health(5),
		pos(LANE_WIDTH, lane.pos.y - 20),
		sprite("zombie"),
		move(LEFT, 12),
		area(),
		z(1),
		offscreen({ destroy: true }),
	])
	// triggers when hp reaches 0
	zombie.on("death", () => {
		destroy(zombie)
	})

	loop(4, () => {
		zombie.play("walk")
	})
}


// Pea Shooter
const spawnPeaShooter = (lane) => {
	const peaShooter = add([
		'peaShooter',
		pos(lane.pos.x, lane.pos.y),
		scale(1.1),
		sprite("pea"),
		area(),
		z(2),
		offscreen({ destroy: true }),
	])

	loop(2, () => {
		peaShooter.play("idle")
	})

	// Shoot Pea loop
	loop(2, () => {
		shootPea(peaShooter)
	})
}

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

onCollideUpdate('zombie', 'pea', (zombie, pea) => {
	zombie.hurt(1)
	destroy(pea)
	console.log("hit")
})

// Game loop
wait(3, () => {

	loop(5, () => {
		const randomLane =
			Math.floor(Math.random() * 5) + 1;

		let lane = lane1

		switch (randomLane) {
			case 1: {
				lane = lane1
				break;
			}
			case 2: {
				lane = lane2
				break;
			}
			case 3: {
				lane = lane3
				break;
			}
			case 4: {
				lane = lane4
				break;
			}
			case 5: {
				lane = lane5
				break;
			}
		}

		spawnZombie(lane)
	})

})


spawnPeaShooter(lane1)
