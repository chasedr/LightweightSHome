#!/usr/bin/python
#-*- coding:utf-8 -*-

import sys

argvlen = len(sys.argv)
if argvlen-1 != 4:
	print "less params"
	sys.exit("ERR")
if sys.argv[1] == "-address":
	addr = sys.argv[2]
else:
	print "first option error."
	sys.exit("ERR")

if sys.argv[3] == "-lux":
	speed = sys.argv[4]
else:
	print "second option error"
	sys.exit("ERR")

sys.exit("OK")


