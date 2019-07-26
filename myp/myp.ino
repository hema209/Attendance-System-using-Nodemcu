#include <ESP8266WiFi.h>     //Include Esp library
#include <WiFiClient.h> 
#include <ESP8266WebServer.h>
#include <ESP8266HTTPClient.h>
#include <SPI.h>
#include <MFRC522.h>        //include RFID library
#include <FirebaseArduino.h>
//***********************************************
#define FIREBASE_HOST "wireless-7d029.firebaseio.com"
#define FIREBASE_AUTH "Acd7mzXIjn08wDu21vshsh5QMGGLlOCimMG2NzDz"
#define WIFI_SSID "JioFi2_029720"
#define WIFI_PASSWORD "8zkc9j34r4"
#define SS_PIN D8 //RX slave select
#define RST_PIN D3

//*****************************************************************
MFRC522 mfrc522(SS_PIN, RST_PIN); // Create MFRC522 instance.

const char *ssid = "JioFi2_029720";  //ENTER YOUR WIFI SETTINGS
const char *password = "******";



String cardid="";
//***************************************************
void setup() {
  delay(1000);
  Serial.begin(115200);
  SPI.begin();  // Init SPI bus
  mfrc522.PCD_Init(); // Init MFRC522 card

  WiFi.mode(WIFI_OFF);        //Prevents reconnection issue (taking too long to connect)
  delay(1000);
  WiFi.mode(WIFI_STA);        //This line hides the viewing of ESP as wifi hotspot
  
  WiFi.begin(ssid, password);     //Connect to your WiFi router
  Serial.println("");

  Serial.print("Connecting to ");
  Serial.print(ssid);
  // Wait for connection
  while (WiFi.status() != WL_CONNECTED) {
    delay(500);
    Serial.print(".");
  }

  //If connection successful show IP address in serial monitor
  Serial.println("");
  Serial.println("Connected");
  Serial.print("IP address: ");
  Serial.println(WiFi.localIP());  //IP address assigned to your ESP
Firebase.begin(FIREBASE_HOST, FIREBASE_AUTH);
}

void loop() {
  //if the connection disconnect the esp will reconnect to wifi
  if(WiFi.status() != WL_CONNECTED){
    WiFi.disconnect();
    WiFi.mode(WIFI_STA);
    Serial.print("Reconnecting to ");
    Serial.println(ssid);
    WiFi.begin(ssid, password);

  while (WiFi.status() != WL_CONNECTED) {
    delay(500);
    Serial.print(".");
  }
    Serial.println("");
    Serial.println("Connected");
    Serial.print("IP address: ");
    Serial.println(WiFi.localIP());  //IP address assigned to your ESP
  }
//***********************************************
 //look for new card
   if ( ! mfrc522.PICC_IsNewCardPresent()) {
  return;//got to start of loop if there is no card present
 }
 // Select one of the cards
 if ( ! mfrc522.PICC_ReadCardSerial()) {
  return;//if read card serial(0) returns 1, the uid struct contians the ID of the read card.
 }
//********************************************
for (byte i = 0; i < mfrc522.uid.size; i++) {
     cardid += mfrc522.uid.uidByte[i];
}

  Serial.println(cardid);     //Print Card ID
  
  Firebase.pushString ("cardid", cardid);
//*******************************************************
delay(500);
  
 cardid=""; 
   //Close connection
}
