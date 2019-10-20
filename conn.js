var mysql = require('mysql')
// soal import mysql
//contoh var db = require('mysql');

var con = mysql.createConnection({
  host: '45.13.252.52',
  user: 'u748027618_root',
  password: 'root123',
  database: 'u748027618_sihelti'
})
//soal

con.connect(function(err) {
  if (err) throw err
})

module.exports = con
