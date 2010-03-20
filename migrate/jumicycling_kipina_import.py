"""
JuMiCycling

Import data from KIPINA XML File and directly push into database.

Copyright (C) 2010 Michael Pilgermann <kichkasch@gmx.de>
http://github.com/kichkasch/jumicycling
 
jumicycling is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 3 of the License, or
(at your option) any later version.
 
jumicycling is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.
 
You should have received a copy of the GNU General Public License
along with jumicycling. If not, see <http://www.gnu.org/licenses/>.
"""

import xml.dom.minidom
import MySQLdb

filename = "/home/michael/myFiles/cycling stats.xml.kipina"
"""Source of data"""
dbhost = "192.168.200.20"
"""Destination of data"""
user = "jumicycling"
"""Destination of data"""
password = "cyclepass"
"""Destination of data"""
db = "jumicycling"
"""Destination of data"""

def normalizeEntry(entry):
    """
    Check, whether all required attributes are available
    
    If not, initialize with empty string for database.
    """
    if not entry.has_key('distance'):
        entry['distance'] = "0"
    if not entry.has_key('duration'):
        entry['duration'] = '0'
    if not entry.has_key('Max Speed'):
        entry['Max Speed'] = "0"
    if not entry.has_key('Average speed'):
        entry['Average speed'] = "0"
    if not entry.has_key('Comment'):
        entry['Comment'] = ""

conn = MySQLdb.connect (host = dbhost,
                           user = user,
                           passwd = password,
                           db = db)

cursor = conn.cursor ()

dom = xml.dom.minidom.parse(filename)
for node in dom.childNodes:
   if node.localName == "traininglog":  # KIPINA root element
       for node1 in node.childNodes:
           if node1.localName == "workout": 
                entry = {}
                for node2 in node1.childNodes:
                    if node2.localName:
                        if node2.localName == "param":
                            attName = node2.getAttribute('name')
                            attType = node2.getAttribute('type')
                        else:
                            if node2.localName == "datetime":
                                attName = 'datetime'
                                attType = 'datetime'
                        if node2.childNodes:
                            attValue = node2.childNodes[0].nodeValue
                        else:
                            attValue = None
                        entry[attName] = attValue
                normalizeEntry(entry)
                cursor.execute ("""
                        INSERT INTO cyclingstats (datetime, distance, duration, maxspeed, averagespeed, comment)
                        VALUES
                         ('""" + entry['datetime'] + """', '""" + entry['distance'] + """','""" + entry['duration'] + """','""" + entry['Max Speed'] + """','""" + entry['Average speed'] + """','""" + entry['Comment'] + """')
                         """)
cursor.close()
conn.commit ()
conn.close ()
