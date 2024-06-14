#!/usr/bin/env python3
import serial
import mysql.connector
from mysql.connector import errorcode
from datetime import datetime

# Configure the serial connection
ser = serial.Serial('/dev/ttyS0', 115200, timeout=1)
ser.flush()

#Sensor Informatio
sensor_name ="DHT22 and Soil Moisture Sensor"
location = "greenhouse"

#Function to read sensor data from serial
def read_sensor_data():
    if ser.in_waiting > 0:
        line = ser.readline().decode('utf-8').rstrip()
        data = line.split(',')
        if len(data) == 3:
            #Arduino Mega send values to serial
            temperature = float(data[0].split(':')[1])
            hygrometer = float(data[1].split(':')[1])
            humidity = float(data[2].split(':')[1])
            return {"temperature": temperature, "hygrometer": hygrometer, "humidity": humidity}
    return None
# Function to insert sensor data into the database
def insert_sensor_data(sensor_data):
    try:
        conn = mysql.connector.connect(host="localhost", user="root", password="greenhouse123", database="esp_data")
    except mysql.connector.Error as err:
        if err.errno == errorcode.ER_ACCESS_DENIED_ERROR:
            print("Something is wrong with you username or password")
        elif err.errno == errorcode.ER_BAD_DB_ERROR:
            print("Database does not exist")
        else:
            print(err)
    else:
        with conn:
            cursor = conn.cursor()
            timestamp = datetime.now()
            cursor.execute("INSERT INTO Sensor (humidity, temperature, Hygrometer, sensor_name, location, date) VALUES(%s, %s, %s, %s, %s, %s)", (sensor_data['humidity'],sensor_data['temperature'],sensor_data['hygrometer'],sensor_name, location,timestamp))
            conn.commit()
            cursor.close()
            conn.close()
while True:
    sensor_data = read_sensor_data()
    if sensor_data:
        print(sensor_data)
        insert_sensor_data(sensor_data)

