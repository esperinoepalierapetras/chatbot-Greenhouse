// Variables will change:
int ledState2 = LOW;             // ledState used to set the LED

// Generally, you should use "unsigned long" for variables that hold time
// The value will quickly become too large for an int to store
unsigned long previousMillis2 = 0;        // will store last time LED was updated

// constants won't change:
const long interval2 = 10; 

void timer2()

{
  unsigned long currentMillis2 = millis();

  if (currentMillis2 - previousMillis2 >= interval2) {
    // save the last time you blinked the LED
    previousMillis2 = currentMillis2;

    // if the LED is off turn it on and vice-versa:
    if (ledState2 == LOW) 
    {
      ledState2 = HIGH;
      serial_Read();
    } else 
    {
      ledState2 = LOW;
    }

    // set the LED with the ledState of the variable:
    digitalWrite(ledPin2, ledState2);
    
  }
}
