const express = require('express') // import express --> framework
const db = require("./db") //call file db.js
const application = express() // use function express function

application.use(express.json()) //pls receive json file for external

//get method
application.get("/", function(request,response){ //get(path, function desire to work --> request, response) when directory to path, do function
    //response.send("DataRockie")
    response.json({
        "name": "DataRockie",
        "version" : "1.0"
    }) //easy for furthur implement
})

application.post("/hotels",function(req,res){ //receive data with post method --> post to /hotel path

    const name = req.body.name
    const price = req.body.price

    //const {name,price} = req.body

    const stm = db.prepare("INSERT INTO hotels (name,price) VALUES (?, ?)") //bind param
    const result = stm.run(name, price) //run statement
    res.json(result)
})

application.get("/hotels",function(req,res){
    const stm = db.prepare("SELECT * FROM hotels")
    const result = stm.all()
    res.json(result)
})

application.get("/hotels/:id",function(req,res){
    const {id} = req.params //req.params.id

    const stm = db.prepare("SELECT * from hotels WHERE id = ?")
    const result = stm.get(id)
    res.json(result)
})

application.patch("/hotels/:id",function(req,res){
    const {id} = req.params
    const {name,price} = req.body

    const stm = db.prepare("UPDATE hotels SET name = ?, price = ? WHERE id = ?")
    const result = stm.run(name,price,id)
    res.json(result)
})

application.delete("/hotels/:id",function(req,res){
    const {id} = req.params
    const stm = db.prepare("DELETE from hotels WHERE id = ?")
    const result = stm.run(id)
    res.json(result)
})

application.listen(8080,function(){ // application run at port 8080
    console.log("Application start at localhost:8080")
})

