void drive()

{
 if (Bw == 1)
   
   {
    digitalWrite(motorApinA,  HIGH); //BW
    digitalWrite(motorBpinB, LOW);
    analogWrite(4, Speed); //SPEED  pin
  
    digitalWrite(motorCpinC,  HIGH); //BW
    digitalWrite(motorDpinD, LOW);
    analogWrite(9, Speed); //SPEED  pin
      
   }
 if (Fw == 1)

   {
    digitalWrite(motorApinA,  LOW); //FW
    digitalWrite(motorBpinB, HIGH);
    analogWrite(4, Speed); //SPEED  pin
  
    digitalWrite(motorCpinC,  LOW); //FW
    digitalWrite(motorDpinD, HIGH);
    analogWrite(9, Speed); //SPEED  pin
   }
 if (Left == 1)

  {
    digitalWrite(motorApinA,  HIGH); //FW
    digitalWrite(motorBpinB, LOW);
    analogWrite(4, Speed); //SPEED  pin
  
    digitalWrite(motorCpinC,  LOW); //FW
    digitalWrite(motorDpinD, HIGH);
    analogWrite(9, Speed); //SPEED  pin
  } 
 if (Right == 1)

  {
    digitalWrite(motorApinA,  LOW); //FW
    digitalWrite(motorBpinB, HIGH);
    analogWrite(4, Speed); //SPEED  pin
  
    digitalWrite(motorCpinC,  HIGH); //FW
    digitalWrite(motorDpinD, LOW);
    analogWrite(9, Speed); //SPEED  pin
  } 

 else if (Left == 0 && Right == 0 && Bw == 0 && Fw ==0) 

  {
    digitalWrite(motorApinA,  LOW); //FW
    digitalWrite(motorBpinB, LOW);
    analogWrite(4, Speed); //SPEED  pin
  
    digitalWrite(motorCpinC,  LOW); //FW
    digitalWrite(motorDpinD, LOW);
    analogWrite(9, Speed); //SPEED  pin
  } 
}
