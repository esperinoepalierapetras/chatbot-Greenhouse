/*
 * M Dakanali
 */

#include "DHT.h"            // Include the DHT Library

int dhtPin = 2;             // Set pin to pin 2 (digital)
int dly = 2000;             // Define delay of 2000ms (2 seconds)
//Constants 
const int hygrometer = A0;  //Hygrometer sensor analog pin output at pin A0 of Arduino
//Variables 
int soilMoisture;

#define DHT_TYPE DHT11      // Uncomment if using the blue (dht11) sensor
//#define DHT_TYPE DHT22      // Uncomment if using the white (dht22) sensor
//#define SOIL_MOISTURE_PIN_A0

DHT dht(dhtPin, DHT_TYPE);  // Instantiate the DHT object from the library

void setup() {

  Serial.begin(115200);
  Serial.println("Arduino : Ready");

  dht.begin();              // Begin DHT;
  //pinMode(SOIL_MOISTURE_PIN, INPUT);
}

void loop() {
  // Set our delay at the beginning so the sensor has time to gather 
  // data
  delay(dly);

  
  // Note 2: There are several other functions. Check out the library
  // at: https://github.com/adafruit/DHT-sensor-library
  //Read the values from sensor
  
  float humidity = dht.readHumidity();
  float temperature = dht.readTemperature();
  soilMoisture = analogRead(hygrometer); //Read analog value;
  soilMoisture = constrain(soilMoisture, 400, 1023); //Keep the ranges
  soilMoisture = map(soilMoisture, 400, 1023, 100,0); //Map value: 400 wil be 100 and 1023 will be 0
  
  //int soilMoisture = analogRead(SOIL_MOISTURE_PIN);

  
  // Check to see if the values are empty. Display error if they are
  if( isnan(humidity) || isnan(temperature) ) {
    Serial.println("DHT Sensor read Failed!");
    return;
  }

  // Print out our values to the serial UART.
  Serial.print("Humidity:");
  Serial.print(humidity);
  Serial.print(",Temperature:");
  Serial.print(temperature);
  Serial.print(",Hygrometer:");
  Serial.println(soilMoisture);
  //Serial.println(soilMoisture);
  delay(300000);
