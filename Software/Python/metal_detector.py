import RPi.GPIO as GPIO
import board
import neopixel
import time
from datetime import datetime
import sys
import threading
from smbus2 import SMBus
import mysql.connector

controllino_address = 0x20

metal_found = False
occupied = False

metalDetector = 4
metalDetector_sensor = 4
emergency_switch = 10

first_strip = neopixel.NeoPixel(board.D18, 15, brightness=0.5)
second_strip = neopixel.NeoPixel(board.D21, 30, brightness=0.5)
GPIO.setup(metalDetector, GPIO.IN)
GPIO.setup(emergency_switch, GPIO.IN)

access_dict = {"Mitarbeiter" : 0, "Teamleiter" : 1, "Admin" : 2, "Super User" : 3}
card_number = "0"
occupied = False
access = -1
red = (255,0,0)
green = (0,255,0)

class door:
	def __init__(self, led, led_start, led_end, name, controllino_pin):
		self.name = name
		self.led = led
		self.led_start = led_start
		self.led_end = led_end
		self.controllino_pin = controllino_pin
		while not self.is_closed():
			time.sleep(0.1)
		self.lock()


	def is_closed(self):
		#closed door = High Signal
		#open door = Low Signal
		with SMBus(1) as bus:
			bus.write_byte(controllino_address, self.controllino_pin)
			time.sleep(0.1)
			return bus.read_byte(controllino_address)


	def wait_go_through(self, other):
		self.unlock()
		other.setLed(red)
		print(f"{self.name} unlocked")
		time.sleep(0.2)
		while self.is_closed():
			time.sleep(0.05)
		time.sleep(1)
		print(f"{self.name} opened")
		while not self.is_closed():
			time.sleep(0.05)
		time.sleep(0.3)
		print(f"{self.name} closed")
		self.lock()
		other.setLed(green)
		print(f"{self.name} locked")
		time.sleep(0.3)


	def lock(self):
		with SMBus(1) as bus:
			bus.write_i2c_block_data(controllino_address, 0,[self.controllino_pin, 1])
		time.sleep(0.01)
		self.setLed(red)


	def unlock(self):
		with SMBus(1) as bus:
			bus.write_i2c_block_data(controllino_address, 0, [self.controllino_pin, 0])
		time.sleep(0.01)
		self.setLed(green)

	def setLed(self, color):
		for x in range(self.led_start, self.led_end):
			self.led[x] = color


	def remove(self):
		self.led.deinit()


def read_metal_detector_sensor():
	with SMBus(1) as bus:
			bus.write_byte(controllino_address, metalDetector_sensor)
			time.sleep(0.1)
			return bus.read_byte(controllino_address)


def metal_detected(sensor):
	global metal_found
	metal_found = True


def emergency_unlock(sensor):
	if (GPIO.input(emergency_switch) == 0):
		door_out.unlock()
	elif (GPIO.input(emergency_switch) == 1):
		door_out.lock()
	else:
		time.sleep(0.01)


def turnstile():
	with SMBus(1) as bus:
		bus.write_i2c_block_data(controllino_address, 0,[3, 0])
		time.sleep(0.2)
		bus.write_i2c_block_data(controllino_address, 0,[3, 1])


def getRights(card):
	try:
	    connection = mysql.connector.connect(
	        host="localhost",
	        db="OHL",
	        user="Ausgang",
	        passwd="Ingram2023!"
	    )
	    cursor = connection.cursor()
	    sql = f"SELECT Permission from Access WHERE Card_ID = {card}"
	    cursor.execute(sql)
	    result = cursor.fetchone()
	    connection.close()
	    if result is None:
	        return "Mitarbeiter"
	    else:
	        return result[0]
	except mysql.connector.Error as e:
		print(f"error: {str(e)}")
		errorDocumentation("getRights", str(e))


def card_reader():
	global card_number
	global occupied
	global access
	while True:
		try:
			card = input("scan card: ")
			if occupied:
				card_number = card
				access = access_dict[getRights(card_number)]
				print(access)
				turnstile()
			else:
				print("not occupied")
		except KeyboardInterrupt:
			door_in.remove()
			door_out.remove()
			GPIO.cleanup()
			exit(0)


def errorDocumentation(function, exception, message=""):
    try:
        date = datetime.now().strftime("%d-%m-%y, %H:%M:%S")
        errorString = "Function: " + function + " / " + "datum: " + date + " / " + "Exception: " + str(
            exception) + " / " + "message: " + message
        with open("/home/OHL_Ausgang/error.txt", "a+") as f:
            f.write(errorString + "\n")
    except Exception as E:
        print(E)

door_in = door(first_strip, 0, 15, "entrance", 0)
door_out = door(second_strip, 0, 15, "exit", 1)
door_lock = door(second_strip, 15, 30, "locked", 2)
GPIO.add_event_detect(metalDetector, GPIO.FALLING, callback=metal_detected, bouncetime=500)
GPIO.add_event_detect(emergency_switch, GPIO.BOTH, callback=emergency_unlock, bouncetime=500)
threading.Thread(target=card_reader).start()

while True:
	try:
		occupied = False
		access = -1
		door_in.wait_go_through(door_out)
		occupied = True	
		door_out.unlock()
		door_in.setLed(red)
		metal_found = False
		while access == -1:
			time.sleep(0.1)
		print(f"access: {access}")
		if access > 1:
			door_out.wait_go_through(door_in)
		else:
			while (not metal_found) or (door_out.is_closed()):
				time.sleep(0.01)
			time.sleep(0.5)
			if metal_found:
				print("metal_found")
				door_out.lock()
				door_lock.wait_go_through(door_in)
			if not door_out.is_closed():
				door_out.wait_go_through(door_in)

	except KeyboardInterrupt:
		door_in.remove()
		door_out.remove()
		GPIO.cleanup()
		exit(0)


	except Exception as E:
		print(E)
		errorDocumentation("mainloop", str(E))


