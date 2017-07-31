//   
//   FILE:  dht_test.pde  
// PURPOSE: DHT library test sketch for Arduino  
//  
  
#include <dht.h>  
#include "ESP8266.h"
  
dht DHT;  
  
#define DHT11_PIN 4//put the sensor in the digital pin 4  
#define SSID        "ishangzu-306"
#define PASSWORD    "ishangzu8888"
#define IPADDR      "192.168.0.11"
#define PORT        60000
ESP8266 wifi(Serial);

void setup()  
{  
  Serial.begin(115200);  
  Serial.println("DHT TEST PROGRAM ");  
  Serial.print("LIBRARY VERSION: ");  
  Serial.println(DHT_LIB_VERSION);  
  Serial.println();  
  Serial.println("Type,\tstatus,\tHumidity (%),\tTemperature (C)"); 
 
  Serial.print("setup begin\r\n");
  
  Serial.print("FW Version:");
  Serial.println(wifi.getVersion().c_str());
    
  if (wifi.setOprToStationSoftAP()) {
      Serial.print("to station + softap ok\r\n");
  } else {
      Serial.print("to station + softap err\r\n");
  }
   
  if (wifi.joinAP(SSID, PASSWORD)) {
      Serial.print("Join AP success\r\n");
      Serial.print("IP: ");
      Serial.println(wifi.getLocalIP().c_str());    
  } else {
      Serial.print("Join AP failure\r\n");
  }
 
  if (wifi.enableMUX()) {
      Serial.print("multiple ok\r\n");
  } else {
      Serial.print("multiple err\r\n");
  }
/*  
  if (wifi.startTCPServer(8090)) {
      Serial.print("start tcp server ok\r\n");
  } else {
      Serial.print("start tcp server err\r\n");
  }
  
  if (wifi.setTCPServerTimeout(10)) { 
      Serial.print("set tcp server timout 10 seconds\r\n");
  } else {
      Serial.print("set tcp server timout err\r\n");
  }
*/
  if(wifi.createTCP(2,IPADDR,PORT))
  {
    Serial.print("create TCP connection ok");
  }
  else
  {
    Serial.print("create TCP connection failure");
  }
  
  Serial.print("setup end\r\n");
  
}  
  
void loop()  
{  
  unsigned char buff[]={0xaa,0xaa,0x00,0x01,0x00,21,(unsigned char)DHT.humidity,0,(unsigned char)DHT.temperature,0,0x01,0x01,0x01,0x01,0xab,0xab};
  
  if(wifi.send(2,buff,sizeof(buff)))
  {
    Serial.print("send ok");
  }
  else
  {
    Serial.print("send error");
  }
  // READ DATA  
  Serial.print("DHT11, \t");  
 int chk = DHT.read11(DHT11_PIN);  
  switch (chk)  
  {  
    case 0:  Serial.print("OK,\t"); break;  
    case -1: Serial.print("Checksum error,\t"); break;  
    case -2: Serial.print("Time out error,\t"); break;  
    default: Serial.print("Unknown error,\t"); break;  
  }  
 // DISPLAT DATA  
  Serial.print(DHT.humidity,2);  
  Serial.print(",\t");  
  Serial.println(DHT.temperature,3);  
  
  delay(10000);  
}  
//  
// END OF FILE  
//  
