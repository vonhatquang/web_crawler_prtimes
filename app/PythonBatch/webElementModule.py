#!/usr/bin/env python
# -*- coding: utf-8 -*-
from selenium.common.exceptions import NoSuchElementException
from selenium.webdriver.common.by import By

def getSearchResultURLTitleDiv(parent,runItem):    
    xpathPatterns = [
        '//*[@id="rso"]/div[' + runItem +']/div[@jscontroller!=""]/div/div[@data-snhf="0"]',
        '//*[@id="rso"]/div[' + runItem +']/div/div[@jscontroller!=""]/div/div[@data-snhf="0"]',
        '//*[@id="rso"]/div[' + runItem +']/div/div/div/div[@jscontroller!=""]/div/div[@data-snhf="0"]'
    ]
    notExist = None
    for xpathPattern in xpathPatterns:
        try:
            resultURLTitleDiv = getElementByXpath(parent,xpathPattern)
            if resultURLTitleDiv is not None:
                return resultURLTitleDiv
        except NoSuchElementException:
            notExist = None
    return notExist

def getSearchResultMetaDiv(parent,runItem):
    xpathPatterns = [
        '//*[@id="rso"]/div[' + runItem +']/div[@jscontroller!=""]/div/div[@data-sncf="1"]/div[1]',
        '//*[@id="rso"]/div[' + runItem +']/div/div/div[1]/div[@jscontroller!=""]/div/div[@data-sncf="1"]/div[1]',
        '//*[@id="rso"]/div[' + runItem +']/div/div[@jscontroller!=""]/div/div[@data-sncf="1"]/div[1]'
    ]
    notExist = None
    for xpathPattern in xpathPatterns:
        try:
            resultMetaDiv = getElementByXpath(parent,xpathPattern)
            if resultMetaDiv is not None:
                return resultMetaDiv
        except NoSuchElementException:
            notExist = None
    return notExist

def getElementByXpath(parent,xpath):
    try:
        return parent.find_element(By.XPATH,xpath)
    except NoSuchElementException:
        return None
    
def getElementsByXpath(parent,xpath):
    try:
        return parent.find_elements(By.XPATH,xpath)
    except NoSuchElementException:
        return None

def getElementById(parent,id):
    try:
        return parent.find_element(By.ID,id)
    except NoSuchElementException:
        return None

def getElementByTag(parent,tag):
    try:
        return parent.find_element(By.TAG_NAME,tag)
    except NoSuchElementException:
        return None

def getElementsByTag(parent,tag):
    try:
        return parent.find_elements(By.TAG_NAME,tag)
    except NoSuchElementException:
        return None

def getElementByCssSelector(parent,cssSelector):
    try:
        return parent.find_element(By.CSS_SELECTOR,cssSelector)
    except NoSuchElementException:
        return None
    
def getElementsByCssSelectors(parent,cssSelector):
    try:
        return parent.find_elements(By.CSS_SELECTOR,cssSelector)
    except NoSuchElementException:
        return None
