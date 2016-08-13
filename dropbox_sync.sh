#!/bin/bash

rm -Rf frontend/*
curl -L -o temp.zip https://www.dropbox.com/sh/tlw9tamm0lm2qrn/AAB_bjflIfYF4PGsTTSSSFB5a?dl=1
unzip temp.zip -d frontend
rm temp.zip
