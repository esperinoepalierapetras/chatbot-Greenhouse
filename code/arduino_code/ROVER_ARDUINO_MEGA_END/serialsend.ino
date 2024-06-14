void serial_send()
{
  

 Serial2.print(Temp);
 Serial2.print(",");
 Serial2.print(SoilHum);
 Serial2.print(",");
 Serial2.print(Temp);
 Serial2.print(",");
 Serial2.print(A);
 Serial2.print(",");
 Serial2.print(C);
 Serial2.println("");
}
