//DHT11 (ambient humidity & temperature): +5v, gnd, D2
//light sensor: +5v, gnd, A0
//preasure: +3.3v, gnd, SDA-A4, SCL-A5
//Radiofrequency module:
   //3.3v
   //gnd
   //mosi-11
   //miso-12
   //csn-10
   //sck-13
   //ce-9



#include <DHT11.h>
#include <SPI.h>
#include <nRF24L01.h>
#include <RF24.h>
#include <RF24_config.h>


int pin=2;
DHT11 dht11(pin); 
RF24 radio(9,10);
 String message; 


void setup()
{
   Serial.begin(9600);
  radio_start(0x4c);     //call the radio to setup
}




void loop()
{
  /////////////////////////////////////Ambient humidity & temperature//////////////
  
  int err;
  float temp, humi;
  if((err=dht11.read(humi, temp))==0)
  {
    Serial.print("ambient temperature:");   ////Serial print the temperature and humidity measure
    Serial.print(temp);
    Serial.print("ambient humidity:");
    Serial.print(humi);
    Serial.println();
    
    dht_write(temp,"tmp0");//Send temperature data through the radio frequency transmiter
    dht_write(humi,"hue0");//Send humidity data through the radio frequency transmiter
  }
  else                    //Show if there was some error getting temperature and humidity data
  {
    Serial.println();
    Serial.print("Error No :");
    Serial.print(err);
    Serial.println();    
  }
  
  //////////////////////////////////////////Light sensor///////////////////////
  
    int lectura_luz = analogRead(A0);
  
  float luz =100 - lectura_luz * (100 / 1023.0);
 
  Serial.print("Luz:");  //Serial print the light measure
  Serial.println(luz);
  
  dht_write(luz,"lis0");  //Send light data trhough the radio frequency transmiter

  
  
////////////////////////////////////////////////////////////////////////////
  
  
  delay(DHT11_RETRY_DELAY); //delay for reread
}












  /////////////////////////////////////Radio frequency functions///////////////////////



void radio_start(int channel)
{   
  radio.begin();              
  radio.setPALevel(RF24_PA_MAX);
  radio.setChannel(76);
  radio.openWritingPipe(0xF0F0F0F0E1LL);
  radio.enableDynamicPayloads();
  radio.powerUp();
}  
void sensor_write(int sensor, String prefix, int sensor_id)
{                                          
  map(sensor,0,1023,0,1023);
  String sensor_out = prefix + String(analogRead(sensor_id),DEC);
  write_data(sensor_out);
  delay(5000);
}

void dht_write(int sensor, String prefix)
{                                          
  map(sensor,0,1023,0,1023);
  String sensor_out = prefix + sensor;
  write_data(sensor_out);
  delay(5000);
}
void write_data(String data)
{                          
  char outBuffer[32]= "";                            //Create the char 'outBuffer' allowing a max payload of 32 characters
  data.toCharArray(outBuffer, 32);                   //Convert string message to the char array of outBuffer
  radio.write(outBuffer, strlen(outBuffer));         //Transmit outBuffer
  Serial.println(data);                              //Serial print data (debug)
}
