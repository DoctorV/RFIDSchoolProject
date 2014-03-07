#################################################################
# This program was written by Bill V to assist with the
# Home Automation Control Simulation. If the RFID card reader
# detects an RFID card, this program will set the appropriate
# variable and send file over to ftp server.
# requires ext package:  pySerial
#################################################################

import serial
import cStringIO
from ftplib import FTP

# Hook up to COM4
ser = serial.Serial(3)
print ser.name

# establish ftp connection
ftp = FTP('ftp.octoleaf.com')
ftp.login('forproject@octoleaf.com', '3Mse6099!')
print ftp.getwelcome()

# To create an empty file
voidfile = cStringIO.StringIO('')

# Setting a flag for later use
rfidStatusFlag = 0

# Function to delete any previous files
# from ftp (start from scratch)
def ftpDelete():
	#filelist = [] #to store all files
	#filelist = ftp.retrlines('LIST',filelist.append)
	
	for f in ftp.nlst():
		try:
			ftp.delete(f)
		except Exception,e:
			print e
			
	
# Run initial ftpDelete to delete
# any files from last instance
ftpDelete()

# Check RFID Reader - This is the main routine...
while True:
	
	raw = ser.readline()
	fileTrig = raw[11]
	print raw
	
	global rfidStatusFlag
	
	# Using if statement for later experimentation.
	if fileTrig == "3" or fileTrig == "6":
		if rfidStatusFlag == 0:
			#global rfidStatusFlag
			rfidStatusFlag = 1
			ftpDelete()
			ftp.storbinary('STOR living.txt', voidfile)
			print "Lights On"
		elif rfidStatusFlag == 1:
			#global rfidStatusFlag
			rfidStatusFlag = 2
			ftpDelete()
			ftp.storbinary('STOR kitchen.txt', voidfile)
			print "Lights On"
		elif rfidStatusFlag == 2:
			#global rfidStatusFlag
			rfidStatusFlag = 3
			ftpDelete()
			ftp.storbinary('STOR bath.txt', voidfile)
			print "Lights On"
		elif rfidStatusFlag == 3:
			#global rfidStatusFlag
			rfidStatusFlag = 4
			ftpDelete()
			ftp.storbinary('STOR bed.txt', voidfile)
			print "Lights On"
		elif rfidStatusFlag == 4:
			#global rfidStatusFlag
			rfidStatusFlag = 5
			ftpDelete()
			ftp.storbinary('STOR living.txt', voidfile)
			print "Lights On"
		else:
			#global rfidStatusFlag
			rfidStatusFlag = 0
			ftpDelete()
			print "Lights Off"



