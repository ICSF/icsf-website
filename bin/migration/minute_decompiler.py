# -*- coding: utf-8 -*-
# This file contained some experiments on decompiling minutes from the html on the website to the .min format. The experiments were never finished, as I discovered I could just pop the .html files from the server into the repo with minor changes.
#
# This file is designed to run as a Jupyter Notebook through [Jupytext](https://github.com/mwouts/jupytext), but _may_ also probably work as a normal Python file (with some changes).

from bs4 import BeautifulSoup
from requests import get
import datetime
from dateutil.parser import parse

soup = BeautifulSoup(get("http://localhost/committee/minutes/2010-11/minutes11-03-04.html").text, 'html.parser').div

comment = "Post Freshers’ Fair Meeting"
opened = parse(soup.h2.text.split(", ")[1] + " " + soup.find(class_="opened").text.split(" ")[-1])
closed = parse(soup.h2.text.split(", ")[1] + " " + soup.find_all(class_="opened")[-1].text.split(" ")[-1])
people = ", ".join(soup.find(class_="peoples").text.split("\n")[:-1])
try:
    apologies = ", ".join(soup.find_all(class_="peoples")[1].text.split("\n")[:-1])
except:
    apologies = ""

# +
header_template = """committee: ICSF
comment: {}
opened: {}
closed: {}
present: {}
"""
header = header_template.format(comment, opened, closed, people)
if apologies:
    header += "apologies: " + apologies

print(header)
# -

body = ""
for child in soup.children:
    if child.name == "h3" and child.has_attr("class"):
        print("= {}".format(child.text))


