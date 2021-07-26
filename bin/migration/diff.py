# This is a basic file that will let you check differences between a locally hosted version of the website and the one on the Union's servers. It is designed to run as a Jupyter Notebook through [Jupytext](https://github.com/mwouts/jupytext), but _may_ also probably work as a normal Python file (with some changes).

import difflib
import requests
from IPython.core.display import display, HTML

hd = difflib.HtmlDiff(tabsize=4, wrapcolumn=50)

# +
local_prefix = "http://localhost/"
remote_prefix = "https://www.union.ic.ac.uk/scc/icsf/"

local_url = "http://localhost/history/"
now = requests.get(local_url).text
new = requests.get(remote_prefix + local_url[len(local_prefix):]).text.replace("/scc/icsf", "")
# -

display(HTML(
    hd.make_file(now.split("\n"), new.split("\n"), context=True)
))


