void test()

{
 if (B == 0)

  { 
   mm.setResetDefaults(0, 0);
   mm.reset();
  
  }
 
 if (B == 1)

 {
      
      int POS1 = 0;
      int POS = map(POS1, 0, 180, 180, 0);
      int POS2 = POS-3;
      int SPEED = 10;
      
      myservoL.write(POS1,SPEED,false);  
      myservoR.write(POS2,SPEED,false);
      delay(3000);
      

      digitalWrite(motorEpinE,  LOW); //BW
      digitalWrite(motorFpinF, HIGH);
      analogWrite(10, 255); //SPEED  pin
      delay(35000);


      

     
      
  
     
      digitalWrite(motorEpinE,  HIGH); //BW
      digitalWrite(motorFpinF, LOW);
      analogWrite(10, 255); //SPEED  pin
      delay(35000);




       POS1 = 92;
       POS = map(POS1, 0, 180, 180, 0);
       POS2 = POS-3;
       SPEED = 10;
      
      myservoL.write(POS1,SPEED,false);  
      myservoR.write(POS2,SPEED,false);
      delay(3000);
     
      
 }
      
}
