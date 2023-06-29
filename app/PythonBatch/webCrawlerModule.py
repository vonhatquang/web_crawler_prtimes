#!/usr/bin/env python
# -*- coding: utf-8 -*-
import sys
import time
import webDriverModule
import webElementModule
import webReadWriteFile
import webCrawlerOutputModule
from selenium.webdriver.common.keys import Keys
from selenium.common.exceptions import NoSuchElementException
from selenium.webdriver.common.by import By
import datetime

#Crawler Data Start
def crawlerData(driver):
    crawledCount = 0
    hasData = False
    url = ""
    title = ""
    meta = ""
    searchResults = []
    rso = webElementModule.getElementByCssSelector(driver,'#rso')
    if rso is not None:
        searchResultDivs = webElementModule.getElementsByXpath(rso,'./child::div')
#        print(" Search Result Divs: " + str(len(searchResultDivs)))
        for searchResultDiv in searchResultDivs:            
#            print(" Search Result Div Text: " + searchResultDiv.text +"\n")
            resultDivLength = len(searchResultDiv.text)
#            print("resultDivLength:" + str(resultDivLength) +"\n")
            hasData = False
            searchResultURLTitleDiv = webElementModule.getElementByXpath(searchResultDiv,'.//div[@data-snhf="0"][1]') 
            if searchResultURLTitleDiv is not None:            
#                print(searchResultURLTitleDiv.text)            
                searchResultURL = webElementModule.getElementByXpath(searchResultURLTitleDiv,'.//a[1]')
                if searchResultURL is not None:
                    hasData = True
                    url = searchResultURL.get_attribute('href')
#                    print("Url:" + url +"\n")
                    title = searchResultURL.text
                    enterKeyPos = searchResultURL.text.find("\n")
#                    print("enterKeyPos:" + str(enterKeyPos) +"\n")
                    if enterKeyPos >= 0:
                        title = title[0:enterKeyPos]
#                    print("Title:" + title +"\n")
                    enterKeyPos = searchResultDiv.text.find("\n",searchResultDiv.text.find("http"))
                    metaData = searchResultDiv.text[enterKeyPos + 1: len(searchResultDiv.text)]  
                    enterKeyPos = metaData.find("\n")
                    if metaData[enterKeyPos + 1: 4] == "PDF\n":
                        enterKeyPos = enterKeyPos + 4
                    meta = ""
                    if metaData.find("\n",enterKeyPos) == 0:
                        meta = metaData[0: len(metaData)] 
                    else:          
                        meta = metaData[0: enterKeyPos] 
#                    print("Meta:" + meta +"\n") 
                if hasData == True:
                    searchResults.append({
                        'url':url,
                        'title':title,
                        'meta':meta
                    })
    return searchResults

def webCrawlerDataProcess():   
    
#    startDateTime = datetime.datetime.now()
    #Web Driver Create
    driver = webDriverModule.CreateWebDriver()
    driver = webDriverModule.ClearWebBrowserData(driver)
#    endDateTime = datetime.datetime.now()
#    print("Create Driver - Start Time: " + str(startDateTime) + " ~ End Time: " + str(endDateTime) + " => Process Time: " + str(endDateTime - startDateTime))

#    driver.get("https://www.google.com/")
    #Read Search Keyword From File
    searchKeywordFileName = str(sys.argv[1])+"_searchKeywords.txt"
    searchResultFileName = str(sys.argv[1])+"_情報収集(Google検索).xlsx"
    contents= webReadWriteFile.ReadFile(searchKeywordFileName)
#    contents= ["あがの市民病院　バナー広告掲載","あかびら市立病院　バナー広告掲載","あさひ総合病院　バナー広告掲載","あま市民病院　バナー広告掲載","いすみ医療センター　バナー広告掲載","いの町立国民健康保険仁淀病院　バナー広告掲載","いわき市立総合磐城共立病院　バナー広告掲載","えびの市立病院　バナー広告掲載","かなぎ病院　バナー広告掲載","かみいち総合病院　バナー広告掲載","くしもと町立病院　バナー広告掲載","くまもと県北病院　バナー広告掲載","くらて病院　バナー広告掲載","さいたま市立病院　バナー広告掲載","さくら福祉保健事務組合　バナー広告掲載","さぬき市民病院　バナー広告掲載","さんむ医療センター　バナー広告掲載","せたな町立国保病院　バナー広告掲載","たつの市民病院　バナー広告掲載","つがる西北五広域連合　バナー広告掲載"]
    limit = 10
    #Search Result Data Which will output to excel
    searchKeywordResultArray = []
    #Loop Search Keyword
    contentRun = 0
    for content in contents:
        if content != "":
            contentRun = contentRun + 1
            startDateTime = datetime.datetime.now()
            driver.execute_cdp_cmd('Storage.clearDataForOrigin', {"origin": '*',"storageTypes": 'all', })
            #Open Web Page On Chrome Web Browser Via Web Driver
            driver.get("https://www.google.com/search?source=hp&ei=P8sOYJyjH5P6wQO0xbXoAg&q="+content)
#            searchKeywordInput = webElementModule.getElementByCssSelector(driver,'#APjFqb')
#            searchKeywordInput.send_keys(content)
#            searchKeywordInput.send_keys(Keys.RETURN)
#            if searchKeywordInput is not None:
                #Get data from search results
#            searchResults, crawledNum = crawlerData(driver,searchResults,crawledNum,limit) 
#            endDateTime = datetime.datetime.now()
#            print("Input Content To Search - Start Time: " + str(startDateTime) + " ~ End Time: " + str(endDateTime) + " => Process Time: " + str(endDateTime - startDateTime))

#            print("Search Keyword: " + str(contentRun))
            searchResults = []
            searchResults = crawlerData(driver) 
            if len(searchResults) > 0:
                searchKeywordResultArray.append({
                    'search_keywords':content,
                    'search_results':searchResults
                })
#            endDateTime = datetime.datetime.now()
#            print(" Start Time: " + str(startDateTime) + " ~ End Time: " + str(endDateTime) + " => Process Time: " + str(endDateTime - startDateTime))

    
#    for searchKeywordResult in searchKeywordResultArray:
#        print('Keyword: ' + searchKeywordResult['search_keywords'] +"\n")
#        for searchResult in searchKeywordResult['search_results']:
#            print('     Url: ' + searchResult['url'] +"\n")
#            print('     Title: ' + searchResult['title'] +"\n")
#            print('     Meta: ' + searchResult['meta'] +"\n")
    #Ouput Search Results
#    startDateTime = datetime.datetime.now()
    webCrawlerOutputModule.OutputResultsToExcel(searchKeywordResultArray,searchResultFileName)
#    endDateTime = datetime.datetime.now()
#    print(" Output File: " + str(startDateTime) + " ~ End Time: " + str(endDateTime) + " => Process Time: " + str(endDateTime - startDateTime))
    #Crawler Data End

    #Close Web Browser
    driver.quit()   
        