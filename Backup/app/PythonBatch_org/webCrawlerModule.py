#!/usr/bin/env python
# -*- coding: utf-8 -*-
import sys
import time
import webDriverModule
import webElementModule
import webReadWriteFile
import webCrawlerOutputModule
from selenium.webdriver.common.keys import Keys
import datetime

#Crawler Data Start
def crawlerData(driver,searchResults, crawledNum, limit):
    startDateTime = datetime.datetime.now() 
    crawledCount = 0
    if webElementModule.check_exists_by_xpath(driver,'//*[@id="rso"]'):
        rso = webElementModule.getElementByXpath(driver,'//*[@id="rso"]')
        crawledCount = crawledNum
        for x in range(14):
            runItem = str(x+2)
            if webElementModule.check_exists_by_xpath(rso,'//*[@id="rso"]/div[' + runItem +']'):
                searchResultDiv = webElementModule.getElementByXpath(rso,'//*[@id="rso"]/div[' + runItem +']')
                searchResultURLTitleDiv = webElementModule.getSearchResultURLTitleDiv(searchResultDiv,runItem)
                searchResult={
                    'url':"",
                    'title':"",
                    'meta':""
                }
                hasData = False
                if searchResultURLTitleDiv is not None:
                    if webElementModule.check_exists_by_tag(searchResultURLTitleDiv,'a'):
                        searchResultURL = webElementModule.getElementByTag(searchResultURLTitleDiv,'a')
                        searchResult['url'] = searchResultURL.get_attribute('href')
                        searchResultTitle = webElementModule.getElementByTag(searchResultURL,'h3')
                        searchResult['title'] = searchResultTitle.text
                        hasData= True
                searchResultMetaDiv = webElementModule.getSearchResultMetaDiv(searchResultDiv,runItem)
                if searchResultMetaDiv is not None:
                    searchResult['meta'] = searchResultMetaDiv.text
                    hasData= True
                if hasData:
                    crawledCount = crawledCount +1
                    searchResults.append(searchResult)
                    if crawledCount - crawledNum == limit:
                        break
    endDateTime = datetime.datetime.now()
    print(endDateTime)
    print("crawlerData - Start Time: " + str(startDateTime) + " ~ End Time: " + str(endDateTime) + " => Process Time: " + str(endDateTime - startDateTime))
    return searchResults, crawledCount

def webCrawlerDataProcess():   
    startDateTime = datetime.datetime.now() 
    #Web Driver Create
    driver = webDriverModule.CreateWebDriver()
    driver = webDriverModule.ClearWebBrowserData(driver)
    #Open Web Page On Chrome Web Browser Via Web Driver
    driver.get("https://www.google.com/")
    #Read Search Keyword From File
    searchKeywordFileName = str(sys.argv[1])+"_searchKeywords.txt"
    searchResultFileName = str(sys.argv[1])+"_情報収集(Google検索).xlsx"
    contents= webReadWriteFile.ReadFile(searchKeywordFileName)
    limit = 10
    #Search Result Data Which will output to excel
    searchResultArray = []
    #Loop Search Keyword
    for content in contents:
        if content != "":
            searchResults = []
            crawledNum = 0
            searchResultContent = {
                'search_keywords':content,
                'search_results':searchResults
            }
#            driver.execute_cdp_cmd('Storage.clearDataForOrigin', {"origin": '*',"storageTypes": 'all', })
#            time.sleep(1)
            if webElementModule.check_exists_by_id(driver,'APjFqb'):
                #Enter add Search Keywords Textbox
                webElementModule.getElementById(driver,'APjFqb').send_keys(content)
                webElementModule.getElementById(driver,'APjFqb').send_keys(Keys.RETURN)
                #Get data from search results
                searchResults, crawledNum = crawlerData(driver,searchResults,crawledNum,limit) 
#                while webElementModule.check_exists_by_id(driver,'pnnext') and len(searchResults) < limit: 
#                    if webElementModule.check_exists_by_id(driver,'pnnext'):   
#                        webElementModule.getElementById(driver, 'pnnext').click() 
#                        searchResults, crawledNum = crawlerData(driver,searchResults,crawledNum,limit-len(searchResults))     
                if len(searchResults) > 0:
                    searchResultContent["search_results"] = searchResults
                searchResultArray.append(searchResultContent)
            time.sleep(1)
    #Ouput Search Results
    webCrawlerOutputModule.OutputResultsToExcel(searchResultArray,searchResultFileName)
    #Crawler Data End

    #Close Web Browser
    driver.quit()
    endDateTime = datetime.datetime.now()
    print(endDateTime)
    print("webCrawlerDataProcess - Start Time: " + str(startDateTime) + " ~ End Time: " + str(endDateTime) + " => Process Time: " + str(endDateTime - startDateTime))
    