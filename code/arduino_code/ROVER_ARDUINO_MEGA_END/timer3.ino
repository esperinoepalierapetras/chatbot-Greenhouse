
// constants won't change:
const long intervalA = 1000;           
const long intervalB = 6000;
const long intervalC = 36000;          
const long intervalD = 74000;
const long intervalE = 110000;


void timer3() 

{

 unsigned long currentMillis = millis();

  if ((currentMillis - previousMillisA >= intervalA)&&(S1==1))
   {
    // save the last time you blinked the LED
     previousMillisA = currentMillis;

      step1();
      S1=0;

   }


  if ((currentMillis - previousMillisB >= intervalB)&&(S2==1))
  {
    // save the last time you blinked the LED
    previousMillisB = currentMillis;

      step2();

  }


  if ((currentMillis - previousMillisC >= intervalC)&&(S3==1))
  {
    // save the last time you blinked the LED
    previousMillisC = currentMillis;
      
      S2=0;
      step2b();
      soilMoist();
      
  }


  if ((currentMillis - previousMillisD >= intervalD)&&(S4==1))
  {
    // save the last time you blinked the LED
    previousMillisD = currentMillis;

      S3=0;
      
      step4();

  }


  if ((currentMillis - previousMillisE >= intervalE)&&(S5==1))
  {
    // save the last time you blinked the LED
    previousMillisE = currentMillis;
      
      S4=0;
      step5();
      
  }
  
}
