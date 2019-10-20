'use strict'

exports.ok = (values, res) => {
  var data = {
    status: 200,
    data: values
  }
  res.json(data) //soal
  res.end()
}

exports.gagal = (values, res) => {
  var data = {
    status: 500,
    data: values
  }
  res.json(data) //soal
  res.end()
}
