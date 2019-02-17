<?php
echo `ifconfig $(netstat -nr | grep -e default -e "^0\.0\.0\.0" | head -1 | awk '{print $NF}') | grep -e "inet " | sed -e 's/.*inet //' -e 's/ .*//' -e 's/.*\://'`
?>