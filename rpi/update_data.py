import MySQLdb, sys, time, lcdlib
from subprocess import *

def input_data(sensor_name, sensor_data):
    # Connect to the database with user root and password root123
    con = MySQLdb.connect(host="localhost",user="root",passwd="root123", db="sensors_db")
    cursor = con.cursor()
    
    # Check if row exists
    q = "select count(1) from tbl_sensors where sensor_name='"+sensor_name+"';"
    cursor.execute(q)
    if cursor.fetchone()[0]:
        print("ROW EXISTS RUNNING QUERY")
        # Update the the table if there is already a sensor witht that sensor_name
        q = "UPDATE tbl_sensors SET sensor_data="+sensor_data+" WHERE sensor_name='"+sensor_name+"';"
        cursor.execute(q)
    else:
        print("SENSOR_NAME "+sensor_name+" DOES NOT EXISTS ADDING IT")
        # Create a new row for that sensor
        q = "INSERT INTO tbl_sensors (sensor_name, sensor_data) VALUES ('"+sensor_name+"', "+sensor_data+");"
        cursor.execute(q)
    
    # Log Data 
    now = str(time.ctime())
    q = "INSERT INTO tbl_datalog (now, sensor_name, sensor_data) VALUES ('"+now+"','"+sensor_name+"', "+sensor_data+");"
    cursor.execute(q)       
    print("Done")

    # LCD Data
    LCD_DISPLAY.lcd_puts("Data Received...", 1)
    LCD_DISPLAY.lcd_puts(sensor_name +" : "+sensor_data, 2)

# Get Arguments
args = sys.argv

# Make the LCD
LCD_DISPLAY = lcdlib.lcd(0x20,1)

# If there are two arguments (+ the the file name argument)
if len(args) >= 3:
    input_data(args[1], args[2])
else:
    print("Must have 2 arguments")
