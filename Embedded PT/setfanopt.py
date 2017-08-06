#!/usr/bin/python
#-*- coding:utf-8 -*-

import sys
import socket
import os

argvlen = len(sys.argv)
addr = ""
speed = ""

if argvlen-1 != 4:
	print "less params"
	sys.exit("ERR")

if sys.argv[1] == "-address":
	addr = sys.argv[2]
else:
	print "first option error."
	sys.exit("ERR")

if sys.argv[3] == "-speed":
	speed = sys.argv[4]
else:
	print "second option error"
	sys.exit("ERR")

client = socket.socket(socket.AF_UNIX,socket.SOCK_STREAM)
client.connect("/tmp/temp.sock")
client.send("address and speed :"+addr+","+speed)
client.close()

sys.exit("OK")


