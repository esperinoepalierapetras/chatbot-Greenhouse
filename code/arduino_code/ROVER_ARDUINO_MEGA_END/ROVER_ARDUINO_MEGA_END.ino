#include "MINMAX.h"


MINMAX mm;

uint32_t start, stop;

#include <VarSpeedServo.h> 

VarSpeedServo myservoL;
VarSpeedServo myservoR;
/////////////////////////////////////////////////////////////////////////////

#include <arduino-timer.h>


// create a timer that holds 5 tasks, with millisecond resolution,
// and a custom handler type of 'const char *
//Timer<5, millis, const char *> t_timer;
Timer<5, millis, bool> t_timer;
////////////////////////////////////MOTORS//////////////////////////////////////////////////////////

int motorApinA = 2;
int motorBpinB = 3;

int motorCpinC = 5;
int motorDpinD = 6;

int motorEpinE = 7;
int motorFpinF = 8;

////////////////////////////////////////////////////////////////////////////////////////////////////

const int ledPin =  LED_BUILTIN;
const int ledPin2 =  22;

//////////////////////////////////////serialRead variables///////////////////////////////////////////
int Left;
int Right;
int Fw;
int Bw;
int Speed;

int r;
int value;
////////////////////////////////////////////////////////////////////////////////////////////////////
int B ;


unsigned long previousMillisA = 0;        
unsigned long previousMillisB = 0;
unsigned long previousMillisC = 0;       
unsigned long previousMillisD = 0;
unsigned long previousMillisE = 0;


int S1=1;
int S2=1;
int S3=1;
int S4=1;
int S5=1;
//////////////////////////////////////serialSend variables///////////////////////////////////////////

int Temp;
int SoilHum;
int Hum;
int A = 0;
int C = 0;



void setup() 

{
  pinMode(motorApinA, OUTPUT);
  pinMode(motorBpinB, OUTPUT);
  pinMode(4,  OUTPUT);
  
  pinMode(motorCpinC, OUTPUT);
  pinMode(motorDpinD, OUTPUT);
  pinMode(9,  OUTPUT);
  
  pinMode(motorEpinE,  OUTPUT);
  pinMode(motorFpinF, OUTPUT);
  pinMode(10, OUTPUT);

  Speed = 254;
  
  myservoL.attach(11);
  myservoR.attach(12);
  
  myservoL.write(90,10,false);  
  myservoR.write(87,10,false);
  
  pinMode(LED_BUILTIN, OUTPUT);
  pinMode(22, OUTPUT);
  Serial.begin(115200);
  Serial1.begin(115200);
  Serial2.begin(115200);
  Serial3.begin(115200);

  
  
  mm.setResetDefaults(0, 0);
  mm.reset();


}

void loop() {
 
  
 process_1();
 timer();
 timer2();
 //timer3();
 drive();
 soilMoist();
       
 
  Temp = 30;
  SoilHum = 50;
  Hum = 60;

}
