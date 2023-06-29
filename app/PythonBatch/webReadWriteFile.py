#!/usr/bin/env python
# -*- coding: utf-8 -*-
from pathlib import Path
import sys

def ReadFile(filename):
    contents=[]
    directorySlash = "/"
    if sys.platform.startswith('win'):
        directorySlash = "\\"
    base_path = Path(__file__).parent
    file_path = (base_path / "../../public/crawler_file").resolve()
    try:
        with open(str(file_path) + directorySlash + str(filename), "r", encoding='utf-8') as fr:
            contents = fr.readlines()
            fr.close()
            return contents
    except FileNotFoundError as fnf_error:
        print(fnf_error)

def WriteFile(filename, contents):
    directorySlash = "/"
    if sys.platform.startswith('win'):
        directorySlash = "\\"
    base_path = Path(__file__).parent
    file_path = (base_path / "../../public/crawler_file").resolve()
    with open(str(file_path) + directorySlash + str(filename), "w", encoding='utf-8') as f:
        f.write(contents)
        f.close()
