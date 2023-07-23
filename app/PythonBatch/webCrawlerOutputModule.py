#!/usr/bin/env python
# -*- coding: utf-8 -*-
#Have to install Excel Module by command: pip install openpyxl
import openpyxl
from pathlib import Path
import sys
from copy import copy

def OutputResultsToExcel(searchResultArray,searchResultFileName):    
    # get the current working directory
    file_path = str(sys.argv[2])
    # if sys.platform.startswith('win'):
    #     file_path = str(sys.argv[2])
    # else:
    #     base_path = Path(__file__).parent
    #     file_path = (base_path / "../../public/crawler_file").resolve() + "/"
#    print(file_path)
    templateFileName = "PRTIMES.xlsx"
    wb = openpyxl.load_workbook(str(file_path) + templateFileName)
    columns = ["A","B","C","D","E","F","G","H","I","J","K","L","M","N"]
    keywordRow = 0
    
    for searchResultContent in searchResultArray:
        sheet = wb.copy_worksheet(wb['PRTIMES'])
        sheet.title = searchResultContent["search_keywords"] 
        dataRow = len(list(sheet.rows))            
        dstCell = sheet["B" + str(dataRow-1)]
        dstCell.value = searchResultContent["search_keywords"]

        dataRow = dataRow + 1
        for searchResult in searchResultContent["search_results"]:
            c = sheet[columns[0]+str(dataRow)]
            c.value = searchResult['no']
            c = sheet[columns[1]+str(dataRow)]
            c.value = searchResult['industry']
            c = sheet[columns[2]+str(dataRow)]
            c.value = searchResult['company_name']
            c = sheet[columns[3]+str(dataRow)]
            c.value = searchResult['company_homepage_url']
            c = sheet[columns[4]+str(dataRow)]
            c.value = searchResult['listing']
            c = sheet[columns[5]+str(dataRow)]
            c.value = searchResult['capital']
            c = sheet[columns[6]+str(dataRow)]
            c.value = searchResult['date_of_establishment']
            c = sheet[columns[7]+str(dataRow)]
            c.value = searchResult['article_title']
            c = sheet[columns[8]+str(dataRow)]
            c.value = searchResult['release_date']
            c = sheet[columns[9]+str(dataRow)]
            c.value = searchResult['url_of_the_product_service_described_in_the_article']
            c = sheet[columns[10]+str(dataRow)]
            c.value = searchResult['business_category']
            c = sheet[columns[11]+str(dataRow)]
            c.value = searchResult['kw_displayed_at_the_bottom_of_the_article']
            c = sheet[columns[12]+str(dataRow)]
            c.value = searchResult['prtimes_url']
            c = sheet[columns[13]+str(dataRow)]
            c.value = searchResult['release_time']
            dataRow = dataRow + 1
    searchResultFilePath = file_path + searchResultFileName
    wb.remove(wb['PRTIMES'])
    wb.save(searchResultFilePath)
