#!/usr/bin/env python
# -*- coding: utf-8 -*-
#Have to install Excel Module by command: pip install openpyxl
import openpyxl
from pathlib import Path
import sys

def OutputResultsToExcel(searchResultArray,searchResultFileName):    
    # get the current working directory
    file_path = ""
    if sys.platform.startswith('win'):
        file_path = str(sys.argv[2])
    else:
        base_path = Path(__file__).parent
        file_path = (base_path / "../../public/crawler_file").resolve() + "/"
#    print(file_path)
    templateFileName = "情報収集(Google検索).xlsx"
    wb = openpyxl.load_workbook(str(file_path) + templateFileName)
    sheet = wb.active
    columns = ["C","D","E","F","G","H","I","J","K","L","M","N","O","P","Q","R","S","T","U","V","W","X","Y","Z","AA","AB","AC","AD","AE","AF"
]
    dataRow = len(list(sheet.rows))
    for searchResultContent in searchResultArray:
        dataRow = dataRow + 1
        c= sheet["A"+str(dataRow)]
        c.value = str(dataRow-1)
        c= sheet["B"+str(dataRow)]
        c.value = searchResultContent["search_keywords"]
        j=0
        for searchResult in searchResultContent["search_results"]:
            c = sheet[columns[j*3]+str(dataRow)]
            c.value = searchResult['title']
            c = sheet[columns[j*3+1]+str(dataRow)]
            c.value = searchResult['url']
            c = sheet[columns[j*3+2]+str(dataRow)]
            c.value = searchResult['meta']
            j=j+1
    searchResultFilePath = file_path + searchResultFileName
    wb.save(searchResultFilePath)
