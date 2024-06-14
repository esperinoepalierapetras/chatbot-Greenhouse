
void soilMoist()

{

    r = analogRead(A0);
  

    if (mm.add(r) != MINMAX_NO_CHANGE)  //  changed minimum or maximum or reset
  {
    /*
    Serial.print(mm.count());
    Serial.print("\t");
    Serial.print(mm.minimum());
    Serial.print("\t");
    Serial.print(mm.maximum());
    Serial.print("\n");
    */
    
    int mx = mm.minimum();

    value = constrain(mx,400,1023);  
    value = map(value,400,1023,100,0);  
    
  //Serial.print("Soil humidity: ");
  Serial.println(value);
  //Serial.println("%");
    
  }
  return false;
}
