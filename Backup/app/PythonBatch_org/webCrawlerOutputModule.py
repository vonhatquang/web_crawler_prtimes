#!/usr/bin/env python
# -*- coding: utf-8 -*-
#Have to install Excel Module by command: pip install openpyxl
import openpyxl
from pathlib import Path
import sys

def OutputResultsToExcel(searchResultArray,searchResultFileName):    
    # get the current working directory
    directorySlash = "/"
    if sys.platform.startswith('win'):
        directorySlash = "\\"
    base_path = Path(__file__).parent
    file_path = (base_path / "../../public/crawler_file").resolve()
    path = str(file_path) + directorySlash
    templateFileName = "情報収集(Google検索).xlsx"
    wb = openpyxl.load_workbook(path + templateFileName)
    sheet = wb.active
    
    dataRow = len(list(sheet.rows))
    for searchResultContent in searchResultArray:
        dataRow = dataRow + 1
        c= sheet[colToExcel(1)+str(dataRow)]
        c.value = str(dataRow-1)
        c= sheet[colToExcel(2)+str(dataRow)]
        c.value = searchResultContent["search_keywords"]
        j=0
        for searchResult in searchResultContent["search_results"]:
            c = sheet[colToExcel(j*3+3)+str(dataRow)]
            c.value = searchResult['url']
            c = sheet[colToExcel(j*3+4)+str(dataRow)]
            c.value = searchResult['title']
            c = sheet[colToExcel(j*3+5)+str(dataRow)]
            c.value = searchResult['meta']
            j=j+1
    searchResultFilePath = path + searchResultFileName
    wb.save(searchResultFilePath)

def colToExcel(col):
    excelCol = str()
    div = col
    while div:
        (div, mod) = divmod(div-1, 26)
        excelCol = chr(mod + 65) + excelCol

    return excelCol
