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
def crawlerData(driver, content):
    searchResults = []
    #/html/body/main/section/div/div[3]/ul/li[3]/button
    webElementModule.getElementByCssSelector(driver,'button.list-article-display-change__button--text').click()
    recordCount =  webElementModule.getElementByCssSelector(driver,'div.search-keyword-content__result').text.replace("件","")
    recordPage = (int(recordCount)+39)/40
    recordRun = 0
    for i in range(1, recordPage):        
        driver.get("https://prtimes.jp/main/action.php?run=html&page=searchkey&search_word="+content+"&pagenum=" + str(i))
        articleLinks = webElementModule.getElementsByCssSelectors(driver,'article.list-article')
        for articleLink in articleLinks:
            prtimes_url = articleLink.get_attribute('href')
            no = recordRun + 1
            driver.get(prtimes_url)
            article_title = webElementModule.getElementByCssSelector(driver,'h1.release--title').text
            release_date = webElementModule.getElementByCssSelector(driver,'time.time.icon-time-release-svn').text
            release_date_pos = release_date.find("日")
            release_time = webElementModule.getElementByCssSelector(driver,'time.time.icon-time-release-svn').get_attribute("datetime")
            aside = webElementModule.getElementByCssSelector(driver,'aside.sidebar-release')
            company_name = webElementModule.getElementByCssSelector(aside,'div.company-name').text
            containerInformationCompany = webElementModule.getElementByCssSelector(driver,'#containerInformationCompany')
            containerInformationCompanyLis = webElementModule.getElementsByCssSelectors(containerInformationCompany,'li')
            containerInformationCompanyLiRun = 0
            company_homepage_url = ""
            industry = ""
            listing = ""
            capital = ""
            date_of_establishment = ""
            url_of_the_product_service_described_in_the_article = ""
            for containerInformationCompanyLi in containerInformationCompanyLis:
                containerInformationCompanyLiRun = containerInformationCompanyLiRun +1
                bodyInformation = webElementModule.getElementByCssSelector(containerInformationCompanyLi,'span.body-information').text
                if containerInformationCompanyLiRun == 1:
                        company_homepage_url = bodyInformation
                elif containerInformationCompanyLiRun == 2:
                        industry = bodyInformation
                elif containerInformationCompanyLiRun == 6:
                        listing = bodyInformation
                elif containerInformationCompanyLiRun == 7:
                        capital = bodyInformation
                elif containerInformationCompanyLiRun == 8:
                        date_of_establishment = bodyInformation
            rbody = webElementModule.getElementByCssSelector(driver,'div.rbody')
            if len(rbody) <=0:
                rbody = webElementModule.getElementByCssSelector(driver,'div.r-text')
                rtextas = webElementModule.getElementsByCssSelectors(rbody,'a')
                for rtexta in rtextas:
                    if url_of_the_product_service_described_in_the_article == "":
                        url_of_the_product_service_described_in_the_article = rtexta.getAttribute("href")
                    else:                        
                        url_of_the_product_service_described_in_the_article = url_of_the_product_service_described_in_the_article + "\n" + rtexta.getAttribute("href")
            article = webElementModule.getElementByCssSelector(driver,'article')
            entry_info_renew = webElementModule.getElementByCssSelector(article,'dl.entry-info-renew')
            dts = webElementModule.getElementsByCssSelectors(entry_info_renew,'dt')
            dds = webElementModule.getElementsByCssSelectors(entry_info_renew,'dd')
            ddRun = 0
            business_category = ""
            kw_displayed_at_the_bottom_of_the_article = ""
            for dt in dts:
                ddRun = ddRun+1
                dtText = dt.text
                if dtText == "ビジネスカテゴリ":
                     if business_category == "":
                        business_category = dds[ddRun].text
                     else:
                        business_category = business_category + "\n" + dds[ddRun].text                          
                elif dtText == "キーワード":
                     kw_displayed_at_the_bottom_of_the_article =dds[ddRun].text

            searchResults.append({
                'no':no,
                'industry':industry,
                'company_name':company_name,
                'company_homepage_url':company_homepage_url,
                'listing':listing,
                'capital':capital,
                'date_of_establishment':date_of_establishment,
                'article_title':article_title,
                'release_date':release_date[release_date_pos + 1: len(release_date)] ,
                'url_of_the_product_service_described_in_the_article':url_of_the_product_service_described_in_the_article,
                'business_category':business_category,
                'kw_displayed_at_the_bottom_of_the_article':kw_displayed_at_the_bottom_of_the_article,
                'prtimes_url':prtimes_url,
                'release_time':release_time
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
    searchResultFileName = str(sys.argv[1])+"_PRTIMES.xlsx"
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
            driver.get("https://prtimes.jp/main/action.php?run=html&page=searchkey&search_word="+content)
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
            searchResults = crawlerData(driver, content) 
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
        