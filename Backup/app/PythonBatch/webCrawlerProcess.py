#! /usr/bin/env python3
# -*- coding: utf-8 -*-

import os, sys, subprocess, shlex
from multiprocessing import Pool, Process, Queue

def f(logPID, q, scriptName, isbn):
    q.put([os.getpid()])
    os.system("sh "+scriptName+".sh "+logPID + " " + isbn)

def main():
    jobs = []
    q = Queue()

    isbn = sys.argv[1] 

    #バッチ処理部分
    mainJob = Process(target=f, args=("",q,"webCrawlerRunProcess", isbn, ))
    jobs.append(mainJob)
    mainJob.start()

    logPID = str(q.get()[0])

    #モニタリング部分
    monitorJob = Process(target=f, args=(logPID,q,"webCrawlerProcessMonitor", "", ))
    jobs.append(monitorJob)
    monitorJob.start()

    for job in jobs:
        job.join()

main()