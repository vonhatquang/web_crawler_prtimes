#!/usr/bin/env python
# -*- coding: utf-8 -*-
#Have to install Selenium by command: pip install selenium
#Have to install Webdriver Manager by command: pip install webdriver_manager
import sys
from selenium import webdriver
from selenium.webdriver.chrome.service import Service as ChromeService
from webdriver_manager.chrome import ChromeDriverManager

def CreateWebDriver():    
    options = webdriver.ChromeOptions()
    options.add_argument("--headless=new")
    options.add_argument("--no-sandbox")
    options.add_argument("--disable-dev-shm-usage")
    options.add_argument("--disk-cache-dir=/path/to/cache")
    if sys.platform.startswith('win'):
        return webdriver.Chrome(service=ChromeService(ChromeDriverManager().install()), options=options)
    else:
        return webdriver.Chrome(service=ChromeService("/usr/bin/chromedriver"), options=options)

def ClearWebBrowserData(driver):
    driver.execute_cdp_cmd('Storage.clearDataForOrigin', {"origin": '*',"storageTypes": 'all',})
    return driver
