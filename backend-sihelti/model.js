//READ
exports.rumahSakit = (req, res) => {
  connection.query(
    'SELECT nama_rumah_sakit,latitude,logitude,alamat FROM rumah_sakit',
    (error, rows, fields) => {
      if (error) {
        response.gagal(error, res);
      } else {
        response.ok(rows, res);
      }
    },
  );
};

exports.rujukan = (req, res) => {
  connection.query(
    'SELECT * FROM `rujukan` JOIN `akun` join `hasil_diagnosa` join `rumah_sakit`',
    (error, rows, fields) => {
      if (error) {
        response.gagal(error, res);
      } else {
        response.ok(rows, res);
      }
    },
  );
};
exports.malaria = (req, res) => {
  connection.query('SELECT * FROM `malaria', (error, rows, fields) => {
    if (error) {
      response.gagal(error, res);
    } else {
      response.ok(rows, res);
    }
  });
};
exports.addDiagnosa = (req, res) => {
  var id = req.body.id;
  var hasil = req.body.hasil;
  var level = req.body.level;

  connection.query(
    'INSERT INTO hasil_diagnosa (id , hasil, level) vaLues (?,?,?)',
    [id, hasil, level],
    (error, rows, fields) => {
      if (error) {
        response.gagal(error, res);
      } else {
        response.ok(rows, res);
      }
    },
  );
};

// //READ BY ID
// exports.cari_user = (req, res) => {
//     var user_id = req.params.cari_user;

//     connection.query('SELECT * FROM user where user_id = ?',[user_id],(error,rows,fields)=>{
//         if(error){
//             response.gagal(error,res)
//         } else{
//             response.ok(rows, res)
//         }
//     })
// };

// exports.cari_book = (req, res) => {
//     var book_id = req.params.cari_book;

//     connection.query('SELECT * FROM book where book_id = ?',[book_id],(error,rows,fields)=>{
//         if(error){
//             response.gagal(error,res)
//         } else{
//             response.ok(rows, res)
//         }
//     })
// };
// //CREATE

// exports.tambah_book = (req, res) => {

//     var judul = req.body.judul;
//     var jumlah_halaman = req.body.jumlah_halaman;
//     var penerbit = req.body.penerbit;
//     var user_id = req.body.user_id;

//     connection.query('INSERT INTO book (judul , jumlah_halaman, penerbit, user_id) vaLues (?,?,?,?)',[judul , jumlah_halaman, penerbit, user_id], (error, rows, fields)=>{
//         if(error){
//             response.gagal(error,res)
//         } else{
//             //tambahin response.ok jika tidak error
//             // contoh response.ok(rows,res)
//             response.ok(rows, res)
//         }
//     });
// };

// //UPDATE
// exports.update_user = (req, res) => {

//     var user_id = req.body.user_id
//     var nama = req.body.nama;
//     var umur = req.body.umur;

//     connection.query('UPDATE user SET nama= ? , umur = ? where user_id = ?',[nama , umur, user_id], (error, rows, fields)=>{
//         if(error){
//             response.gagal(error,res)
//         } else{
//             response.ok(rows, res)
//         }
//     });
// };

// exports.update_book = (req, res) => {

//     var book_id = req.body.book_id;
//     var judul = req.body.judul;
//     var jumlah_halaman = req.body.jumlah_halaman;
//     var penerbit = req.body.penerbit;
//     var user_id = req.body.user_id;

//     connection.query('UPDATE user SET judul = ?, jumlah_halaman=?, penerbit = ?, user_id = ? where book_id = ?',[judul, jumlah_halaman, penerbit, user_id, book_id], (error, rows, fields)=>{
//         if(error){
//             response.gagal(error,res)
//         } else{
//             response.ok(rows, res)
//         }
//     });
// };

// //DELETE
// exports.delete_user  = (req, res) => {

//     var user_id = req.body.user_id

//     connection.query('DELETE FROM user where user_id = ?',[user_id], (error, rows, fields)=>{
//         if(error){
//             response.gagal(error,res)
//         } else{
//             response.ok(rows, res)
//         }
//     });
// };

// exports.delete_book  = (req, res) => {

//     var book_id = req.body.book_id

//     connection.query('DELETE FROM book where book_id = ?',[book_id], (error, rows, fields)=>{
//         if(error){
//             response.gagal(error,res)
//         } else{
//             response.ok(rows, res)
//         }
//     });
// };
// //soal tambahan

//INDEX
exports.index = (req, res) => {
  response.ok('ini index dari nodejs', res); //soal
};
// soal no 2
