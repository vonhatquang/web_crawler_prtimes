#!/usr/bin/env python
# -*- coding: utf-8 -*-
import webCrawlerModule
import datetime

if __name__ == "__main__":
    startDateTime = datetime.datetime.now()
    webCrawlerModule.webCrawlerDataProcess()
    endDateTime = datetime.datetime.now()
    print("createDriver - Start Time: " + str(startDateTime) + " ~ End Time: " + str(endDateTime) + " => Process Time: " + str(endDateTime - startDateTime))
