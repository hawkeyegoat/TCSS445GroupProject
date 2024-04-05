const express = require('express');
const mysql = require('mysql');
const port = 3000;
const databaseName = 'TESTSQLDATABASE'; //'dbSQL'

const app = express();

const db = mysql.createConnection( {
    host: 'localhost', //127.0.0.1 //localhost
    user: 'root',
    //port: '8000',
    password: '', //temp password 'TCSS445'
    database: databaseName
});

//connect to database
db.connect((err) => {
    if(err) {
        throw err;
    }
    db.query("SELECT * FROM tester", function (err, res, fields) {
        if (err) {
            throw err;
        }
        console.log(res);
    })
    console.log('Connection done');
    db.end();
})

// create DB
app.get('/createdb', (req, res) => {
    let sql = 'CREATE DATABASE ' + databaseName;
    db.query(sql, (err, res) => {
        if(err) {
            throw err
        }
        console.log('result');
        res.send("database created");
    })

})

app.get('/', (req, res) => {
  res.send('Hello, world!');
});

app.listen(port, () => {
  console.log(`Server is listening at http://localhost:${port}`);
});