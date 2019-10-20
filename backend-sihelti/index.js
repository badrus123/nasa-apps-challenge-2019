const express = require('express');
const app = express();
const port = process.env.PORT || 2019;
const bodyParser = require('body-parser');

const cors = require('cors');
const connection = require('./conn');
const routes = require('./route');
const response = require('./res');

//init global variable
app.use((req, res, next) => {
  // bikin variable global
  //contoh global.NAMA VARIABLE = connection
  // variable ga pake $
  global.connection = connection;
  global.response = response;
  next();
});

//parser library buat parser data
app.use(bodyParser.urlencoded({extended: true}));
app.use(bodyParser.json());
app.use(cors({credentials: true, origin: true}));

//manggil routes
routes(app);

app.use((req, res, next) => {
  const err = new Error('HALAMAN GA ADA');
  err.status = 404;
  next(err);
});

//listener nodejs
app.listen(port);
console.log('server jalan');
