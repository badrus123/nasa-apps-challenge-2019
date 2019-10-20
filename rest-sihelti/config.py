from app import app
from flaskext.mysql import MySQL

mysql = MySQL()
 
# MySQL configurations
app.config['MYSQL_DATABASE_USER'] = 'u748027618_root'
app.config['MYSQL_DATABASE_PASSWORD'] = 'root123'
app.config['MYSQL_DATABASE_DB'] = 'u748027618_sihelti'
app.config['MYSQL_DATABASE_HOST'] = '45.13.252.52'
mysql.init_app(app)

