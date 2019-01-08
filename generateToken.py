#!/usr/bin/env python		
#coding:utf-8


import os


f = open('tokenlist.txt','a')

for i in range(100):
	randStr = os.urandom(8).encode('hex')
	print randStr
	f.write(randStr+"\n")

f.close()
