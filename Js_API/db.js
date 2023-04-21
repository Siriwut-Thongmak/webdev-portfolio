//connecting to database

const database = require("better-sqlite3") //import better-sqlite3 --> framework

const db = database("hotel.sqlite")

db.exec(
    "CREATE TABLE IF NOT EXISTS hotels (id INTEGER PRIMARY KEY, name TEXT, price INTEGER)"
)

module.exports = db //exports db for furthur implement