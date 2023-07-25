#!/usr/bin/env python
# -*- coding: utf-8 -*-
from selenium.common.exceptions import NoSuchElementException
from selenium.webdriver.common.by import By

def check_exists_by_xpath(parent,xpath):
    try:
        parent.find_element(By.XPATH,xpath)
    except NoSuchElementException:
        return False
    return True

def check_exists_by_id(parent,id):
    try:
        parent.find_element(By.ID,id)
    except NoSuchElementException:
        return False
    return True

def check_exists_by_tag(parent,tag):
    try:
        parent.find_element(By.TAG_NAME,tag)
    except NoSuchElementException:
        return False
    return True

def getSearchResultURLTitleDiv(parent,runItem):    
    xpathPatterns = [
        '//*[@id="rso"]/div[' + runItem +']/div[@jscontroller!=""]/div/div[@data-snhf="0"]',
        '//*[@id="rso"]/div[' + runItem +']/div/div[@jscontroller!=""]/div/div[@data-snhf="0"]',
        '//*[@id="rso"]/div[' + runItem +']/div/div/div/div[@jscontroller!=""]/div/div[@data-snhf="0"]'
    ]
    for xpathPattern in xpathPatterns:
        if check_exists_by_xpath(parent,xpathPattern):
            return parent.find_element(By.XPATH,xpathPattern)

def getSearchResultMetaDiv(parent,runItem):
    xpathPatterns = [
        '//*[@id="rso"]/div[' + runItem +']/div[@jscontroller!=""]/div/div[@data-sncf="1"]/div[1]',
        '//*[@id="rso"]/div[' + runItem +']/div/div/div[1]/div[@jscontroller!=""]/div/div[@data-sncf="1"]/div[1]',
        '//*[@id="rso"]/div[' + runItem +']/div/div[@jscontroller!=""]/div/div[@data-sncf="1"]/div[1]'
    ]
    for xpathPattern in xpathPatterns:
        if check_exists_by_xpath(parent,xpathPattern):
            return parent.find_element(By.XPATH,xpathPattern)

def getElementByXpath(parent,xpath):
    return parent.find_element(By.XPATH,xpath)

def getElementById(parent,id):
    return parent.find_element(By.ID,id)

def getElementByTag(parent,tag):
    return parent.find_element(By.TAG_NAME,tag)